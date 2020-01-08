<?php
namespace Minr\Auth\Qizue;

use Flarum\Api\Controller\AbstractShowController;
use Flarum\Api\Serializer\UserSerializer;
use Illuminate\Contracts\Bus\Dispatcher;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;

class Qiniu extends AbstractShowController {

    /**
     * @var UserSerializer
     */
    public $serializer = UserSerializer::class;

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

    /***
     * @param ServerRequestInterface $request
     * @param Document               $document
     * @return mixed|void
     */
    protected function data(ServerRequestInterface $request, Document $document) {
        print_r($request);
    }
}
