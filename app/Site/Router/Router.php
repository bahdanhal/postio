<?php

declare(strict_types=1);

namespace Postio\Site\Router;

use Postio\Site\Response\NotFoundResponse;
use Postio\Site\Render\Render;
use Postio\Site\Response\ResponseData\NotFoundResponseData;

final readonly class Router 
{
    private array $routes;
    private Render $render;

    public function __construct()
    {
        $this->routes = require_once('routes.php');
        $this->render = new Render();
    }

    public function __invoke(): void
    {
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (array_key_exists($requestUri, $this->routes)) {
            $response = (new $this->routes[$requestUri]())();
        } else {
            $response = new NotFoundResponse();  
        }
        
        ($this->render)($response);

    }
}
