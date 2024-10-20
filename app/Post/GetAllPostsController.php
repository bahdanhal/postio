<?php

declare(strict_types=1);

namespace Postio\Post;

use Postio\Site\Auth\Auth;
use Postio\Site\Request\Request;
use Postio\Site\Services\ServiceContainer;

final readonly class GetAllPostsController
{
    private Auth $auth;
    private GetAllPosts $getAllPosts;

    public function __construct(ServiceContainer $serviceContainer)
    {
        $this->auth = $serviceContainer->getAuth();
        $this->getAllPosts = $serviceContainer->getGetAllPosts();
    }

    public function __invoke(Request $request): PostsResponse
    {
        $this->auth->redirectUnauthorizedUser($request->getCookies());

        return new PostsResponse(($this->getAllPosts)());
    }
}
