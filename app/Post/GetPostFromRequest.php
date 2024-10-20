<?php

declare(strict_types=1);

namespace Postio\Post;

use Postio\Site\Request\Request;

final readonly class GetPostFromRequest
{
    public function __invoke(Request $request): Post
    {
        $id = null;
        if (array_key_exists('id', $request->getParameters()) && ($request->getParameters()['id'] !== null)) {
            $id = (int) $request->getParameters()['id'];
        }

        return new Post(
            $id, 
            $request->getParameters()['title'],
            $request->getParameters()['description'],
        );
    }
}