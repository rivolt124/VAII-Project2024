<?php

namespace  App\Models;

use App\Core\Model;

class Passanger extends Model
{

    protected int $id;
    protected int $passport_id;
    protected string $email;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getPassportId(): string
    {
        return $this->passport_id;
    }

    public function setPassportId(string $passport_id): void
    {
        $this->passport_id = $passport_id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
}