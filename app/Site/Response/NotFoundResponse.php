<?php

declare(strict_types=1);

namespace Postio\Site\Response;

use Postio\Site\Response\ResponseData\EmptyResponseData;
use Postio\Site\Response\ResponseData\ResponseData;

final readonly class NotFoundResponse extends Response
{
    public function __construct(
        protected ResponseData $data = new EmptyResponseData(),
        protected ?string $templateName = '404.html.twig',
        protected int $statusCode = 404,
    ) {
    }
}
