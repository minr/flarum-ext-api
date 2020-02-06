<?php
namespace Minr\Auth\Qizue\Command;

use Flarum\User\AssertPermissionTrait;
use Minr\Auth\Qizue\Upgrade;

class CreateUpgradeHandler {
    use AssertPermissionTrait;

    /**
     * @param CreateUpgrade $command
     * @return Upgrade
     */
    public function handle(CreateUpgrade $command) {
        $actor              = $command->actor;
        $currentVersion     = $command->version;
        $currentPlatform    = $command->platform;

        $needUpgrade        = false;
        $version            = '';
        $content            = '';
        $downLink           = '';

        if($currentPlatform !== 'unknow' &&  $currentVersion) {
            $data               = \Minr\Auth\Qizue\Api\Data\Upgrade::$$currentPlatform;
            if(empty($data)){
                $needUpgrade    = false;
            }else{
                //开始解析了
                $version        = $data['version'] ?? '';
                $content        = $data['content'] ?? '';
                $downLink       = $data['downLink'] ?? '';

                if($version === '' || version_compare($version, $currentVersion, '<=')){
                    $needUpgrade = false;
                }else {
                    $needUpgrade = true;
                }
            }
        }

        $upgrade            = Upgrade::build(
            $content, $version, $downLink, $needUpgrade
        );
        return $upgrade;
    }
}
