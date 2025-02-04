<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\User;
use App\Core\HTTPException;
use App\Helpers\FileStorage;
use App\Core\Responses\RedirectResponse;

class UserController extends AControllerBase
{
    public function index(): Response
    {
        return $this->html(
            [
                'users' => User::getAll()
            ]
        );
    }
    public function add(): Response
    {
        return $this->html();
    }

    public function register(): Response
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
                    'users' => null,
                    'errors' => $formErrors
                ], ($id > 0) ? 'edit' : 'add'
            );
        }
        try
        {
            if ($id > 0)
                $user = User::getOne($id);
            else
                $user = new User();

            $user->setPassword($this->request()->getValue('password'));
            $user->setEmail($this->request()->getValue('email'));
            $user->setName($this->request()->getValue('name'));
            $user->setAccess(0);

            $user->save();

            return new RedirectResponse($this->url("home.index"));
        }
        catch (\PDOException $e) {

            error_log($e->getMessage());
            $formErrors[] = "Something went wrong while saving the user. Please try again.";

            return $this->html(
                [
                    'users' => $user ?? null,
                    'errors' => $formErrors
                ], ($id > 0) ? 'edit' : 'add'
            );
        }
    }

    public function edit(): Response
    {
        $id = (int) $this->request()->getValue('id');
        $user = User::getOne($id);

        if (is_null($user)) {
            throw new HTTPException(404);
        }

        return $this->html(
            [
                'user' => $user
            ]
        );
    }
    public function delete()
    {
        $id = (int) $this->request()->getValue('id');
        $user = User::getOne($id);

        if (is_null($user)) {
            throw new HTTPException(404);
        } else {
            FileStorage::deleteFile($user->getEmail());
            $user->delete();
            return new RedirectResponse($this->url("user.index"));
        }
    }

    private function formErrors(): array
    {
        $errors = [];

        if (empty($this->request()->getValue('password'))) {
            $errors[] = "Password is required.";
        }
        if (empty($this->request()->getValue('email'))) {
            $errors[] = "Email is required.";
        } elseif (!filter_var($this->request()->getValue('email'), FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }
        //if (empty($this->request()->getValue('name'))) {
        //    $errors[] = "Name is required.";
        //}
        //if (empty($this->request()->getValue('access')) && $this->request()->getValue('access') !== '0') {
        //    $errors[] = "Access level is required.";
        //} elseif (!is_numeric($this->request()->getValue('access'))) {
        //    $errors[] = "Access level must be a number.";
        //}

        return $errors;
    }
}
