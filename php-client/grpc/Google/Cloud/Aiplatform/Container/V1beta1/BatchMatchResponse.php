<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: match_service.proto

namespace Google\Cloud\Aiplatform\Container\V1beta1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Response of a batch match query.
 *
 * Generated from protobuf message <code>google.cloud.aiplatform.container.v1beta1.BatchMatchResponse</code>
 */
class BatchMatchResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * The batched responses grouped by indexes.
     *
     * Generated from protobuf field <code>repeated .google.cloud.aiplatform.container.v1beta1.BatchMatchResponse.BatchMatchResponsePerIndex responses = 1;</code>
     */
    private $responses;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Cloud\Aiplatform\Container\V1beta1\BatchMatchResponse\BatchMatchResponsePerIndex>|\Google\Protobuf\Internal\RepeatedField $responses
     *           The batched responses grouped by indexes.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\MatchService::initOnce();
        parent::__construct($data);
    }

    /**
     * The batched responses grouped by indexes.
     *
     * Generated from protobuf field <code>repeated .google.cloud.aiplatform.container.v1beta1.BatchMatchResponse.BatchMatchResponsePerIndex responses = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getResponses()
    {
        return $this->responses;
    }

    /**
     * The batched responses grouped by indexes.
     *
     * Generated from protobuf field <code>repeated .google.cloud.aiplatform.container.v1beta1.BatchMatchResponse.BatchMatchResponsePerIndex responses = 1;</code>
     * @param array<\Google\Cloud\Aiplatform\Container\V1beta1\BatchMatchResponse\BatchMatchResponsePerIndex>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setResponses($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Aiplatform\Container\V1beta1\BatchMatchResponse\BatchMatchResponsePerIndex::class);
        $this->responses = $arr;

        return $this;
    }

}

