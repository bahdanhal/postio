<?php

declare(strict_types=1);

namespace Postio\Site\Response;

use Postio\Site\Response\ResponseData\ResponseData;
use Postio\Site\Response\ResponseData\InsertedResponseData;

final readonly class InsertedResponse extends Response
{
    protected ResponseData $data;

    public function __construct(
        protected int $id,
        protected ?string $templateName = null,
        protected int $statusCode = 201,
    ) {
        $this->data = new InsertedResponseData($id);
    }
}
