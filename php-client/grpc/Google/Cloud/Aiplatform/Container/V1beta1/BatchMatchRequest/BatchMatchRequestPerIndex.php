<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: match_service.proto

namespace Google\Cloud\Aiplatform\Container\V1beta1\BatchMatchRequest;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Batched requests against one index.
 *
 * Generated from protobuf message <code>google.cloud.aiplatform.container.v1beta1.BatchMatchRequest.BatchMatchRequestPerIndex</code>
 */
class BatchMatchRequestPerIndex extends \Google\Protobuf\Internal\Message
{
    /**
     * The ID of the DeploydIndex that will serve the request.
     *
     * Generated from protobuf field <code>string deployed_index_id = 1;</code>
     */
    protected $deployed_index_id = '';
    /**
     * The requests against the index identified by the above deployed_index_id.
     *
     * Generated from protobuf field <code>repeated .google.cloud.aiplatform.container.v1beta1.MatchRequest requests = 2;</code>
     */
    private $requests;
    /**
     * Selects the optimal batch size to use for low-level batching. Queries
     * within each low level batch are executed sequentially while low level
     * batches are executed in parallel.
     * This field is optional, defaults to 0 if not set. A non-positive number
     * disables low level batching, i.e. all queries are executed sequentially.
     *
     * Generated from protobuf field <code>int32 low_level_batch_size = 3;</code>
     */
    protected $low_level_batch_size = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $deployed_index_id
     *           The ID of the DeploydIndex that will serve the request.
     *     @type array<\Google\Cloud\Aiplatform\Container\V1beta1\MatchRequest>|\Google\Protobuf\Internal\RepeatedField $requests
     *           The requests against the index identified by the above deployed_index_id.
     *     @type int $low_level_batch_size
     *           Selects the optimal batch size to use for low-level batching. Queries
     *           within each low level batch are executed sequentially while low level
     *           batches are executed in parallel.
     *           This field is optional, defaults to 0 if not set. A non-positive number
     *           disables low level batching, i.e. all queries are executed sequentially.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\MatchService::initOnce();
        parent::__construct($data);
    }

    /**
     * The ID of the DeploydIndex that will serve the request.
     *
     * Generated from protobuf field <code>string deployed_index_id = 1;</code>
     * @return string
     */
    public function getDeployedIndexId()
    {
        return $this->deployed_index_id;
    }

    /**
     * The ID of the DeploydIndex that will serve the request.
     *
     * Generated from protobuf field <code>string deployed_index_id = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setDeployedIndexId($var)
    {
        GPBUtil::checkString($var, True);
        $this->deployed_index_id = $var;

        return $this;
    }

    /**
     * The requests against the index identified by the above deployed_index_id.
     *
     * Generated from protobuf field <code>repeated .google.cloud.aiplatform.container.v1beta1.MatchRequest requests = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * The requests against the index identified by the above deployed_index_id.
     *
     * Generated from protobuf field <code>repeated .google.cloud.aiplatform.container.v1beta1.MatchRequest requests = 2;</code>
     * @param array<\Google\Cloud\Aiplatform\Container\V1beta1\MatchRequest>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setRequests($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Aiplatform\Container\V1beta1\MatchRequest::class);
        $this->requests = $arr;

        return $this;
    }

    /**
     * Selects the optimal batch size to use for low-level batching. Queries
     * within each low level batch are executed sequentially while low level
     * batches are executed in parallel.
     * This field is optional, defaults to 0 if not set. A non-positive number
     * disables low level batching, i.e. all queries are executed sequentially.
     *
     * Generated from protobuf field <code>int32 low_level_batch_size = 3;</code>
     * @return int
     */
    public function getLowLevelBatchSize()
    {
        return $this->low_level_batch_size;
    }

    /**
     * Selects the optimal batch size to use for low-level batching. Queries
     * within each low level batch are executed sequentially while low level
     * batches are executed in parallel.
     * This field is optional, defaults to 0 if not set. A non-positive number
     * disables low level batching, i.e. all queries are executed sequentially.
     *
     * Generated from protobuf field <code>int32 low_level_batch_size = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setLowLevelBatchSize($var)
    {
        GPBUtil::checkInt32($var);
        $this->low_level_batch_size = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BatchMatchRequestPerIndex::class, \Google\Cloud\Aiplatform\Container\V1beta1\BatchMatchRequest_BatchMatchRequestPerIndex::class);
