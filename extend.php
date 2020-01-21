<?php
use Flarum\Extend;
use \Minr\Auth\Qizue\Qiniu;
use \Minr\Auth\Qizue\SaveAvatar;


return [
    (new Extend\Routes('forum'))
        ->get('/api/token/qiniu', 'api.token.qiniu', Qiniu::class)
        ->post('/api/users/{id}/save_avatar', 'api.users.avatar.save', SaveAvatar::class)
];
