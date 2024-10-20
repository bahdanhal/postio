<?php

declare(strict_types=1);

namespace Postio\Post;

use Postio\Post\Persistence\PostRepository;

final readonly class DeletePostById
{
    public function __construct(private PostRepository $postRepository)
    {
    }

    public function __invoke(int $id): void
    {
        $this->postRepository->deletePostById($id);
    }
}
