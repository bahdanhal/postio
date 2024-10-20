<?php

declare(strict_types=1);

namespace Postio\Post;

use Postio\Site\Response\ResponseData\ResponseData;

final readonly class PostsResponseData extends ResponseData
{
    public function __construct(
        private array $posts = [],
    ) {
    }

    public function serialize(): array
    {
        return ['posts' => $this->posts];
    }
}