<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\JsonResponse;
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

    public function buy() :JsonResponse
    {
        $request = $this->request();
        if ($request->isContentTypeJSON())
        {
            $data = $request->getRawBodyJSON();
            if (isset($data->flight_number))
            {
                $tickets = Ticket::getAll();
                $newTicketNum = rand(1000, 9999);
                foreach ($tickets as $ticket) {
                    if ($ticket->getTicketNumber() == $newTicketNum) {
                        $_SESSION['ticket_purchase_success'] = false;
                        return new JsonResponse(['success' => false]);
                    }
                }
                $auth = $this->app->getAuth();
                $newTicket = new Ticket();
                $newTicket->setTicketNumber($newTicketNum);
                $newTicket->setPassengerId($auth->getLoggedUserId());
                $newTicket->setFlightNumber($data->flight_number);

                $newTicket->save();
                $_SESSION['ticket_purchase_success'] = true;
            }
        }
        return new JsonResponse(['success' => true]);
    }

    public function download()
    {
        $id = (int) $this->request()->getValue('id');
        $ticket = Ticket::getOne($id);
        $passenger = User::getOne($ticket->getPassengerId());
        $departureDate = Schedule::getAll('`flight_number` LIKE ?', [$ticket->getFlightNumber()], limit: 1);

        if (is_null($ticket)) {
            throw new HTTPException(404);
        } else {
            // Include the template and pass the ticket and passenger objects
            ob_start(); // Start output buffering
            include 'public/php/ticket_template.php';
            $content = ob_get_clean(); // Get the buffered content

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

