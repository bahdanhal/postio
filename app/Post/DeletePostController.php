<?php

declare(strict_types=1);

namespace Postio\Post;

use Postio\Site\Auth\Auth;
use Postio\Site\Request\Request;
use Postio\Site\Response\EmptyResponse;
use Postio\Site\Services\ServiceContainer;

final readonly class DeletePostController
{
    private Auth $auth;
    private DeletePostById $deletePostById;

    public function __construct(ServiceContainer $serviceContainer)
    {
        $this->auth = $serviceContainer->getAuth();
        $this->deletePostById = $serviceContainer->getDeletePostById();
    }

    public function __invoke(Request $request): EmptyResponse
    {
        $this->auth->redirectUnauthorizedUser($request->getCookies());

        ($this->deletePostById)((int) $request->getParameters()['id']);

        return new EmptyResponse();
    }
}
