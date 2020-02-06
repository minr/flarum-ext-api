<?php
namespace Minr\Auth\Qizue\Api\Serializer;

use Flarum\Api\Serializer\AbstractSerializer;

class UpgradeSerializer extends AbstractSerializer{
    /**
     * {@inheritdoc}
     */
    protected $type = 'upgrade';

    /**
     * @inheritDoc
     */
    protected function getDefaultAttributes($model) {
        $attributes = [
            'content'       => $model->content,
            'version'       => $model->version,
            'downLink'      => $model->downLink,
            'needUpgrade'   => $model->needUpgrade,
        ];

        return $attributes;
    }
}
