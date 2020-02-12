<?php
namespace Minr\Auth\Qizue;

use Flarum\Database\AbstractModel;

/**
 * Class Feedback
 * @property $uid
 * @property $content
 * @property $ipAdress
 * @property $version
 * @property $platform
 * @property $timestamp
 * @package Minr\Auth\Qizue
 */
class Feedback extends AbstractModel {
    /**
     * {@inheritdoc}
     */
    protected $table = 'feedback';

    /**
     * @param int    $uid
     * @param string $content
     * @param string $ipAdress
     * @param string $version
     * @param string $platform
     * @param int    $timestamp
     * @return static
     */
    public static function build(int $uid,
                                 string $content,
                                 string $ipAdress = '127.0.0.1',
                                 string $version = '0.0.0',
                                 string $platform = 'unkown',
                                 int $timestamp = 0){
        $feedback           = new static();
        $feedback->uid      = $uid;
        $feedback->content  = $content;
        $feedback->ipAdress = $ipAdress;
        $feedback->version  = $version;
        $feedback->platform = $platform;
        $feedback->timestamp= $timestamp;
        return $feedback;
    }

}
