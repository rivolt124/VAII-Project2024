<?php

namespace  App\Models;

use App\Core\Model;

class User extends Model
{

    protected int $id;
    protected string $password;
    protected string $email;
    protected string $name;
    protected int $access;
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAccess(): int
    {
        return $this->access;
    }

    public function setAccess(int $access): void
    {
        $this->access = $access;
    }
}