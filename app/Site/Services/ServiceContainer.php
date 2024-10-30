<?php

declare(strict_types=1);

namespace Postio\Site\Services;

use Postio\Site\Auth\Auth;
use Postio\User\Persistence\SerializeUser;
use Postio\User\Persistence\UnserializeUser;
use PDO;
use Postio\Post\CreatePost;
use Postio\Post\DeletePostById;
use Postio\Post\GetAllPosts;
use Postio\Post\GetPostFromRequest;
use Postio\Post\Persistence\PostRepository;
use Postio\Post\Persistence\SerializePost;
use Postio\Post\Persistence\UnserializePost;
use Postio\Post\UpdatePost;
use Postio\User\Persistence\UserRepository;

final readonly class ServiceContainer
{
    public function __construct(
        private PDO $connection,
        private Auth $auth,
        private SerializeUser $serializeUser,
        private UnserializeUser $unserializeUser,
        private UserRepository $userRepository,
        private SerializePost $serializePost,
        private UnserializePost $unserializePost,
        private PostRepository $postRepository,
        private GetAllPosts $getAllPosts,
        private DeletePostById $deletePostById,
        private CreatePost $createPost,
        private UpdatePost $updatePost,
        private GetPostFromRequest $getPostFromRequest,
    )
    {
    }

    public function getAuth(): Auth
    {
        return $this->auth;
    }

    public function getGetAllPosts(): GetAllPosts
    {
        return $this->getAllPosts;
    }

    public function getDeletePostById(): DeletePostById
    {
        return $this->deletePostById;
    }

    public function getCreatePost(): CreatePost
    {
        return $this->createPost;
    }
    
    public function getUpdatePost(): UpdatePost
    {
        return $this->updatePost;
    }

    public function getGetPostFromRequest(): GetPostFromRequest
    {
        return $this->getPostFromRequest;
    }
}
