<?php
namespace Minr\Auth\Qizue;

use Flarum\Database\AbstractModel;

/**
 * Class SaveAvatar
 * @property string avatar
 * @property string uid
 *
 * @package Minr\Auth\Qizue
 */
class Avatar extends AbstractModel{

    /**
     * @param string $avatar
     * @param int    $uid
     * @return static
     */
    public static function build(string $avatar, int $uid) {
        $save_avatar            = new static();
        $save_avatar->uid     = intval($uid);
        $save_avatar->avatar  = strval($avatar);
        return $save_avatar;
    }

}
