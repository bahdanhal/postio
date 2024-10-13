<?php

declare(strict_types=1);

namespace Postio\Site\Response\ResponseData;

final readonly class NotFoundResponseData extends ResponseData
{
    public function serialize(): array
    {
        return [];
    }
}
