<?php

declare(strict_types=1);

namespace Postio\Site\Response;

use Postio\Site\Response\ResponseData\NotFoundResponseData;

final readonly class NotFoundResponse extends Response
{
    public function __construct(
        private NotFoundResponseData $data,
        private string $templateName = '404.html.twig',
        private int $statusCode = 404,
    ){
        parent::__construct($data, $templateName, $statusCode);
    }
}
