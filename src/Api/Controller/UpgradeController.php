<?php
namespace Minr\Auth\Qizue\Api\Controller;
use Flarum\Api\Controller\AbstractShowController;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Arr;
use Minr\Auth\Qizue\Api\Serializer\UpgradeSerializer;
use Minr\Auth\Qizue\Command\CreateUpgrade;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;

class UpgradeController extends AbstractShowController {
    /**
     * @var UpgradeSerializer
     */
    public $serializer  = UpgradeSerializer::class;

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
        $version    = $request->getHeader('x-version-name');
        $platform   = $request->getHeader('x-platform');
        $platform   = strtolower($platform[0] ?? 'unkown');
        $version    = $version[0] ?? '';

        return $this->bus->dispatch(
            new CreateUpgrade(
                $request->getAttribute('actor'),
                $version, $platform
            )
        );
    }
}
