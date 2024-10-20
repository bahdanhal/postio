<?php

declare(strict_types=1);

namespace Postio\Site\Response;

use Postio\Site\Response\ResponseData\ResponseData;

abstract readonly class Response
{
    protected ResponseData $data;
    protected ?string $templateName;
    protected int $statusCode;

    public function getData(): ResponseData
    {
        return $this->data;
    }

    public function getTemplateName(): ?string
    {
        return $this->templateName;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }
}
