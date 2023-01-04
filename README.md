# vertex-matching-engine-php-query-demo

This demo shows how to create and populate a Vertex AI Matching Engine index, how to deploy it to an endpoint, and how to query it using PHP.

## Pre-requisites

### PHP `grpc` and `protobuf` extensions

```
pecl install grpc
pecl install protobuf
```

Then add these two lines to your `php.ini` file:

```
extension=grpc.so
extension=protobuf.so
```

### `protoc` and `grpc_php_plugin`

> **NOTE:** These are only needed if you want to compile the `.proto` file and produce the PHP bindings. This repo already includes them, so you should be able to skip this step.

#### `protoc`

You can download the latest binary from the [repository releases page](https://github.com/protocolbuffers/protobuf/releases). Unzip it and make sure the `protoc` executable is available in your PATH.

#### `grpc_php_plugin`

Follow [these instructions](https://github.com/grpc/grpc/blob/v1.50.0/src/php/README.md#grpc_php_plugin-protoc-plugin) to compile this plugin.

## Creating resources

1. Copy `envs.sh.dist` into `envs.sh`.

    ```
    cp envs.sh.dist envs.sh
    ```

2. Edit it and set the appropriate values for your environment.

3. Run `create_resources.sh`.

    ```
    ./create_resources.sh
    ```

## Using the PHP client

From the `php-client` directory, install the Composer dependencies:

```
composer install
```

Ensure that the `DEPLOYED_INDEX_ENDPOINT_GRPC_IP` and `DEPLOYED_INDEX_ID` environment variables are defined. You can get these from `create_resources.sh`. Then, just run the client:

```
DEPLOYED_INDEX_ENDPOINT_GRPC_IP=<value> DEPLOYED_INDEX_ID=<value> php client.php
```

If successful, you should see a response like the following:

```
string(1) "0"
float(17.592369079589844)
string(1) "3"
float(7.379648685455322)
string(1) "1"
float(2.4347078800201416)
string(1) "2"
float(1.3677303791046143)
```

## Decomissioning resources

Run `delete_resources.sh` once you are finished to destroy the resources created above.

## A note on streaming indexes

Streaming indexes are currently not supported by the gcloud CLI, and must be created with a direct API call:

```bash
curl -X POST -H "Content-Type: application/json" \
-H "Authorization: Bearer `gcloud auth print-access-token`" \
https://${GCP_REGION}-aiplatform.googleapis.com/v1/projects/${GCP_PROJECT_ID}/locations/${GCP_REGION}/indexes \
-d '{
    displayName: "'${INDEX_NAME}'",
    description: "'${INDEX_NAME}'",
    metadata: {
       contentsDeltaUri: "'${DELTA_LOCATION}'",
       config: {
          dimensions: 100,
          approximateNeighborsCount: 150,
          distanceMeasureType: "DOT_PRODUCT_DISTANCE",
          algorithmConfig: {treeAhConfig: {leafNodeEmbeddingCount: 10000, leafNodesToSearchPercent: 20}}
       },
    },
    indexUpdateMethod: "STREAM_UPDATE"
}'
```

Likewise, to update a streaming index in real-time:

```bash
curl -H "Content-Type: application/json" -H "Authorization: Bearer `gcloud auth print-access-token`" https://${GCP_REGION}-aiplatform.googleapis.com/v1/${INDEX_ID}:upsertDatapoints \
-d '{
datapoints: [
  {
    datapoint_id: "0",
    feature_vector: [-0.11333,0.48402,0.090771,-0.22439,0.034206,-0.55831,0.041849,-0.53573,0.18809,-0.58722,0.015313,-0.014555,0.80842,-0.038519,0.75348,0.70502,-0.17863,0.3222,0.67575,0.67198,0.26044,0.4187,-0.34122,0.2286,-0.53529,1.2582,-0.091543,0.19716,-0.037454,-0.3336,0.31399,0.36488,0.71263,0.1307,-0.24654,-0.52445,-0.036091,0.55068,0.10017,0.48095,0.71104,-0.053462,0.22325,0.30917,-0.39926,0.036634,-0.35431,-0.42795,0.46444,0.25586,0.68257,-0.20821,0.38433,0.055773,-0.2539,-0.20804,0.52522,-0.11399,-0.3253,-0.44104,0.17528,0.62255,0.50237,-0.7607,-0.071786,0.0080131,-0.13286,0.50097,0.18824,-0.54722,-0.42664,0.4292,0.14877,-0.0072514,-0.16484,-0.059798,0.9895,-0.61738,0.054169,0.48424,-0.35084,-0.27053,0.37829,0.11503,-0.39613,0.24266,0.39147,-0.075256,0.65093,-0.20822,-0.17456,0.53571,-0.16537,0.13582,-0.56016,0.016964,0.1277,0.94071,-0.22608,-0.021106],
    restricts: [{ namespace: "author", allow_list: ["john"]}, {namespace: "category", allow_list: ["outdoors", "vector"]}]
  },
  {
    datapoint_id: "1",
    feature_vector: [-0.99544,-2.3651,-0.24332,-1.0321,0.42052,-1.1817,-0.16451,-1.683,0.49673,-0.27258,-0.025397,0.34188,1.5523,1.3532,0.33297,-0.0056677,-0.76525,0.49587,1.2211,0.83394,-0.20031,-0.59657,0.38485,-0.23487,-1.0725,0.95856,0.16161,-1.2496,1.6751,0.73899,0.051347,-0.42702,0.16257,-0.16772,0.40146,0.29837,0.96204,-0.36232,-0.47848,0.78278,0.14834,1.3407,0.47834,-0.39083,-1.037,-0.24643,-0.75841,0.7669,-0.37363,0.52741,0.018563,-0.51301,0.97674,0.55232,1.1584,0.73715,1.3055,-0.44743,-0.15961,0.85006,-0.34092,-0.67667,0.2317,1.5582,1.2308,-0.62213,-0.032801,0.1206,-0.25899,-0.02756,-0.52814,-0.93523,0.58434,-0.24799,0.37692,0.86527,0.069626,1.3096,0.29975,-1.3651,-0.32048,-0.13741,0.33329,-1.9113,-0.60222,-0.23921,0.12664,-0.47961,-0.89531,0.62054,0.40869,-0.08503,0.6413,-0.84044,-0.74325,-0.19426,0.098722,0.32648,-0.67621,-0.62692],
    restricts: [{ namespace: "author", allow_list: ["jack"]}, {namespace: "category", allow_list: ["vaporware"]}]
  },
  {
    datapoint_id: "2",
    feature_vector: [-0.10185,0.59817,0.20281,0.25243,-1.0583,-0.33025,1.515,-0.31013,-0.52481,0.63273,0.57948,1.4845,0.74163,0.35936,0.33215,0.22267,-0.13083,-0.94128,-0.10467,-0.92603,0.88263,0.90278,0.26143,-1.0855,0.26634,1.6582,0.64275,-0.65797,0.12278,-0.31314,0.20374,-0.68313,-1.4204,0.20142,-1.5223,0.50197,-0.17078,-0.22925,-0.64322,1.0851,1.4108,0.85366,0.77641,-0.24419,0.91459,1.0457,-1.3472,0.62448,-1.3674,0.52975,0.94554,0.7484,0.5447,0.98434,-1.4921,0.061787,-1.3449,0.56757,-0.24198,0.095227,-0.12917,-0.075662,-1.0094,1.5167,0.65112,-0.16796,1.9482,-0.03252,0.34175,0.13304,-0.98529,1.6934,-0.57942,-0.10795,0.2568,0.11043,1.069,0.73732,-0.54097,0.82145,-0.088123,-0.21531,-0.40275,0.20237,-0.71341,-0.91026,-0.35301,-0.14524,-0.49374,-1.1929,-0.1744,-1.3897,0.3712,1.5388,-0.04959,-0.3078,-0.69626,-0.042742,0.47287,0.068169],
    restricts: [{ namespace: "author", allow_list: ["jack"]}, {namespace: "category", allow_list: ["vector"]}]
  },
  {
    datapoint_id: "3",
    feature_vector: [-0.73278,-0.47153,1.3312,0.94514,0.39193,-0.15517,0.77001,-0.48571,-0.25486,-0.51172,-0.61296,0.8505,1.2229,-0.73392,0.20598,-0.32854,0.46325,1.6896,1.0918,-0.074555,-0.10862,0.020611,-0.28641,1.0845,-0.5458,0.89078,0.23956,0.66657,-0.19411,1.4764,0.72429,-0.41979,1.1308,-0.20669,0.74269,-0.32853,-0.49174,-0.30232,-1.7751,0.28806,0.33039,-0.54277,0.55764,-0.15443,0.89683,-0.67372,-0.20815,-0.77805,1.0091,0.91041,-0.38358,0.13209,-0.69006,1.9381,-1.1673,-0.4934,0.65949,-0.85698,-1.2281,0.089305,-0.67711,0.11726,-0.6769,0.96729,-1.3144,-0.88628,1.2005,0.57996,0.8894,-0.5703,-1.854,0.39546,0.59102,0.61267,0.69439,-1.2763,0.17319,-0.48364,-0.09554,-0.19799,-0.20332,-0.061615,-1.4183,0.06963,0.019058,-0.60356,-0.12622,-0.29151,0.59031,0.41392,0.46976,-0.70778,0.35542,1.0159,0.38979,0.57078,0.19437,0.89064,-0.80821,0.92134],
    restricts: [{ namespace: "author", allow_list: ["sheila"]}, {namespace: "category", allow_list: ["nightlife"]}]
  },
]}'

```
