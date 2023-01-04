#!/bin/bash

set -euo pipefail

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
