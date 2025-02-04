<?php

namespace App\Auth;

use App\Core\IAuthenticator;
use App\Models\User;

class DummyAuthenticator implements IAuthenticator
{

    public function __construct()
    {
        session_start();
    }

    public function login($login, $password): bool
    {
        $users = User::getAll('`email` LIKE ?', [$login], limit: 1);
        if (sizeof($users) > 0) {
            if ($password == $users[0]->getPassword()) { /* password_verify($password, $users[0]->getPassword()) */
                $_SESSION['user'] = $users[0]->getId();
                return true;
            }
        }

        return false;
    }

    public function register($login, $password, $name): bool
    {
        $users = User::getAll();
        foreach ($users as $user) {
            if ($user->getEmail() == $login) {
                return false;
            }
        }
        $newUser = new User();
        $newUser->setEmail($login);
        $newUser->setPassword(password_hash($password, PASSWORD_DEFAULT));
        $newUser->setName($name);
        $newUser->setAccess(0);

        $newUser->save();
        $_SESSION['user'] = $newUser->getId();

        return true;
    }

    public function edit($login, $password, $name): bool
    {
        $users = User::getAll();
        foreach ($users as $user) {
            if ($user->getEmail() == $login)
            {
                $user->setEmail($login);
                $user->setPassword(password_hash($password, PASSWORD_DEFAULT));
                $user->setName($name);
                $user->save();
                return true;
            }
        }
        return false;
    }

    public function logout(): void
    {
        if (isset($_SESSION["user"])) {
            unset($_SESSION["user"]);
            session_destroy();
        }
    }

    public function getUserAccess(): int
    {
        return User::getOne($this->getLoggedUserId())->getAccess();
    }

    public function getLoggedUserName()
    {
        if (!isset($_SESSION['user']))
            return null;

        $user = User::getOne($_SESSION['user']);

        return $user->getName();
    }

    public function isLogged(): bool
    {
        return isset($_SESSION['user']) && $_SESSION['user'] != null;
    }

    public function getLoggedUserId(): mixed
    {
        return $_SESSION['user'];
    }
}
