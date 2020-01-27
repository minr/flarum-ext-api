<?php
use Flarum\Extend;
use Minr\Auth\Qizue\Api\Controller\SaveAvatrController;
use Minr\Auth\Qizue\Command\CreateQiniu;

return [
    (new Extend\Routes('api'))
        ->get('/token/qiniu', 'token.qiniu', CreateQiniu::class)
        ->post('/users/{id}/save_avatar', 'users.avatar.save', SaveAvatrController::class)
];
