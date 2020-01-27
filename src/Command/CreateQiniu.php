<?php
namespace Minr\Auth\Qizue\Command;

use Flarum\User\User;

/**
 * Class CreateQiniu
 *
 * @package Minr\Auth\Qizue\Command
 */
class CreateQiniu {
    /**
     * The user performing the action.
     *
     * @var User
     */
    public $actor;

    /**
     * The attributes of the new link.
     *
     * @var string
     */
    public $type;

    /**
     * @param User   $actor The user performing the action.
     * @param string $type
     */
    public function __construct(User $actor, string $type) {
        $this->actor    = $actor;
        $this->type     = $type;
    }
}
