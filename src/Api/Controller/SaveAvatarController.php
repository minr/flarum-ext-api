<?php
namespace Minr\Auth\Qizue\Api\Controller;

use Flarum\Api\Controller\AbstractShowController;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Arr;
use Minr\Auth\Qizue\Api\Serializer\SaveAvatarSerializer;
use Minr\Auth\Qizue\Command\SaveAvatar;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;

class SaveAvatarController extends AbstractShowController {
    /**
     * {@inheritdoc}
     */
    public $serializer = SaveAvatarSerializer::class;

    /**
     * @var Dispatcher
     */
    protected $bus;

    /**
     * @param Dispatcher $bus
     */
    public function __construct(Dispatcher $bus) {
        $this->bus = $bus;
    }

    /**
     * @inheritDoc
     */
    protected function data(ServerRequestInterface $request, Document $document) {
        $id     = Arr::get($request->getQueryParams(), 'id');
        $actor  = $request->getAttribute('actor');
        $avatar = Arr::get($request->getParsedBody(), 'avatar', '');

        return $this->bus->dispatch(
            new SaveAvatar($actor, $id, $avatar)
        );
    }
}
