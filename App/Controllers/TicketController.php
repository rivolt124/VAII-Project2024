<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Ticket;
use App\Models\Schedule;
use App\Models\User;
use App\Core\HTTPException;
use App\Helpers\FileStorage;
use App\Core\Responses\RedirectResponse;
use DateTime;

class TicketController extends AControllerBase
{
    public function index(): Response
    {
        $auth = $this->app->getAuth();
        return $this->html([
            'tickets' => $auth->getUserAccess() == 1
                ? Ticket::getAll()
                : Ticket::getAll('`passenger_id` LIKE ?', [$auth->getLoggedUserId()])
        ]);
    }

    public function buy($flight_number): bool
    {
        $tickets = Ticket::getAll();
        $newTicketNum = rand(1000, 9999);
        foreach ($tickets as $ticket) {
            if ($ticket->getTicketNumber() == $newTicketNum) {
                return false;
            }
        }
        $auth = $this->app->getAuth();
        $newTicket = new Ticket();
        $newTicket->setTicketNumber($newTicketNum);
        $newTicket->setPassengerId($auth->getLoggedUserId());
        $newTicket->setFlightNumber($flight_number);

        $newTicket->save();
        return true;
    }

    public function download()
    {
        $id = (int) $this->request()->getValue('id');
        $ticket = Ticket::getOne($id);
        $passenger = User::getOne($ticket->getPassengerId());

        if (is_null($ticket)) {
            throw new HTTPException(404);
        } else {

            $content = <<<HTML
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Flight Ticket</title>
                    <style>
                        body { font-family: Arial, sans-serif; padding: 20px; }
                        .ticket { border: 2px dashed #000; padding: 20px; max-width: 400px; text-align: center; }
                        .ticket h2 { margin: 0 0 10px; }
                        .ticket p { margin: 5px 0; }
                    </style>
                </head>
                <body>
                    <div class="ticket">
                        <h2>Flight Ticket</h2>
                        <p><strong>Ticket Number:</strong> {$ticket->getTicketNumber()}</p>
                        <p><strong>Flight Number:</strong> {$ticket->getFlightNumber()}</p>
                        <p><strong>Passenger:</strong> {$passenger->getName()}</p>
                    </div>
                </body>
                </html>
                HTML;

            header('Content-Type: text/html');
            header('Content-Disposition: attachment; filename="ticket_' . $ticket->getTicketNumber() . '.html"');

            echo $content;
            exit;
        }
    }



    public function delete()
    {
        $id = (int) $this->request()->getValue('id');
        $ticket = Ticket::getOne($id);

        if (is_null($ticket)) {
            throw new HTTPException(404);
        } else {
            FileStorage::deleteFile($ticket->getFlightNumber());
            $ticket->delete();
            return new RedirectResponse($this->url("ticket.index"));
        }
    }

    private function formErrors(): array
    {
        $errors = [];

        if (empty($this->request()->getValue('flightNumber'))) {
            $errors[] = "Flight number is required.";
        }
        if (empty($this->request()->getValue('date'))) {
            $errors[] = "Date is required.";
        } else {
            $date = DateTime::createFromFormat('Y-m-d', $this->request()->getValue('date'));
            if (!$date || $date->format('Y-m-d') !== $this->request()->getValue('date')) {
                $errors[] = "Invalid date format.";
            }
        }

        return $errors;
    }
}

