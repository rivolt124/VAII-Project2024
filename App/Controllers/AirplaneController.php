<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Airplane;
use App\Core\HTTPException;
use App\Helpers\FileStorage;
use App\Core\Responses\RedirectResponse;
//use App\Models\Post;

class AirplaneController extends AControllerBase
{
    public function index(): Response
    {
        return $this->html(
            [
                'airplanes' => Airplane::getAll()
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
                    'airplanes' => null,
                    'errors' => $formErrors
                ], ($id > 0) ? 'edit' : 'add'
            );
        }
        try
        {
            if ($id > 0)
                $airplane = Airplane::getOne($id);
            else
                $airplane = new Airplane();

            // Set flight properties from the request
            $airplane->setRegistration($this->request()->getValue('registration'));
            $airplane->setType($this->request()->getValue('type'));
            $airplane->setPicture($this->request()->getValue('picture') ?: "../../public/images/vaiicko_logo.png");

            $airplane->save();

            return new RedirectResponse($this->url("airplane.index"));
        }
        catch (\PDOException $e) {

            error_log($e->getMessage());
            $formErrors[] = "Something went wrong while saving the flight. Please try again.";

            return $this->html(
                [
                    'airplanes' => $airplane ?? null,
                    'errors' => $formErrors
                ], ($id > 0) ? 'edit' : 'add'
            );
        }
    }

    public function edit(): Response
    {
        $id = (int) $this->request()->getValue('id');
        $airplane = Airplane::getOne($id);

        if (is_null($airplane)) {
            throw new HTTPException(404);
        }

        return $this->html(
            [
                'airplane' => $airplane
            ]
        );
    }
    public function delete()
    {
        $id = (int) $this->request()->getValue('id');
        $airplane = Airplane::getOne($id);

        if (is_null($airplane)) {
            throw new HTTPException(404);
        } else {
            FileStorage::deleteFile($airplane->getRegistration());
            $airplane->delete();
            return new RedirectResponse($this->url("airplane.index"));
        }
    }

    private function formErrors(): array
    {
        $errors = [];

        if (!preg_match('/^[A-Z0-9]{3,10}$/', $this->request()->getValue('registration'))) {
            $errors[] = "Registracia musi mat pismena, cisla a len uppercase!";
        }
        if (strlen($this->request()->getValue('type')) != 4) {
            $errors[] = "Type musi byt aspon 4 znaky dlhy!";
        } elseif (!preg_match("/^[A-Z0-9]+$/", $this->request()->getValue('type')))
            $errors[] = "Type môže pozostávať len z veľkych písmen!";

        $picture = $this->request()->getValue('picture');
        if ($picture && !filter_var($picture, FILTER_VALIDATE_URL)) {
            $errors[] = "Obrazok musi byt validne URL!";
        }

        return $errors;
    }

}
