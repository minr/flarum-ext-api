<?php
use Flarum\Extend;
use \Minr\Auth\Qizue\Qiniu;
use \Minr\Auth\Qizue\SaveAvatar;


return [
    (new Extend\Routes('forum'))
        ->get('/auth/qiniu', 'auth.qiniu', Qiniu::class)
        ->post('/users/{id}/save_avatar', 'users.avatar.save', SaveAvatar::class)
];
