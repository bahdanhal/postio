<?php

declare(strict_types=1);

namespace Postio\Site\Response;

use Postio\Site\Response\ResponseData\NotFoundResponseData;
use Postio\Site\Response\ResponseData\ResponseData;

final readonly class NotFoundResponse extends Response
{
    public function __construct(
        protected ResponseData $data = new NotFoundResponseData(),
        protected string $templateName = '404.html.twig',
        protected int $statusCode = 404,
    ){
    }
}
