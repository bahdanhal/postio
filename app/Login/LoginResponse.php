<?php

declare(strict_types=1);

namespace Postio\Login;

use Postio\Site\Response\Response;
use Postio\Site\Response\ResponseData\ResponseData;

final readonly class LoginResponse extends Response
{
    public function __construct(
        protected ResponseData $data = new LoginResponseData(),
        protected string $templateName = 'login.html.twig',
        protected int $statusCode = 200,
    ){
    }
}
