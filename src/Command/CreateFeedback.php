<?php
namespace Minr\Auth\Qizue\Command;

use Flarum\User\User;

class CreateFeedback {

    /**
     * The user performing the action.
     *
     * @var User
     */
    public $actor;

    /**
     * @var array
     */
    public $data;

    /**
     * The current ip address of the actor.
     *
     * @var string
     */
    public $ipAddress;

    /**
     * @var string
     */
    public $version;

    /**
     * @var string
     */
    public $platform;

    /**
     * CreateFeedback constructor.
     *
     * @param User   $actor
     * @param array  $data
     * @param string $ipAdress
     * @param string $version
     * @param string $platform
     */
    public function __construct(User $actor,
                                array $data,
                                string $ipAdress = '127.0.0.1',
                                string $version = '0.0.0',
                                string $platform = 'unkown') {
        $this->actor    = $actor;
        $this->data     = $data;
        $this->ipAddress= $ipAdress;
        $this->version  = $version;
        $this->platform = $platform;
    }
}
