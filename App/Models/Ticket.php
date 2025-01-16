<?php

namespace  App\Models;

use App\Core\Model;

class Ticket extends Model
{

    protected int $id;
    protected int $ticket_number;
    protected string $flight_number;
    protected int $passport_id;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTicketNumber(): int
    {
        return $this->ticket_number;
    }

    public function setTicketNumber(int $ticket_number): void
    {
        $this->ticket_number = $ticket_number;
    }

    public function getFlightNumber(): string
    {
        return $this->flight_number;
    }

    public function setFlightNumber(string $flight_number): void
    {
        $this->flight_number = $flight_number;
    }

    public function getPassportId(): int
    {
        return $this->passport_id;
    }

    public function setPassportId(int $passport_id): void
    {
        $this->passport_id = $passport_id;
    }
}