<?php
namespace Minr\Auth\Qizue\Command;
use Flarum\User\User;

class SaveAvatar {
    /**
     * The user performing the action.
     *
     * @var User
     */
    public $actor;

    /**
     * @var string
     */
    public $avatar;

    /**
     * @var int
     */
    public $uid;

    public function __construct(User $actor, int $uid, string $avatar) {
        $this->actor    = $actor;
        $this->avatar   = $avatar;
        $this->uid      = $uid;
    }

}
