#!/bin/bash

export GRPC_PROTOC="/home/user/protoc/bin/protoc"
export GRPC_PHP_PLUGIN="/home/user/grpc/cmake/build/grpc_php_plugin"
export GRPC_PROTO_GOOGLEAPIS="/home/user/googleapis"
export GRPC_PROTO_MATCHING="/home/user/vertex-matching-engine/proto"
export GRPC_OUT_PHP="/home/user/vertex-matching-engine/php-client/grpc"
export GRPC_OUT_GRPC="/home/user/vertex-matching-engine/php-client/grpc"

$GRPC_PROTOC --proto_path=$GRPC_PROTO_GOOGLEAPIS \
    --proto_path=$GRPC_PROTO_MATCHING \
    --php_out=$GRPC_OUT_PHP \
    --grpc_out=generate_server:$GRPC_OUT_GRPC \
    --plugin=protoc-gen-grpc=$GRPC_PHP_PLUGIN $GRPC_PROTO_MATCHING/match_service.proto
