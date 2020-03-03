<?php
namespace Minr\Auth\Qizue\Command;

use Flarum\User\User;

class PutUserName {

    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $uid;

    /**
     * @var User
     */
    public $actor;

    /**
     * PutName constructor.
     *
     * @param User   $actor
     * @param int    $uid
     * @param string $name
     */
    public function __construct(User $actor, int $uid, string $name) {
        $this->actor    = $actor;
        $this->name     = $name;
        $this->uid      = $uid;
    }
}
