<?php
namespace Minr\Auth\Qizue\Api\Controller;
use Flarum\Api\Controller\AbstractCreateController;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;

class UsersInfoController extends AbstractCreateController{

    /**
     * @inheritDoc
     */
    protected function data(ServerRequestInterface $request, Document $document) {

    }
}
