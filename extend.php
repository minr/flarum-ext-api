<?php
use Flarum\Extend;
use Minr\Auth\Qizue\Api\Controller\CreateQiniuController;
use Minr\Auth\Qizue\Api\Controller\FeedbackController;
use Minr\Auth\Qizue\Api\Controller\SaveAvatarController;
use Minr\Auth\Qizue\Api\Controller\UpgradeController;
use Minr\Auth\Qizue\Api\Controller\UsersInfoController;

return [
    //new Extend\Locales(__DIR__.'/locale'),

    //(new Extend\Frontend('admin'))
    //    ->js(__DIR__.'/js/dist/admin.js')
    //    ->css(__DIR__.'/less/admin.less'),

    (new Extend\Routes('api'))
        // 获取七牛token
        ->get('/token/qiniu', 'token.qiniu', CreateQiniuController::class)
        // 应用内升级
        ->get('/upgrade', 'upgrade', UpgradeController::class)
        // 意见反馈
        ->post('/feedback', 'feedback', FeedbackController::class)
        // 修改头像
        ->post('/users/{id}/save_avatar', 'users.avatar.save', SaveAvatarController::class)
        ->put('/users/{id}/info', 'users.info', UsersInfoController::class)
];
