<?php

use Postio\Login\GetLoginController;
use Postio\Login\GetLogoutController;
use Postio\Login\PostLoginController;
use Postio\Post\CreatePostController;
use Postio\Post\UpdatePostController;
use Postio\Post\DeletePostController;
use Postio\Post\GetAllPostsController;

return
    [
        '/dashboard' =>
            [
                'GET' => GetAllPostsController::class,
            ],
        '/post' =>
            [
                'POST' => CreatePostController::class,
                'PUT' => UpdatePostController::class,
                'DELETE' => DeletePostController::class,
            ],
        '/login' =>
            [
                'GET' => GetLoginController::class,
                'POST' => PostLoginController::class,
            ],
        '/logout' =>
            [
                'GET' => GetLogoutController::class,
            ],
    ];
