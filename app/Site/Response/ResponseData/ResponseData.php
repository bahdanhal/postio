<?php

declare(strict_types=1);

namespace Postio\Site\Response\ResponseData;

abstract readonly class ResponseData
{
    abstract public function serialize(): array;
}
