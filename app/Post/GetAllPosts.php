<?php

declare(strict_types=1);

namespace Postio\Post;

use Postio\Post\Persistence\PostRepository;

final readonly class GetAllPosts
{
    public function __construct(private PostRepository $postRepository)
    {
    }

    public function __invoke(): array
    {
        return $this->postRepository->getAllPosts();
    }
}
