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
    public function authorize($action)
    {
        switch ($action) {
            case 'index':
            case 'add':
                return $this->app->getAuth()->isLogged() && $this->app->getAuth()->getUserAccess() == 1;
            case 'edit':
            case 'save':
            case 'delete':
                return $this->app->getAuth()->isLogged();
            case 'register':
                return !$this->app->getAuth()->isLogged();
            default:
                return false;
        }
    }
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

            $user->setPassword(password_hash($this->request()->getValue('password'), PASSWORD_DEFAULT));
            $user->setEmail($this->request()->getValue('email'));
            $user->setName($this->request()->getValue('name'));
            $user->setAccess($this->request()->getValue('access') ? $this->request()->getValue('access') : 0);

            $user->save();

            if ($_SESSION['user'] == null)
                $_SESSION['user'] = $user->getId();

            if ($this->app->getAuth()->getUserAccess() == 1)
                return new RedirectResponse($this->url("user.index"));
            else
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
        $access = $user->getAccess();

        if (is_null($user) ||$user->getAccess() == 1) {
            throw new HTTPException(404);
        } else {
            $auth = $this->app->getAuth();
            if($auth->getLoggedUserId() == $id)
               $auth->logout();
            FileStorage::deleteFile($user->getId());
            $user->delete();
            if ($access == 1)
                return new RedirectResponse($this->url("user.index"));
            else
                return new RedirectResponse($this->url("home.index"));
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
        if (empty($this->request()->getValue('name'))) {
            $errors[] = "Please input your name.";
        }
        $access = $this->request()->getValue('access');
        if ($access != 0 && $access != 1) {
            $errors[] = "Invalid access level!";
        }
        return $errors;
    }
}
