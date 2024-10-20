<?php

declare(strict_types=1);

namespace Postio\Site\Response;

use Postio\Site\Response\ResponseData\EmptyResponseData;
use Postio\Site\Response\ResponseData\ResponseData;

final readonly class EmptyResponse extends Response
{
    public function __construct(
        protected ResponseData $data = new EmptyResponseData(),
        protected ?string $templateName = null,
        protected int $statusCode = 204,
    ) {
    }
}
