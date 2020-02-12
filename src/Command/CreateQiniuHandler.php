<?php
namespace Minr\Auth\Qizue\Command;

use Flarum\User\AssertPermissionTrait;
use Flarum\User\Exception\NotAuthenticatedException;
use Flarum\User\User;
use Minr\Auth\Qizue\Qiniu;

class CreateQiniuHandler {
    use AssertPermissionTrait;

    private const BUCKET = 'qizue-com';
    private const AK = "S29ut_V70JMF2b1p_XzOxZh7C-gQmLsxjouOxFut";
    private const SK = "W65v5C8O9bAGM5JzYqNf9lYM5dYAWQSa1F16bDtG";


    /**
     * @param CreateQiniu $command
     * @return Qiniu
     * @throws NotAuthenticatedException
     */
    public function handle(CreateQiniu $command){
        $actor  = $command->actor;
        $data   = $command->type;

        $this->assertRegistered($actor);

        $policy = array(
            'scope'         => self::BUCKET,
            'deadline'      => time() + 3600,
        );

        $policy = json_encode($policy);
        $policy = $this->base64url_encode($policy);

        $sign   = $this->qiniu_hash_hmac($policy);
        $sign   = self::AK . ':' . $this->base64url_encode($sign) . ":" . $policy;

        $qiniu  = Qiniu::build(
            $sign, $this->getImage($actor, $data)
        );

        return $qiniu;
    }


    /***
     * @param $data
     * @return string
     */
    private function qiniu_hash_hmac($data): string{
        return hash_hmac('sha1', $data, self::SK, true);
    }

    /***
     * @param $data
     * @return string
     */
    private function base64url_encode($data) : string{
        return strtr(base64_encode($data), '+/', '-_');
    }

    /**
     * @param User   $actor
     * @param string $type
     * @return string
     */
    private function getImage(User $actor, string $type): string{
        $rand   = mt_rand(0, 99999);
        $timestamp = time();
        $uid    = $actor->id;
        $uid    = sprintf("%09d",$uid);
        $path   = implode("/",str_split($uid,3));
        return "$type/{$path}/{$timestamp}/$rand.png";
    }
}
