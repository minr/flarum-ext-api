<?php
namespace Minr\Auth\Qizue\Command;

use Flarum\User\AssertPermissionTrait;
use Flarum\User\Exception\PermissionDeniedException;
use Flarum\User\User;
use Flarum\User\UserRepository;
use Illuminate\Validation\ValidationException;
use Minr\Auth\Qizue\Avatar;
use Minr\Auth\Qizue\Validator\AvatarValidator;

class SaveAvatarHandler {
    use AssertPermissionTrait;

    /**
     * @var UserRepository
     */
    protected $users;

    /**
     * @var AvatarValidator
     */
    protected $validator;


    /**
     * SaveAvatarHandler constructor.
     *
     * @param AvatarValidator $validator
     */
    public function __construct(AvatarValidator $validator, User $user) {
        $this->validator = $validator;
        $this->users     = $user;
    }

    /**
     * @param SaveAvatar $command
     * @return Avatar
     * @throws PermissionDeniedException
     * @throws ValidationException
     */
    public function handle(SaveAvatar $command) {
        $actor  = $command->actor;
        $uid    = $command->uid;
        $avatar = $command->avatar;
        $user   = $this->users->findOrFail($uid);

        if($user->id !== $actor->id){
            $this->assertCan($actor, 'edit', $user);
        }

        $this->validator->assertValid(['avatar' => $avatar]);

        $user->changeAvatarPath($avatar);
        $saveAvatar  = Avatar::build(
            $avatar, $uid,
        );
        $user->save();
        return $saveAvatar;
    }

}
