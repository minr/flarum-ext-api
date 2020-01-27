<?php
namespace Minr\Auth\Qizue\Command;

use Flarum\User\AssertPermissionTrait;
use Minr\Auth\Qizue\Qiniu;

class CreateQiniuHandler {
    use AssertPermissionTrait;


    /**
     * @param CreateQiniu $command
     * @return Qiniu
     * @throws \Flarum\User\Exception\NotAuthenticatedException
     */
    public function handle(CreateQiniu $command){
        $actor  = $command->actor;
        $data   = $command->data;

        $this->assertRegistered($actor);
        $qiniu  = Qiniu::build(
            '', ''
        );

        return $qiniu;
    }
}
