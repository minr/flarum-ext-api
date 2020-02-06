<?php
namespace Minr\Auth\Qizue\Command;
use Flarum\User\User;

class CreateUpgrade {
    /**
     * The user performing the action.
     *
     * @var User
     */
    public $actor;

    /**
     * @var string
     */
    public $version;

    /**
     * @var string
     */
    public $platform;

    /**
     * CreateUpgrade constructor.
     *
     * @param User   $actor
     * @param string $version
     * @param string $platform
     */
    public function __construct(User $actor, string $version, string $platform) {
        $this->actor        = $actor;
        $this->version      = $version;
        $this->platform     = $platform;
    }
}
