<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Google\Cloud\Aiplatform\Container\V1beta1;

/**
 * MatchService is a Google managed service for efficient vector similarity
 * search at scale.
 */
class MatchServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns the nearest neighbors for the query. If it is a sharded
     * deployment, calls the other shards and aggregates the responses.
     * @param \Google\Cloud\Aiplatform\Container\V1beta1\MatchRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function Match(\Google\Cloud\Aiplatform\Container\V1beta1\MatchRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.cloud.aiplatform.container.v1beta1.MatchService/Match',
        $argument,
        ['\Google\Cloud\Aiplatform\Container\V1beta1\MatchResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the nearest neighbors for batch queries. If it is a sharded
     * deployment, calls the other shards and aggregates the responses.
     * @param \Google\Cloud\Aiplatform\Container\V1beta1\BatchMatchRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function BatchMatch(\Google\Cloud\Aiplatform\Container\V1beta1\BatchMatchRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.cloud.aiplatform.container.v1beta1.MatchService/BatchMatch',
        $argument,
        ['\Google\Cloud\Aiplatform\Container\V1beta1\BatchMatchResponse', 'decode'],
        $metadata, $options);
    }

}
