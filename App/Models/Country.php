<?php

namespace  App\Models;

use App\Core\Model;

class Country extends Model
{

    protected int $id;
    protected string $ISO;
    protected string $country_name;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getISO(): string
    {
        return $this->ISO;
    }

    public function setISO(string $ISO): void
    {
        $this->ISO = $ISO;
    }

    public function getCountryName(): string
    {
        return $this->country_name;
    }

    public function setCountryName(string $name): void
    {
        $this->country_name = $name;
    }
}