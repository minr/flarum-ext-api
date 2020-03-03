<?php
namespace Minr\Auth\Qizue\Api\Controller;
use Flarum\Api\Controller\AbstractCreateController;
use Flarum\Bus\Dispatcher;
use Illuminate\Support\Arr;
use Minr\Auth\Qizue\Api\Serializer\UsersNameSerializer;
use Minr\Auth\Qizue\Command\PutUserName;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;

class PutUserNameController extends AbstractCreateController{
    /**
     * {@inheritdoc}
     */
    public $serializer = UsersNameSerializer::class;

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
        $name   = Arr::get($request->getParsedBody(), 'name', '');

        return $this->bus->dispatch(
            new PutUserName($actor, $id, $name)
        );
    }
}
