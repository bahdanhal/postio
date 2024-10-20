<?php

declare(strict_types=1);

namespace Postio\User\Persistence;

use Postio\User\User;

final readonly class SerializeUser
{
    public function __invoke(User $user): array
    {
        return [
            'id' => $user->getId(),
            'role' => $user->getRole(),
            'login' => $user->getLogin(),
            'passwordHash' => $user->getPasswordHash(),
            'authToken' => $user->getAuthToken(),
        ];
    }
}
