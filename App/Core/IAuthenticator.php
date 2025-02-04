<?php

namespace App\Core;

/**
 * Interface IAuthenticator
 * Interface for authentication
 * @package App\Core
 */
interface IAuthenticator
{
    /**
     * Perform user login
     * @param $login
     * @param $password
     * @return bool
     */
    public function login($login, $password): bool;

    public function register($login, $password, $name): bool;

    public function edit(mixed $login, mixed $password, mixed $name): bool;

    /**
     * Perform user login
     * @return void
     */
    public function logout(): void;

    public function getUserAccess(): int;

    /**
     * Return name of a logged user
     * @return string
     */
    public function getLoggedUserName();

    /**
     * Return id of a logged user
     * @return mixed
     */
    public function getLoggedUserId(): mixed;

    /**
     * Return, if a user is logged or not
     * @return bool
     */
    public function isLogged(): bool;
}
