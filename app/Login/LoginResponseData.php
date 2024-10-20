<?php

declare(strict_types=1);

namespace Postio\Login;

use Postio\Site\Response\ResponseData\ResponseData;

final readonly class LoginResponseData extends ResponseData
{
    public function __construct(
        private ?true $fail = null,
    ) {
    }

    public function serialize(): array
    {
        return ['fail' => $this->fail];
    }
}
