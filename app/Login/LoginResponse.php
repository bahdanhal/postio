<?php

declare(strict_types=1);

namespace Postio\Login;

use Postio\Site\Response\Response;

final readonly class LoginResponse extends Response
{
    public function __construct(
        private LoginResponseData $data,
        private string $templateName = 'login.html.twig',
        private int $statusCode = 200,
    ){
        parent::__construct($data, $templateName, $statusCode);
    }
}
