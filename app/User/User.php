<?php

declare(strict_types=1);

namespace Postio\User;

final readonly class User
{
    public function __construct(
        private int $id,
        private UserRole $role,
        private string $login,
        private string $passwordHash,
        private string $authToken,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getRole(): UserRole
    {
        return $this->role;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    public function getAuthToken(): string
    {
        return $this->authToken;
    }
}
