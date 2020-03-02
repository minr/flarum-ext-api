<?php
namespace Minr\Auth\Qizue\Command;

use Flarum\User\AssertPermissionTrait;
use Flarum\User\Exception\PermissionDeniedException;
use Flarum\User\User;
use Flarum\User\UserRepository;
use Flarum\User\UserValidator;
use Illuminate\Validation\ValidationException;
use Minr\Auth\Qizue\Name;
use Minr\Auth\Qizue\Validator\NameValidator;

class PutNameHandler {

    use AssertPermissionTrait;

    /**
     * @var UserRepository
     */
    protected $users;

    /**
     * @var NameValidator
     */
    protected $validator;


    /**
     * SaveAvatarHandler constructor.
     *
     * @param NameValidator $validator
     * @param User          $user
     */
    public function __construct(NameValidator $validator, User $user) {
        $this->validator = $validator;
        $this->users     = $user;
    }

    /**
     * @param PutName $command
     * @return Name
     * @throws PermissionDeniedException
     * @throws ValidationException
     */
    public function handle(PutName $command) {
        $actor  = $command->actor;
        $uid    = $command->uid;
        $name   = $command->name;
        $user   = $this->users->findOrFail($uid);

        if($user->id !== $actor->id){
            $this->assertCan($actor, 'edit', $user);
        }

        $this->validator->assertValid([
            'name' => $name
        ]);

        Name::unguard();

        $usernameRequest = Name::firstOrNew([
            'user_id' => $actor->id,
        ]);

        $usernameRequest->user_id = $actor->id;
        $usernameRequest->requested_username = $name;
        $usernameRequest->status = 'Sent';
        $usernameRequest->reason = null;
        $usernameRequest->created_at = time();

        $usernameRequest->save();

        return $usernameRequest;
    }
}
