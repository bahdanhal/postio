<?php

declare(strict_types=1);

namespace Postio\User\Persistence;

use PDO;
use Postio\User\Persistence\SerializeUser;
use Postio\User\Persistence\UnserializeUser;
use Postio\User\User;

final readonly class UserRepository
{
    public function __construct(
        private PDO $database,
        private UnserializeUser $unserializeUser,
        private SerializeUser $serializeUser,
    ) {
    }

    public function getUserByAuthToken(string $authToken): ?User
    {
        $query = $this->database->prepare(
            'SELECT * FROM users WHERE authToken = :authToken',
        );
        $query->execute(['authToken' => $authToken]);
        $user = $query->fetch();

        return ($this->unserializeUser)($user);
    }

    public function getUserByLoginAndPassword(string $login, string $password): ?User
    {
        $getUserQuery = $this->database->prepare(
            'SELECT * FROM users WHERE login = :login AND passwordHash = :passwordHash',
        );
        $getUserQuery->execute(['login' => $login, 'passwordHash' => md5($password)]);
        
        $userResult = $getUserQuery->fetch();
        
        if ($userResult === false) {
            return null;
        }

        return ($this->unserializeUser)($userResult);
    }

    public function updateUserToken(User $user, string $newToken): void
    {
        $updateTokenQuery = $this->database->prepare(
            'UPDATE users SET authToken = :authToken WHERE id = :id',
        );
        $updateTokenQuery->execute(['authToken' => $newToken, 'id' => $user->getId()]);
    }
}
