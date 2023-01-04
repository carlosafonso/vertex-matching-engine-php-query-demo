<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Google\Cloud\Aiplatform\Container\V1beta1;

/**
 * MatchService is a Google managed service for efficient vector similarity
 * search at scale.
 */
class MatchServiceStub {

    /**
     * Returns the nearest neighbors for the query. If it is a sharded
     * deployment, calls the other shards and aggregates the responses.
     * @param \Google\Cloud\Aiplatform\Container\V1beta1\MatchRequest $request client request
     * @param \Grpc\ServerContext $context server request context
     * @return \Google\Cloud\Aiplatform\Container\V1beta1\MatchResponse for response data, null if if error occured
     *     initial metadata (if any) and status (if not ok) should be set to $context
     */
    public function Match(
        \Google\Cloud\Aiplatform\Container\V1beta1\MatchRequest $request,
        \Grpc\ServerContext $context
    ): ?\Google\Cloud\Aiplatform\Container\V1beta1\MatchResponse {
        $context->setStatus(\Grpc\Status::unimplemented());
        return null;
    }

    /**
     * Returns the nearest neighbors for batch queries. If it is a sharded
     * deployment, calls the other shards and aggregates the responses.
     * @param \Google\Cloud\Aiplatform\Container\V1beta1\BatchMatchRequest $request client request
     * @param \Grpc\ServerContext $context server request context
     * @return \Google\Cloud\Aiplatform\Container\V1beta1\BatchMatchResponse for response data, null if if error occured
     *     initial metadata (if any) and status (if not ok) should be set to $context
     */
    public function BatchMatch(
        \Google\Cloud\Aiplatform\Container\V1beta1\BatchMatchRequest $request,
        \Grpc\ServerContext $context
    ): ?\Google\Cloud\Aiplatform\Container\V1beta1\BatchMatchResponse {
        $context->setStatus(\Grpc\Status::unimplemented());
        return null;
    }

    /**
     * Get the method descriptors of the service for server registration
     *
     * @return array of \Grpc\MethodDescriptor for the service methods
     */
    public final function getMethodDescriptors(): array
    {
        return [
            '/google.cloud.aiplatform.container.v1beta1.MatchService/Match' => new \Grpc\MethodDescriptor(
                $this,
                'Match',
                '\Google\Cloud\Aiplatform\Container\V1beta1\MatchRequest',
                \Grpc\MethodDescriptor::UNARY_CALL
            ),
            '/google.cloud.aiplatform.container.v1beta1.MatchService/BatchMatch' => new \Grpc\MethodDescriptor(
                $this,
                'BatchMatch',
                '\Google\Cloud\Aiplatform\Container\V1beta1\BatchMatchRequest',
                \Grpc\MethodDescriptor::UNARY_CALL
            ),
        ];
    }

}
