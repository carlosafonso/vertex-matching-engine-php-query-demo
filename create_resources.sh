#!/bin/bash

set -euo pipefail

# Load customizable environment variables
source envs.sh

# Define derived variables
export VPC_FULLY_QUALIFIED_NETWORK_NAME="projects/$GCP_PROJECT_NUMBER/global/networks/$VPC_NETWORK_NAME"
export NETWORK_PEERING_RANGE_NAME="vertex-matching-engine"
export BUCKET_URI="gs://${DATA_BUCKET_NAME}"
export DELTA_LOCATION="${BUCKET_URI}/delta/"
export INDEX_NAME="vertex-matching-engine-index"
export INDEX_ENDPOINT_NAME="vertex-maching-engine-index"
export DEPLOYED_INDEX_ID="mydeployedidx"

# Network peering prep
gcloud compute addresses create $NETWORK_PEERING_RANGE_NAME \
    --global \
    --prefix-length=16 \
    --description="peering range for Matching Engine service" \
    --network=$VPC_NETWORK_NAME \
    --purpose=VPC_PEERING \
    --project=$GCP_PROJECT_ID
echo "Created network peering address range"

gcloud services vpc-peerings connect \
    --service=servicenetworking.googleapis.com \
    --network=$VPC_NETWORK_NAME \
    --ranges=$NETWORK_PEERING_RANGE_NAME \
    --project=$GCP_PROJECT_ID
echo "Created service VPC peering"

# If the above returns an error, run the following:
# gcloud beta services vpc-peerings update \
#     --service=servicenetworking.googleapis.com \
#     --ranges=$NETWORK_PEERING_RANGE_NAME \
#     --network=$VPC_NETWORK_NAME \
#     --project=$GCP_PROJECT_ID \
#     --force

# Create index data bucket and upload initial embedding data
gsutil mb -l $GCP_REGION $BUCKET_URI
gsutil cp ./embeddings-initial.json $DELTA_LOCATION
echo "Created GCS bucket and uploaded initial embedding data"

# Create a batch index
envsubst < index-metadata.json.dist > index-metadata.json
gcloud ai indexes create \
  --metadata-file=index-metadata.json \
  --display-name=$INDEX_NAME \
  --project=$GCP_PROJECT_ID \
  --region=$GCP_REGION
echo "Started index creation"

# Index creation takes a while (~45-50 mins)
sleep 3600

# Create an endpoint
gcloud ai index-endpoints create \
  --display-name=$INDEX_ENDPOINT_NAME \
  --network=$VPC_FULLY_QUALIFIED_NETWORK_NAME \
  --project=$GCP_PROJECT_ID \
  --region=$GCP_REGION
echo "Created endpoint"

export INDEX_ID=$(gcloud ai indexes list --region $GCP_REGION --filter="displayName:$INDEX_NAME" --format="value(name)")
export INDEX_ENDPOINT_ID=$(gcloud ai index-endpoints list --region $GCP_REGION --filter="displayName:$INDEX_ENDPOINT_NAME" --format="value(name)")

# Then deploy the index to the endpoint
gcloud ai index-endpoints deploy-index $INDEX_ENDPOINT_ID \
  --deployed-index-id=$DEPLOYED_INDEX_ID \
  --display-name=$DEPLOYED_INDEX_ID \
  --index=$INDEX_ID \
  --project=$GCP_PROJECT_ID \
  --region=$GCP_REGION
echo "Started index deployment"

# Index creation takes a while (~20 mins)
sleep 1200

export DEPLOYED_INDEX_ENDPOINT_GRPC_IP=$(gcloud ai index-endpoints describe --region=$GCP_REGION $INDEX_ENDPOINT_ID --format="value(deployedIndexes[0].privateEndpoints.matchGrpcAddress)")

echo -e "\n\n>> Done! You can now query your index."
echo ">>  * gRPC endpoint available at: ${DEPLOYED_INDEX_ENDPOINT_GRPC_IP}:10000"
echo ">>  * Deployed index ID is:       ${DEPLOYED_INDEX_ID}"
