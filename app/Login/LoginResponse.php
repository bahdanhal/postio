<?php

declare(strict_types=1);

namespace Postio\Login;

use Postio\Site\Response\Response;
use Postio\Site\Response\ResponseData\ResponseData;

final readonly class LoginResponse extends Response
{
    protected ResponseData $data;

    public function __construct(
        protected ?true $fail = null,
        protected ?string $templateName = 'login.html.twig',
        protected int $statusCode = 200,
    ) {
        $this->data = new LoginResponseData($this->fail);
    }
}
