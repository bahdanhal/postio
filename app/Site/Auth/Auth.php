<?php

declare(strict_types=1);

namespace Postio\Site\Auth;

use Postio\User\Persistence\UserRepository;
use Postio\User\User;

final readonly class Auth
{
    public function __construct(
        private UserRepository $userRepository,
    ) {
    }

    public function auth(string $login, string $password): ?User
    {
        $user = $this->userRepository->getUserByLoginAndPassword($login, $password);

        if ($user === null) {
            return null;
        }

        $newToken = bin2hex(openssl_random_pseudo_bytes(8));

        setcookie(
            'authToken',
            $newToken,
            time() + 606024 * 30,
        );

        $this->userRepository->updateUserToken($user, $newToken);

        return $user;
    }

    public function redirectAuthorizedUser(array $cookies): void
    {
        if (
            array_key_exists('authToken', $cookies)
            && $this->userRepository->getUserByAuthToken(
                $cookies['authToken'],
            )
        ) {
            $this->homePageRedirect();
        }
    }

    public function redirectUnauthorizedUser(array $cookies): void
    {
        if (
            !array_key_exists('authToken', $cookies)
            || !$this->userRepository->getUserByAuthToken(
                $cookies['authToken'],
            )
        ) {
            $this->loginPageRedirect();
        }

    }

    public function homePageRedirect(): void
    {
        header("Location: /dashboard");
        die();
    }

    public function loginPageRedirect(): void
    {
        header("Location: /login");
        die();
    }

    public function logout(): never
    {
        setcookie(
            'authToken',
            '',
            time() - 3600,
        );

        header("Location: /login");
        die();
    }
}
