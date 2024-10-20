<?php

declare(strict_types=1);

namespace Postio\Post;

use Postio\Site\Response\Response;
use Postio\Site\Response\ResponseData\ResponseData;

final readonly class PostsResponse extends Response
{
    protected ResponseData $data;

    public function __construct(
        protected array $posts = [],
        protected string $templateName = 'dashboard.html.twig',
        protected int $statusCode = 200,
    ) {
        $this->data = new PostsResponseData($posts);
    }
}
