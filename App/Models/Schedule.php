<?php

namespace  App\Models;

use App\Core\Model;

class Schedule extends Model
{

    protected int $id;
    protected string $flight_number;
    protected $date;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getFlightNumber(): string
    {
        return $this->flight_number;
    }

    public function setFlightNumber(string $flight_number): void
    {
        $this->flight_number = $flight_number;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setPassportId($date): void
    {
        $this->date = $date;
    }
}