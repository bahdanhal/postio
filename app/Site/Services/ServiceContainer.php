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
    private PDO $connection;
    private Auth $auth;
    private SerializeUser $serializeUser;
    private UnserializeUser $unserializeUser;
    private UserRepository $userRepository;
    private SerializePost $serializePost;
    private UnserializePost $unserializePost;
    private PostRepository $postRepository;
    private GetAllPosts $getAllPosts;
    private DeletePostById $deletePostById;
    private CreatePost $createPost;
    private UpdatePost $updatePost;
    private GetPostFromRequest $getPostFromRequest;

    public function __construct()
    {
        $this->unserializeUser = new UnserializeUser();
        $this->serializeUser = new SerializeUser();
        $this->connection = new PDO($_ENV["DB_DSN"], $_ENV["DB_USER"], $_ENV["DB_PASS"]);

        $this->userRepository = new UserRepository($this->connection, $this->unserializeUser, $this->serializeUser);
        $this->auth = new Auth(
            $this->userRepository,
        );
        $this->serializePost = new SerializePost();
        $this->unserializePost = new UnserializePost();
        $this->postRepository = new PostRepository($this->connection, $this->unserializePost, $this->serializePost);
        $this->getAllPosts = new GetAllPosts($this->postRepository);
        $this->deletePostById = new DeletePostById($this->postRepository);
        $this->createPost = new CreatePost($this->postRepository);
        $this->updatePost = new UpdatePost($this->postRepository);
        $this->getPostFromRequest = new GetPostFromRequest();
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
