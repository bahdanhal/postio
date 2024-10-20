<?php

declare(strict_types=1);

namespace Postio\Site\Controller;

use Postio\Site\Request\Request;
use Postio\Site\Response\Response;
use Postio\Site\Services\ServiceContainer;

interface Controller
{
    public function __construct(ServiceContainer $serviceContainer);
    public function __invoke(Request $request): Response;
}
