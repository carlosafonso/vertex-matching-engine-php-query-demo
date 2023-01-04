<?php

require __DIR__ . '/vendor/autoload.php';

$DEPLOYED_INDEX_ENDPOINT_GRPC_IP = getenv('DEPLOYED_INDEX_ENDPOINT_GRPC_IP');
if ($DEPLOYED_INDEX_ENDPOINT_GRPC_IP === false) {
    throw new \InvalidArgumentException("Environment variable 'DEPLOYED_INDEX_ENDPOINT_GRPC_IP' is not set.");
}

$DEPLOYED_INDEX_ID = getenv('DEPLOYED_INDEX_ID');
if ($DEPLOYED_INDEX_ID === false) {
    throw new \InvalidArgumentException("Environment variable 'DEPLOYED_INDEX_ID' is not set.");
}

/* Instantiate the service client. */
$client = new Google\Cloud\Aiplatform\Container\V1beta1\MatchServiceClient(
    "$DEPLOYED_INDEX_ENDPOINT_GRPC_IP:10000",
    ['credentials' => \Grpc\ChannelCredentials::createInsecure()],
);

/* Create the request. */
$request = new Google\Cloud\Aiplatform\Container\V1beta1\MatchRequest(
    [
        'deployed_index_id' => $DEPLOYED_INDEX_ID,
        'float_val' => [-0.11333,0.48402,0.090771,-0.22439,0.034206,-0.55831,0.041849,-0.53573,0.18809,-0.58722,0.015313,-0.014555,0.80842,-0.038519,0.75348,0.70502,-0.17863,0.3222,0.67575,0.67198,0.26044,0.4187,-0.34122,0.2286,-0.53529,1.2582,-0.091543,0.19716,-0.037454,-0.3336,0.31399,0.36488,0.71263,0.1307,-0.24654,-0.52445,-0.036091,0.55068,0.10017,0.48095,0.71104,-0.053462,0.22325,0.30917,-0.39926,0.036634,-0.35431,-0.42795,0.46444,0.25586,0.68257,-0.20821,0.38433,0.055773,-0.2539,-0.20804,0.52522,-0.11399,-0.3253,-0.44104,0.17528,0.62255,0.50237,-0.7607,-0.071786,0.0080131,-0.13286,0.50097,0.18824,-0.54722,-0.42664,0.4292,0.14877,-0.0072514,-0.16484,-0.059798,0.9895,-0.61738,0.054169,0.48424,-0.35084,-0.27053,0.37829,0.11503,-0.39613,0.24266,0.39147,-0.075256,0.65093,-0.20822,-0.17456,0.53571,-0.16537,0.13582,-0.56016,0.016964,0.1277,0.94071,-0.22608,-0.021106],
    ]
);

/* Invoke the Match operation. */
[$response, $status] = $client->Match($request)->wait();

/* Check for errors, and exit on failure. */
if ($status->code !== Grpc\STATUS_OK) {
    echo "ERROR: " . $status->code . ", " . $status->details . PHP_EOL;
    exit(1);
}

/* Iterate through the returned responses and print vector ID and distance. */
foreach ($response->getNeighbor() as $neighbor) {
    var_dump($neighbor->getId(), $neighbor->getDistance());
}
