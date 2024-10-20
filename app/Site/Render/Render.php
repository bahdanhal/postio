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
        $loader = new FilesystemLoader('templates');

        $this->twig = new Environment($loader);

    }

    public function __invoke(Response $response): void
    {
        http_response_code($response->getStatusCode());

        if (!$response->getTemplateName()) {
            echo json_encode($response->getData()->serialize()); die;
        }

        echo $this->twig->render($response->getTemplateName(), $response->getData()->serialize());
    }
}
