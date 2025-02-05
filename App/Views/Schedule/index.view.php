<?php
/** @var \App\Core\IAuthenticator $auth */
/** @var Array $data */
/** @var \App\Models\Schedule $schedules */
/** @var \App\Core\LinkGenerator $link */
?>
<link rel="stylesheet" href="../../../public/css/crud.css">

<div class="container-fluid">
    <div class="row mb-4 pt-4">
        <div class="col">
            <h2 class="text-center">Scheduled Flights</h2>
            <?php if ($auth->getUserAccess() == 1): ?>
                <div class="text-center">
                    <a href="<?= $link->url('schedule.add') ?>" class="btn btn-outline-danger mt-2">Schedule Flight</a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <table class="table table-striped table-bordered text-center">
                <thead class="table-dark">
                <tr>
                    <th>Flight Number</th>
                    <th>Date</th>
                    <th>Departing</th>
                    <th>Arriving</th>
                    <th class="actions-column"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['schedules'] as $schedule): ?>
                    <tr>
                        <td><?= $schedule->getFlightNumber()?></td>
                        <td><?= $schedule->getDate() ?></td>
                        <td>To Do</td>
                        <td>To Do</td>
                        <td>
                            <?php if ($auth->getUserAccess() == 1): ?>
                                <a href="<?= $link->url('schedule.edit', ['id' => $schedule->getId()]) ?>" class="btn btn-primary btn-sm border-0">Edit</a>
                                <a href="<?= $link->url('schedule.delete', ['id' => $schedule->getId()]) ?>" class="btn btn-danger btn-sm border-0" onclick="return confirm('Are you sure you want to cancel the scheduling of this flight?');">Delete</a>
                            <?php else: ?>
                                <a href="<?= $link->url('ticket.buy', ['flight_number' => $schedule->getFlightNumber()]) ?>" class="btn btn-primary btn-sm border-0">Buy a ticket</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

