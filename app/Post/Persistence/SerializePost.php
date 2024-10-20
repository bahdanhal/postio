<?php

declare(strict_types=1);

namespace Postio\Post\Persistence;

use Postio\Post\Post;

final readonly class SerializePost
{
    public function __invoke(Post $post): array
    {
        return [
            'id' => $post->getId(),
            'title' => $post->getTitle(),
            'description' => $post->getDescription(),
        ];
    }
}
