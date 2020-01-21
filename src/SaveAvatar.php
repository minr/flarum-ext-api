<?php
namespace Minr\Auth\Qizue;

use Flarum\User\Event\AvatarSaving;
use Flarum\User\User;
use Flarum\User\UserRepository;
use Illuminate\Contracts\Bus\Dispatcher as BusDispatcher;
use Illuminate\Contracts\Events\Dispatcher as EventDispatcher;
use Illuminate\Support\Arr;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class SaveAvatar implements RequestHandlerInterface {
    /**
     * @var UserRepository
     */
    private $users;
    /**
     * @var BusDispatcher
     */
    private $bus;
    /**
     * @var EventDispatcher
     */
    private $events;

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


    /**
     * @inheritDoc
     */
    public function handle(ServerRequestInterface $request): ResponseInterface {
        /**
         * @var $actor User
         */
        $actor      = $request->getAttribute('actor');
        $image      = Arr::get($request->getQueryParams(), 'image', '');

        if($image === ''){
            return new JsonResponse([]);
        }

        $user = $this->users->findOrFail($actor->userId);
        new AvatarSaving($user, $actor, $image);
        return new JsonResponse([
            "image" => $image,
        ]);
    }
}
