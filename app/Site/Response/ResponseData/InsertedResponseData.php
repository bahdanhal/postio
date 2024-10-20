<?php

declare(strict_types=1);

namespace Postio\Site\Response\ResponseData;

final readonly class InsertedResponseData extends ResponseData
{
    public function __construct(
        private int $id,
    ) {
    }

    public function serialize(): array
    {
        return ['id' => $this->id];
    }
}
