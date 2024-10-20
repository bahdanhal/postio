<?php

declare(strict_types=1);

namespace Postio\Login;

use Postio\Site\Auth\Auth;
use Postio\Site\Controller\Controller;
use Postio\Site\Request\Request;
use Postio\Site\Services\ServiceContainer;

final readonly class GetLogoutController implements Controller
{
    private Auth $auth;

    public function __construct(ServiceContainer $serviceContainer)
    {
        $this->auth = $serviceContainer->getAuth();
    }

    public function __invoke(Request $request): never
    {
        $this->auth->logout();
    }
}
