<?php

declare(strict_types=1);

namespace Postio\Site\Router;

use Postio\Site\Request\Request;
use Postio\Site\Response\NotFoundResponse;
use Postio\Site\Render\Render;
use Postio\Site\Services\ServiceContainer;
use Postio\Site\Services\ServiceContainerFactory;

final readonly class Router
{
    private array $routes;
    private Render $render;
    private ServiceContainer $serviceContainer;

    public function __construct()
    {
        $this->routes = include_once 'routes.php';
        $this->render = new Render();
        $this->serviceContainer = (new ServiceContainerFactory())();
    }

    public function __invoke(): void
    {
        $request = new Request($_SERVER, $_REQUEST, $_COOKIE);

        if (array_key_exists($requestUri = $request->getRequestUri(), $this->routes)
            && array_key_exists($request->getMethod(), $this->routes[$requestUri])
        ) {
            $response = (new $this->routes[$requestUri][$request->getMethod()]($this->serviceContainer))($request);
        } else {
            $response = new NotFoundResponse();  
        }

        ($this->render)($response);

    }
}
