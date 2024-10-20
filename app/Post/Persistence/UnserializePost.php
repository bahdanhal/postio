<?php

declare(strict_types=1);

namespace Postio\Post\Persistence;

use Postio\Post\Post;

final readonly class UnserializePost
{
    public function __invoke(array $post): Post
    {
        return new Post(
            $post['id'],
            $post['title'],
            $post['description'],
        );
    }
}
