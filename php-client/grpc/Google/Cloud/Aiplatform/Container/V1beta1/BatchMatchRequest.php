<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: match_service.proto

namespace Google\Cloud\Aiplatform\Container\V1beta1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Parameters for a batch match query.
 *
 * Generated from protobuf message <code>google.cloud.aiplatform.container.v1beta1.BatchMatchRequest</code>
 */
class BatchMatchRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * The batch requests grouped by indexes.
     *
     * Generated from protobuf field <code>repeated .google.cloud.aiplatform.container.v1beta1.BatchMatchRequest.BatchMatchRequestPerIndex requests = 1;</code>
     */
    private $requests;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Cloud\Aiplatform\Container\V1beta1\BatchMatchRequest\BatchMatchRequestPerIndex>|\Google\Protobuf\Internal\RepeatedField $requests
     *           The batch requests grouped by indexes.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\MatchService::initOnce();
        parent::__construct($data);
    }

    /**
     * The batch requests grouped by indexes.
     *
     * Generated from protobuf field <code>repeated .google.cloud.aiplatform.container.v1beta1.BatchMatchRequest.BatchMatchRequestPerIndex requests = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * The batch requests grouped by indexes.
     *
     * Generated from protobuf field <code>repeated .google.cloud.aiplatform.container.v1beta1.BatchMatchRequest.BatchMatchRequestPerIndex requests = 1;</code>
     * @param array<\Google\Cloud\Aiplatform\Container\V1beta1\BatchMatchRequest\BatchMatchRequestPerIndex>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setRequests($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Aiplatform\Container\V1beta1\BatchMatchRequest\BatchMatchRequestPerIndex::class);
        $this->requests = $arr;

        return $this;
    }

}

