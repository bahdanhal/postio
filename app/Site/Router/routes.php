<?php

use Postio\Login\GetLoginController;
use Postio\Login\GetLogoutController;
use Postio\Login\PostLoginController;
use Postio\Post\GetAllPostsController;

return
    [
        '/dashboard' =>
            [
                'GET' => GetAllPostsController::class,
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
