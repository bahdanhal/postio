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

final readonly class ServiceContainerFactory
{
    public function __invoke(): ServiceContainer
    {
        $unserializeUser = new UnserializeUser();
        $serializeUser = new SerializeUser();
        $connection = new PDO($_ENV["DB_DSN"], $_ENV["DB_USER"], $_ENV["DB_PASS"]);

        $userRepository = new UserRepository($connection, $unserializeUser, $serializeUser);
        $auth = new Auth(
            $userRepository,
        );
        $serializePost = new SerializePost();
        $unserializePost = new UnserializePost();
        $postRepository = new PostRepository($connection, $unserializePost, $serializePost);
        $getAllPosts = new GetAllPosts($postRepository);
        $deletePostById = new DeletePostById($postRepository);
        $createPost = new CreatePost($postRepository);
        $updatePost = new UpdatePost($postRepository);
        $getPostFromRequest = new GetPostFromRequest();

        return new ServiceContainer(
            $connection,
            $auth,
            $serializeUser,
            $unserializeUser,
            $userRepository,
            $serializePost,
            $unserializePost,
            $postRepository,
            $getAllPosts,
            $deletePostById,
            $createPost,
            $updatePost,
            $getPostFromRequest,    
        );
    }
}
