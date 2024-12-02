<?php


use App\Core\Model;

class Flight extends Model
{

    protected ?string $flight_number = null;
    protected ?string $origin;
    protected ?string $destination;

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