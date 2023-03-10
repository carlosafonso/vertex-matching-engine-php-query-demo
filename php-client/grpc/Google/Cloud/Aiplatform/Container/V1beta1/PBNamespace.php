<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: match_service.proto

namespace Google\Cloud\Aiplatform\Container\V1beta1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Namespace specifies the rules for determining the datapoints that are
 * eligible for each matching query, overall query is an AND across namespaces.
 *
 * Generated from protobuf message <code>google.cloud.aiplatform.container.v1beta1.Namespace</code>
 */
class PBNamespace extends \Google\Protobuf\Internal\Message
{
    /**
     * The string name of the namespace that this proto is specifying,
     * such as "color", "shape", "geo", or "tags".
     *
     * Generated from protobuf field <code>string name = 1;</code>
     */
    protected $name = '';
    /**
     * The allowed tokens in the namespace.
     *
     * Generated from protobuf field <code>repeated string allow_tokens = 2;</code>
     */
    private $allow_tokens;
    /**
     * The denied tokens in the namespace.
     * The denied tokens have exactly the same format as the token fields, but
     * represents a negation. When a token is denied, then matches will be
     * excluded whenever the other datapoint has that token.
     * For example, if a query specifies {color: red, blue, !purple}, then that
     * query will match datapoints that are red or blue, but if those points are
     * also purple, then they will be excluded even if they are red/blue.
     *
     * Generated from protobuf field <code>repeated string deny_tokens = 3;</code>
     */
    private $deny_tokens;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           The string name of the namespace that this proto is specifying,
     *           such as "color", "shape", "geo", or "tags".
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $allow_tokens
     *           The allowed tokens in the namespace.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $deny_tokens
     *           The denied tokens in the namespace.
     *           The denied tokens have exactly the same format as the token fields, but
     *           represents a negation. When a token is denied, then matches will be
     *           excluded whenever the other datapoint has that token.
     *           For example, if a query specifies {color: red, blue, !purple}, then that
     *           query will match datapoints that are red or blue, but if those points are
     *           also purple, then they will be excluded even if they are red/blue.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\MatchService::initOnce();
        parent::__construct($data);
    }

    /**
     * The string name of the namespace that this proto is specifying,
     * such as "color", "shape", "geo", or "tags".
     *
     * Generated from protobuf field <code>string name = 1;</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * The string name of the namespace that this proto is specifying,
     * such as "color", "shape", "geo", or "tags".
     *
     * Generated from protobuf field <code>string name = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * The allowed tokens in the namespace.
     *
     * Generated from protobuf field <code>repeated string allow_tokens = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getAllowTokens()
    {
        return $this->allow_tokens;
    }

    /**
     * The allowed tokens in the namespace.
     *
     * Generated from protobuf field <code>repeated string allow_tokens = 2;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setAllowTokens($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->allow_tokens = $arr;

        return $this;
    }

    /**
     * The denied tokens in the namespace.
     * The denied tokens have exactly the same format as the token fields, but
     * represents a negation. When a token is denied, then matches will be
     * excluded whenever the other datapoint has that token.
     * For example, if a query specifies {color: red, blue, !purple}, then that
     * query will match datapoints that are red or blue, but if those points are
     * also purple, then they will be excluded even if they are red/blue.
     *
     * Generated from protobuf field <code>repeated string deny_tokens = 3;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getDenyTokens()
    {
        return $this->deny_tokens;
    }

    /**
     * The denied tokens in the namespace.
     * The denied tokens have exactly the same format as the token fields, but
     * represents a negation. When a token is denied, then matches will be
     * excluded whenever the other datapoint has that token.
     * For example, if a query specifies {color: red, blue, !purple}, then that
     * query will match datapoints that are red or blue, but if those points are
     * also purple, then they will be excluded even if they are red/blue.
     *
     * Generated from protobuf field <code>repeated string deny_tokens = 3;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setDenyTokens($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->deny_tokens = $arr;

        return $this;
    }

}

