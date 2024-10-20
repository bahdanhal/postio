<?php

declare(strict_types=1);

namespace Postio\Post;

use Postio\Site\Auth\Auth;
use Postio\Site\Request\Request;
use Postio\Site\Response\EmptyResponse;
use Postio\Site\Services\ServiceContainer;

final readonly class UpdatePostController
{
    private Auth $auth;
    private UpdatePost $updatePost;
    private GetPostFromRequest $getPostFromRequest;

    public function __construct(ServiceContainer $serviceContainer)
    {
        $this->auth = $serviceContainer->getAuth();
        $this->updatePost = $serviceContainer->getUpdatePost();
        $this->getPostFromRequest = $serviceContainer->getGetPostFromRequest();
    }

    public function __invoke(Request $request): EmptyResponse
    {
        $this->auth->redirectUnauthorizedUser($request->getCookies());

        ($this->updatePost)(($this->getPostFromRequest)($request));

        return new EmptyResponse();
    }
}
