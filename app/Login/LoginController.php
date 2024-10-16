<?php

declare(strict_types=1);

namespace Postio\Login;

use Postio\Site\Controller\Controller;

final readonly class LoginController extends Controller
{
    public function __invoke(): LoginResponse
    {
        return new LoginResponse();  
    }
}
