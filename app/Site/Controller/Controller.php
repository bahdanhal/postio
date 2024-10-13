<?php

declare(strict_types=1);

namespace Postio\Site\Controller;

use Postio\Site\Response\Response;

abstract readonly class Controller
{
    abstract public function __invoke(): Response;  
}
