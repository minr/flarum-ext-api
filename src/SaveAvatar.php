<?php
namespace Minr\Auth\Qizue;

use Flarum\Api\Controller\AbstractShowController;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;

class SaveAvatar extends AbstractShowController {

    /**
     * @param ServerRequestInterface $request
     * @param Document               $document
     * @return mixed|void
     */
    protected function data(ServerRequestInterface $request, Document $document) {

    }
}
