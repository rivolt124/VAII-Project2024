<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Flight;
use App\Core\HTTPException;
use App\Helpers\FileStorage;
use App\Core\Responses\RedirectResponse;
use App\Models\Post;

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
        $formErrors = $this->formErrors();
        if (count($formErrors) > 0) {
            return $this->html(
                [
                    'flight' => null, // No specific flight on errors
                    'errors' => $formErrors
                ], ($id > 0) ? 'edit' : 'add'
            );
        }
        try
        {
            if ($id > 0)
                $flight = Flight::getOne($id);
            else
                $flight = new Flight();

            // Set flight properties from the request
            $flight->setFlightNumber($this->request()->getValue('flight_number'));
            $flight->setOrigin($this->request()->getValue('origin'));
            $destination = $this->request()->getValue('destination');
            $flight->setDestination($destination ?: "N/A");

            $flight->save();

            return new RedirectResponse($this->url("flight.index"));
        }
        catch (\PDOException $e) {

            error_log($e->getMessage());
            $formErrors[] = "Something went wrong while saving the flight. Please try again.";

            return $this->html(
                [
                    'flight' => $flight ?? null,
                    'errors' => $formErrors
                ], ($id > 0) ? 'edit' : 'add'
            );
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

        if ($this->request()->getValue('flight_number') == "") {
            $errors[] = "Pole Číslo letu musí byť vyplnené!";
        } elseif (!preg_match("/^[A-Z0-9]+$/", $this->request()->getValue('flight_number'))) {
            $errors[] = "Číslo letu musí obsahovať iba veľké písmená a čísla!";
        } elseif (strlen($this->request()->getValue('flight_number')) > 6) {
            $errors[] = "Číslo letu môže mať maximálne 6 znakov!";
        }


        // Validate origin
        if ($this->request()->getValue('origin') == "") {
            $errors[] = "Origin musí byť zadefinovaný!";
        } elseif (!preg_match("/^[A-Z]+$/", $this->request()->getValue('origin'))) {
            $errors[] = "Origin môže pozostávať len z veľkych písmen";
        }

        if (!preg_match("/^[A-Z]+$/", $this->request()->getValue('destination')) && $this->request()->getValue('destination') != "") {
            $errors[] = "Destination môže pozostávať len z veľ'kych písmen";
        }
        return $errors;
    }


}
