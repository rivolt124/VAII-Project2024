<?php
/** @var \App\Core\IAuthenticator $auth */
/** @var Array $data */
/** @var \App\Models\Ticket $tickets */
/** @var \App\Core\LinkGenerator $link */

use App\Models\User;
?>

<link rel="stylesheet" href="../../../public/css/crud.css">

<div class="container-fluid pt-5">
    <div class="row">
        <div class="col pb-5">
            <h2 class="text-center">Tickets</h2>
        </div>
    </div>
    <div class="row justify-content-center" id="ticketList">
        <?php foreach ($data['tickets'] as $ticket): ?>
            <div class="col-md-4 col-sm-6 col-12 text-center mb-4">
                <div class="ticket-card shadow">
                    <div class="ticket-header">
                        <h5><?= $ticket->getTicketNumber() ?></h5>
                    </div>
                    <div class="ticket-body">
                        <p><strong>Flight:</strong> <?= $ticket->getFlightNumber() ?></p>
                        <p><strong>Passenger:</strong> <?= User::getOne($ticket->getPassengerId())->getName(); ?></p>
                    </div>
                    <div class="ticket-footer d-flex justify-content-center gap-2">
                        <a href="<?= $link->url('ticket.download', ['id' => $ticket->getId()]) ?>" class="btn btn-primary btn-sm">Download PDF</a>
                        <a href="<?= $link->url('ticket.delete', ['id' => $ticket->getId()]) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this ticket?');">Delete</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
    .ticket-card {
        background: #fff;
        border-radius: 10px;
        padding: 15px;
        width: 100%;
        max-width: 320px;
        border: 2px dashed #007bff;
    }

    .ticket-header {
        background: #007bff;
        color: white;
        padding: 10px;
        font-weight: bold;
        border-radius: 10px 10px 0 0;
    }

    .ticket-body {
        padding: 15px;
    }

    .ticket-footer {
        padding: 10px;
        border-top: 2px dashed #007bff;
    }
</style>
