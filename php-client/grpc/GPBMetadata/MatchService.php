<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: match_service.proto

namespace GPBMetadata;

class MatchService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Rpc\Status::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
match_service.proto)google.cloud.aiplatform.container.v1beta1"�
MatchRequest
deployed_index_id (	
	float_val (
num_neighbors (G
	restricts (24.google.cloud.aiplatform.container.v1beta1.Namespace,
$per_crowding_attribute_num_neighbors (
approx_num_neighbors (-
%leaf_nodes_to_search_percent_override ("�
MatchResponseS
neighbor (2A.google.cloud.aiplatform.container.v1beta1.MatchResponse.Neighbor(
Neighbor

id (	
distance ("�
BatchMatchRequesth
requests (2V.google.cloud.aiplatform.container.v1beta1.BatchMatchRequest.BatchMatchRequestPerIndex�
BatchMatchRequestPerIndex
deployed_index_id (	I
requests (27.google.cloud.aiplatform.container.v1beta1.MatchRequest
low_level_batch_size ("�
BatchMatchResponsek
	responses (2X.google.cloud.aiplatform.container.v1beta1.BatchMatchResponse.BatchMatchResponsePerIndex�
BatchMatchResponsePerIndex
deployed_index_id (	K
	responses (28.google.cloud.aiplatform.container.v1beta1.MatchResponse"
status (2.google.rpc.Status"D
	Namespace
name (	
allow_tokens (	
deny_tokens (	2�
MatchService|
Match7.google.cloud.aiplatform.container.v1beta1.MatchRequest8.google.cloud.aiplatform.container.v1beta1.MatchResponse" �

BatchMatch<.google.cloud.aiplatform.container.v1beta1.BatchMatchRequest=.google.cloud.aiplatform.container.v1beta1.BatchMatchResponse" bproto3'
        , true);

        static::$is_initialized = true;
    }
}

