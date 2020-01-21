<?php
namespace Minr\Auth\Qizue;


use Flarum\Database\AbstractModel;
use Flarum\User\UserRepository;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Contracts\Bus\Dispatcher as BusDispatcher;
use Illuminate\Contracts\Events\Dispatcher as EventDispatcher;
use Illuminate\Support\Arr;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;


class Qiniu implements RequestHandlerInterface {
    private const BUCKET = 'qizue-com';
    private const AK = "S29ut_V70JMF2b1p_XzOxZh7C-gQmLsxjouOxFut";
    private const SK = "W65v5C8O9bAGM5JzYqNf9lYM5dYAWQSa1F16bDtG";
    /**
     * @var int
     */
    private $uid       = 0;

    /**
     * @var string
     */
    private $type      = "avatar";

    /**
     * @var \Flarum\User\UserRepository
     */
    protected $users;

    /**
     * @var Dispatcher
     */
    protected $bus;

    /**
     * @param UserRepository $users
     * @param BusDispatcher $bus
     * @param EventDispatcher $events
     */
    public function __construct(UserRepository $users, BusDispatcher $bus, EventDispatcher $events) {
        $this->users = $users;
        $this->bus = $bus;
        $this->events = $events;
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
     * @inheritDoc
     */
    public function handle(ServerRequestInterface $request): ResponseInterface {
        $actor      = $request->getAttribute('actor');
        $uid        = intval($actor->id);
        $type       = Arr::get($request->getQueryParams(), 'type', 'discuss');
        $this->uid  = $uid;
        $this->type = $type;

        $policy = array(
            'scope'         => self::BUCKET,
            'deadline'      => time() + 3600,
        );

        $policy = json_encode($policy);
        $policy = $this->base64url_encode($policy);

        $sign   = $this->qiniu_hash_hmac($policy);
        $sign   = self::AK . ':' . $this->base64url_encode($sign) . ":" . $policy;

        $rawUID = sprintf("%09d", $uid);
        $path   = implode("/", str_split($rawUID,3));
        return new JsonResponse([
            'token'     => $sign,
            'userId'    => $uid,
            "key"       => "$type/$path/" . time(). "_". mt_rand(0, 99999) . ".png",
        ]);
    }
}
