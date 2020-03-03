<?php
namespace Minr\Auth\Qizue\Validator;

use Flarum\Foundation\AbstractValidator;

class FeedbackValidator extends AbstractValidator{
    /**
     * {@inheritdoc}
     */
    protected $rules = [
        'ipAdress'  => ['required'],
        'content'   => ['required'],
        'timestamp' => ['required'],
        'version'   => ['required'],
        'platform'  => ['required'],
        'uid'       => ['required'],
    ];
}
