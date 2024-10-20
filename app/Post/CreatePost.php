<?php

declare(strict_types=1);

namespace Postio\Post;

use Postio\Post\Persistence\PostRepository;

final readonly class CreatePost
{
    public function __construct(private PostRepository $postRepository)
    {
    }

    public function __invoke(Post $post): int
    {
        return $this->postRepository->createPost($post);
    }
}
