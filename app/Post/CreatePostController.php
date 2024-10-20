<?php

declare(strict_types=1);

namespace Postio\Post;

use Postio\Site\Auth\Auth;
use Postio\Site\Request\Request;
use Postio\Site\Response\InsertedResponse;
use Postio\Site\Services\ServiceContainer;

final readonly class CreatePostController
{
    private Auth $auth;
    private CreatePost $createPost;
    private GetPostFromRequest $getPostFromRequest;

    public function __construct(ServiceContainer $serviceContainer)
    {
        $this->auth = $serviceContainer->getAuth();
        $this->createPost = $serviceContainer->getCreatePost();
        $this->getPostFromRequest = $serviceContainer->getGetPostFromRequest();
    }

    public function __invoke(Request $request): InsertedResponse
    {
        $this->auth->redirectUnauthorizedUser($request->getCookies());

        $id = ($this->createPost)(($this->getPostFromRequest)($request));

        return new InsertedResponse($id);
    }
}
