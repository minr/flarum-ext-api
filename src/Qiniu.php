<?php
namespace Minr\Auth\Qizue;

use Flarum\Database\AbstractModel;

/**
 * Class Qiniu
 * @property string token
 * @property string key
 *
 * @package Minr\Auth\Qizue
 */
class Qiniu extends AbstractModel{

    /**
     * @param string $token
     * @param string $key
     * @return static
     */
    public static function build(string $token, string $key) {
        $qiniu           = new static();
        $qiniu->token    = $token;
        $qiniu->key      = $key;
        return $qiniu;
    }

}
