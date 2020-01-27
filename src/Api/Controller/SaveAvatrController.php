<?php
namespace Minr\Auth\Qizue\Api\Controller;

use Flarum\Api\Controller\AbstractShowController;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;

class SaveAvatrController extends AbstractShowController {

    /**
     * @inheritDoc
     */
    protected function data(ServerRequestInterface $request, Document $document) {
    }
}
