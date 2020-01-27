<?php
namespace Minr\Auth\Qizue\Api\Controller;

use Flarum\Api\Controller\AbstractCreateController;
use Flarum\Api\Serializer\CurrentUserSerializer;
use Illuminate\Contracts\Bus\Dispatcher;
use Minr\Auth\Qizue\Command\CreateQiniu;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;

class CreateQiniuController extends AbstractCreateController {
    /**
     * {@inheritdoc}
     */
    public $serializer = CurrentUserSerializer::class;

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
     * {@inheritdoc}
     */
    protected function data(ServerRequestInterface $request, Document $document) {
        return $this->bus->dispatch(
            new CreateQiniu(
                $request->getAttribute('actor'),
                array_get($request->getQueryParams(), 'type', 'discuss')
            )
        );
    }
}
