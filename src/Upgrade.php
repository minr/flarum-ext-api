<?php
namespace Minr\Auth\Qizue;
use Flarum\Database\AbstractModel;

/**
 * Class Upgrade
 * @property $content
 * @property $version
 * @property $downLink
 * @property $needUpgrade
 *
 * @package Minr\Auth\Qizue
 */
class Upgrade extends AbstractModel {

    /**
     * @param string $content
     * @param string $version
     * @param string $downLink
     * @param bool   $needUpgrade
     * @return static
     */
    public static function build(string $content,
                                 string $version,
                                 string $downLink,
                                 bool $needUpgrade) {
        $upgrade = new static();
        $upgrade->content = $content;
        $upgrade->version = $version;
        $upgrade->downLink= $downLink;
        $upgrade->needUpgrade = !!$needUpgrade;

        return $upgrade;
    }
}
