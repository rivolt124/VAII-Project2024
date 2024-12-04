<?php

namespace  App\Models;

use App\Core\Model;

class Flight extends Model
{

    protected ?int $id = null;
    protected ?string $flight_number;
    protected ?string $origin;
    protected ?string $destination;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getFlightNumber(): ?string
    {
        return $this->flight_number;
    }

    public function setFlightNumber(string $flight_number): void
    {
        $this->flight_number = $flight_number;
    }

    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    public function setOrigin(string $origin): void
    {
        $this->origin = $origin;
    }

    public function getDestination(): ?string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): void
    {
        $this->destination = $destination;
    }
}