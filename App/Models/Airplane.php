<?php

namespace  App\Models;

use App\Core\Model;

class Airplane extends Model
{

    protected int $id;
    protected string $registration;
    protected string $type;
    protected string $picture;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getRegistration(): string
    {
        return $this->registration;
    }

    public function setRegistration(string $registration): void
    {
        $this->registration = $registration;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getPicture(): string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): void
    {
        $this->picture = $picture;
    }
}