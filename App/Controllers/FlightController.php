<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Flight;

class FlightController extends AControllerBase
{
    /**
     * Example of an action (authorization needed)
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     */
    public function index(): Response
    {
        return $this->html(
            [
                'flights' => Flight::getAll()
            ]
        );
    }

    public function create()
    {
        if ($this->request()->getMethod() === 'POST') {
            $data = $this->request()->getPost();
            $this->db()->query("INSERT INTO flights (flight_number, origin, destination) VALUES (?, ?, ?)", [
                $data['flight_number'], $data['origin'], $data['destination']
            ]);
            $this->redirect('flights');
        }
        return $this->html();
    }

    public function edit()
    {
        $flight_number = $this->request()->getParam('flight_number');
        $flight = $this->db()->fetch("SELECT * FROM flights WHERE flight_number = ?", [$flight_number]);

        if ($this->request()->getMethod() === 'POST') {
            $data = $this->request()->getPost();
            $this->db()->query("UPDATE flights SET origin = ?, destination = ? WHERE flight_number = ?", [
                $data['origin'], $data['destination'], $flight_number
            ]);
            $this->redirect('flights');
        }
        return $this->html(['flight' => $flight]);
    }
    public function delete()
    {
        $flight_number = $this->request()->getParam('flight_number');
        $this->db()->query("DELETE FROM flights WHERE flight_number = ?", [$flight_number]);
        $this->redirect('flights');
    }

}
