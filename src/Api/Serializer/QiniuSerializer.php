<?php
namespace Minr\Auth\Qizue\Api\Serializer;

use Flarum\Api\Serializer\AbstractSerializer;

class QiniuSerializer extends AbstractSerializer{

    /**
     * {@inheritdoc}
     */
    protected $type = 'qiniu';

    /**
     * @inheritDoc
     */
    protected function getDefaultAttributes($model) {
        $attributes = [
            'token'         => $model->token,
            'key'           => $model->key,
        ];

        return $attributes;
    }
}
