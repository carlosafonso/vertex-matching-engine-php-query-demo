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

export INDEX_ID=$(gcloud ai indexes list --region $GCP_REGION --filter="displayName:$INDEX_NAME" --format="value(name)")
export INDEX_ENDPOINT_ID=$(gcloud ai index-endpoints list --region $GCP_REGION --filter="displayName:$INDEX_ENDPOINT_NAME" --format="value(name)")

gcloud --quiet ai index-endpoints undeploy-index $INDEX_ENDPOINT_ID  --deployed-index-id $DEPLOYED_INDEX_ID
echo "Index undeployed from endpoint"

gcloud --quiet ai index-endpoints delete $INDEX_ENDPOINT_ID
echo "Index endpoint deleted"

gcloud --quiet ai indexes delete $INDEX_ID
echo "Index deleted"

gsutil rm -r $BUCKET_URI
echo "GCS bucket deleted"

gcloud --quiet beta services vpc-peerings delete --network=$VPC_NETWORK_NAME --service=servicenetworking.googleapis.com
echo "Service VPC peering deleted"

gcloud --quiet compute addresses delete $NETWORK_PEERING_RANGE_NAME --global
echo "Network peering address range deleted"

echo -e "\n\n>> Done!"
