<?php
namespace Minr\Auth\Qizue\Validator;

use Flarum\Foundation\AbstractValidator;

class AvatarValidator extends AbstractValidator{
    /**
     * {@inheritdoc}
     */
    protected $rules = [
        'avatar'  => [
            'required',
            'regex:/^https:\/\/images\.qizue\.com\//i'
        ],
    ];
}
