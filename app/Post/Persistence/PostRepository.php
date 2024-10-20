<?php

declare(strict_types=1);

namespace Postio\Post\Persistence;

use PDO;

final readonly class PostRepository
{
    public function __construct(
        private PDO $database,
        private UnserializePost $unserializePost,
        private SerializePost $serializePost,
    ) {
    }

    public function getAllPosts(): array
    {
        $query = $this->database->prepare(
            'SELECT * FROM posts',
        );
        $postsResult = $query->fetchAll();

        $posts = array_map($this->unserializePost, $postsResult);

        return $posts;
    }
}
