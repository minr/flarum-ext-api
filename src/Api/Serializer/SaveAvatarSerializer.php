<?php
namespace Minr\Auth\Qizue\Api\Serializer;

use Flarum\Api\Serializer\AbstractSerializer;

class SaveAvatarSerializer extends AbstractSerializer{

    /**
     * {@inheritdoc}
     */
    protected $type = 'avatar';

    /**
     * @var string
     */
    protected $id   = "-";

    /**
     * @inheritDoc
     */
    protected function getDefaultAttributes($model) {
        $attributes = [
            'uid'         => $model->uid,
            'avatar'      => $model->avatar,
        ];

        return $attributes;
    }
}
