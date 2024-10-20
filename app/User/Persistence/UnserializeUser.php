<?php

declare(strict_types=1);

namespace Postio\User\Persistence;

use Postio\User\User;
use Postio\User\UserRole;

final readonly class UnserializeUser
{
    public function __invoke(array $data): User
    {
        return new User(
            (int) $data['id'],
            UserRole::from($data['role']),
            (string) $data['login'],
            (string) $data['passwordHash'],
            (string) $data['authToken'],
        );
    }
}
