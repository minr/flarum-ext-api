<?php
namespace Minr\Auth\Qizue\Api\Controller;

use Flarum\Api\Controller\AbstractCreateController;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Arr;
use Minr\Auth\Qizue\Command\CreateFeedback;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;

class FeedbackController extends AbstractCreateController{

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
        $actor      = $request->getAttribute('actor');
        $version    = $request->getHeader('x-version-name');
        $platform   = $request->getHeader('x-platform');
        $platform   = strtolower($platform[0] ?? 'unkown');
        $version    = $version[0] ?? '';
        $ipAddress  = Arr::get($request->getServerParams(), 'REMOTE_ADDR', '127.0.0.1');
        return $this->bus->dispatch(
            new CreateFeedback(
                $actor,
                Arr::get($request->getParsedBody(), 'data', []),
                $ipAddress,
                $version,
                $platform
            )
        );
    }
}
