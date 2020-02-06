<?php
use Flarum\Extend;
use Minr\Auth\Qizue\Api\Controller\CreateQiniuController;
use Minr\Auth\Qizue\Api\Controller\SaveAvatrController;
use Minr\Auth\Qizue\Api\Controller\UpgradeController;

return [
    (new Extend\Routes('api'))
        ->get('/token/qiniu', 'token.qiniu', CreateQiniuController::class)
        ->get('/upgrade', 'upgrade', UpgradeController::class)
        ->post('/users/{id}/save_avatar', 'users.avatar.save', SaveAvatrController::class)
];
