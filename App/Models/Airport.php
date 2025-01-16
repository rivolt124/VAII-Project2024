<?php

namespace  App\Models;

use App\Core\Model;

class Airport extends Model
{

    protected int $id;
    protected string $IATA;
    protected string $airport_name;
    protected string $country;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getIATA(): string
    {
        return $this->IATA;
    }

    public function setIATA(string $IATA): void
    {
        $this->IATA = $IATA;
    }

    public function getAirportName(): string
    {
        return $this->airport_name;
    }

    public function setAirportName(string $name): void
    {
        $this->airport_name = $name;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): void
    {
        $this->country = $country;
    }
}