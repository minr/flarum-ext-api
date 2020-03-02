<?php
namespace Minr\Auth\Qizue\Validator;

use Flarum\Foundation\AbstractValidator;

class NameValidator extends AbstractValidator{
    /**
     * {@inheritdoc}
     */
    protected $rules = [
        'name'  => [
            'required',
            'regex:/^[a-z0-9_-]+$/i',
            'min:3',
            'max:30',
        ],
    ];
}
