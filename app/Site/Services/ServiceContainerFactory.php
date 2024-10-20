<?php

declare(strict_types=1);

namespace Postio\Site\Services;

final readonly class ServiceContainerFactory
{
    public function __invoke(): ServiceContainer
    {
        return new ServiceContainer(
        );
    }
}
