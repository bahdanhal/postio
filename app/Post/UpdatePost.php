<?php

declare(strict_types=1);

namespace Postio\Post;

use Postio\Post\Persistence\PostRepository;

final readonly class UpdatePost
{
    public function __construct(private PostRepository $postRepository)
    {
    }

    public function __invoke(Post $post): void
    {
        $this->postRepository->updatePost($post);
    }
}
