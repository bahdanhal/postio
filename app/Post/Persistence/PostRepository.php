<?php

declare(strict_types=1);

namespace Postio\Post\Persistence;

use PDO;
use Postio\Post\Post;

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
        $query->execute();
        $postsResult = $query->fetchAll();

        $posts = array_map($this->unserializePost, $postsResult);

        return $posts;
    }

    public function deletePostById(int $id): void
    {
        $query = $this->database->prepare(
            'DELETE FROM posts WHERE id = :id',
        );

        $query->execute(['id' => $id]);
    }

    public function createPost(Post $post): int
    {
        $query = $this->database->prepare(
            'INSERT INTO posts (title, description) VALUES (:title, :description);',
        );
        
        $post = ($this->serializePost)($post);
        unset($post['id']);
        $query->execute($post);

        return (int) $this->database->lastInsertId();
    }

    
    public function updatePost(Post $post): void
    {
        $query = $this->database->prepare(
            'UPDATE posts SET id = :id, title = :title, description = :description WHERE id = :id',
        );

        $query->execute(($this->serializePost)($post));
    }
}
