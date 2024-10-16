<?php

declare(strict_types=1);

namespace Postio\Site\Response;

use Postio\Site\Response\ResponseData\NotFoundResponseData;

final readonly class NotFoundResponse extends Response
{
    public function __construct(
        NotFoundResponseData $data = new NotFoundResponseData(),
        string $templateName = '404.html.twig',
        int $statusCode = 404,
    ){
        $this->data = $data;
        $this->templateName = $templateName;
        $this->statusCode = $statusCode;
    }
}
