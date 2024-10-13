<?php

declare(strict_types=1);

namespace Postio\Site\Render;

use \Twig\Loader\FilesystemLoader;
use \Twig\Environment;
use \Postio\Site\Response\Response;

final readonly class Render
{
    private Environment $twig;

    public function __construct()
    {
        // Specify the directory where your templates are stored
        $loader = new FilesystemLoader('templates');

        // Initialize Twig environment
        $this->twig = new Environment($loader);

    }

    public function __invoke(Response $response): void
    {
        http_response_code($response->getStatusCode());

        echo $this->twig->render($response->getTemplateName(), $response->getData()->serialize());
    }
}