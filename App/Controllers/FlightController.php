<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Flight;
use App\Core\HTTPException;
use App\Helpers\FileStorage;
use App\Core\Responses\RedirectResponse;

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

    public function add(): Response
    {
        return $this->html();
    }

    public function save()
    {
        $id = (int)$this->request()->getValue('id');
        $oldFlightNumber = "";

        // Check if we are updating an existing flight or adding a new one
        if ($id > 0) {
            $flight = Flight::getOne($id);
            $oldFlightNumber = $flight->getFlightNumber();
        } else {
            $flight = new Flight();
        }

        // Set the properties of the flight model from the form data
        $flight->setFlightNumber($this->request()->getValue('flight_number')); // Ensure correct form input name
        $flight->setOrigin($this->request()->getValue('origin')); // Ensure correct form input name
        $flight->setDestination($this->request()->getValue('destination')); // Ensure correct form input name

        // Validate the form fields
        $formErrors = $this->formErrors();
        if (count($formErrors) > 0) {
            return $this->html(
                [
                    'flight' => $flight,
                    'errors' => $formErrors
                ], ($id > 0) ? 'edit' : 'add'
            );
        } else {
            // If updating, delete the old file if it exists
            if ($oldFlightNumber != "") {
                FileStorage::deleteFile($oldFlightNumber);
            }

            // Save the flight data
            $flight->save();

            // Redirect to the flight listing page
            return new RedirectResponse($this->url("flight.index"));
        }
    }



    public function edit(): Response
    {
        $id = (int) $this->request()->getValue('id');
        $flight = Flight::getOne($id);

        if (is_null($flight)) {
            throw new HTTPException(404);
        }

        return $this->html(
            [
                'flight' => $flight
            ]
        );
    }
    public function delete()
    {
        $id = (int) $this->request()->getValue('id');
        $flight = Flight::getOne($id);

        if (is_null($flight)) {
            throw new HTTPException(404);
        } else {
            FileStorage::deleteFile($flight->getFlightNumber());
            $flight->delete();
            return new RedirectResponse($this->url("flight.index"));
        }
    }

    private function formErrors(): array
    {
        $errors = [];

        // Validate flight_number
        if ($this->request()->getValue('flight_number') == "") {
            $errors[] = "Pole Číslo letu musí byť vyplnené!";
        } elseif (!preg_match("/^[A-Z0-9]+$/", $this->request()->getValue('flight_number'))) {
            // Flight number can only contain uppercase letters and numbers (as per the typical format)
            $errors[] = "Číslo letu musí obsahovať iba písmená a čísla!";
        }

        // Validate origin
        if ($this->request()->getValue('origin') == "") {
            $errors[] = "Pole Pôvod musí byť vyplnené!";
        }

        return $errors;
    }


}
