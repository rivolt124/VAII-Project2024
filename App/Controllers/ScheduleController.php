<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Schedule;
use App\Models\Flight;
use App\Core\HTTPException;
use App\Helpers\FileStorage;
use App\Core\Responses\RedirectResponse;
use DateTime;

class ScheduleController extends AControllerBase
{
    public function authorize($action)
    {
        switch ($action) {
            case 'index':
                return $this->app->getAuth()->isLogged();
            case 'add':
            case 'delete':
            case 'save':
            case 'edit':
                return $this->app->getAuth()->isLogged() && $this->app->getAuth()->getUserAccess() == 1;
            default:
                return false;
        }
    }
    public function index(): Response
    {
        return $this->html(
            [
                'schedules' => Schedule::getAll()
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
                    'schedules' => null,
                    'errors' => $formErrors
                ], ($id > 0) ? 'edit' : 'add'
            );
        }
        try
        {
            if ($id > 0)
                $schedule = Schedule::getOne($id);
            else
                $schedule = new Schedule();

            $schedule->setFlightNumber(strtoupper($this->request()->getValue('flightNumber')));
            $schedule->setDate($this->request()->getValue('date'));

            $schedule->save();

            return new RedirectResponse($this->url("schedule.index"));
        }
        catch (\PDOException $e) {

            error_log($e->getMessage());
            $formErrors[] = "Something went wrong while saving the schedule. Please try again.";

            return $this->html(
                [
                    'schedules' => $schedule ?? null,
                    'errors' => $formErrors
                ], ($id > 0) ? 'edit' : 'add'
            );
        }
    }

    public function edit(): Response
    {
        $id = (int) $this->request()->getValue('id');
        $schedule = Schedule::getOne($id);

        if (is_null($schedule)) {
            throw new HTTPException(404);
        }

        return $this->html(
            [
                'schedule' => $schedule
            ]
        );
    }
    public function delete()
    {
        $id = (int) $this->request()->getValue('id');
        $schedule = Schedule::getOne($id);

        if (is_null($schedule)) {
            throw new HTTPException(404);
        } else {
            FileStorage::deleteFile($schedule->getFlightNumber());
            $schedule->delete();
            return new RedirectResponse($this->url("schedule.index"));
        }
    }

    private function formErrors(): array
    {
        $errors = [];

        $flights = Flight::getAll('`flight_number` LIKE ?', [$this->request()->getValue('flightNumber')]);
        if (empty($flights))
            $errors[] = "That flight doesn't exist";

        $date = DateTime::createFromFormat('Y-m-d', $this->request()->getValue('date'));
        if (!$date || $date->format('Y-m-d') !== $this->request()->getValue('date')) {
            $errors[] = "Invalid date format.";
        }

        $schedule = Schedule::getAll();
        foreach ($schedule as $s) {
            if ($s->getFlightNumber() === $this->request()->getValue('flightNumber') && $s->getDate() === $this->request()->getValue('date'))
                $errors[] = "Flight is already scheduled!";
        }

        return $errors;
    }
}
