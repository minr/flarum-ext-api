<?php
namespace Minr\Auth\Qizue\Api\Data;

class Upgrade {
    public static $ios      = [
        'version'   => "1.0.3",
        'content'   => "更新提示\nffff",
        'downLink'  => "http://dev.qizue.com/api/upgrade",
    ];
    public static $android  = [
        'version'   => "1.0.3",
        'content'   => "1、新增应用更新功能；
2、优化图片上传功能；
3、优化Emoji表情包显示功能；
4、优化黑暗模式适配；",
        'downLink'  => "http://dev.qizue.com/api/upgrade",
    ];

    public static $unkown   = [];
}
