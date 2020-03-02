<?php
namespace Minr\Auth\Qizue\Api\Serializer;

use Flarum\Api\Serializer\AbstractSerializer;
use Flarum\Api\Serializer\BasicUserSerializer;
use Tobscure\JsonApi\Relationship;

class UsersNameSerializer extends AbstractSerializer {
    /**
     * {@inheritdoc}
     */
    protected $type = 'username-requests';

    /**
     * @inheritDoc
     */
    protected function getDefaultAttributes($model) {
        $attributes =  [
            'requestedUsername'  => $model->requested_username,
            'status'             => $model->status,
            'reason'             => $model->reason,
            'createdAt'          => $this->formatDate($model->created_at),
        ];

        return $attributes;
    }

    /**
     * @param $username_request
     *
     * @return Relationship
     */
    protected function user($username_request) {
        return $this->hasOne($username_request, BasicUserSerializer::class);
    }
}
