<?php
/** @var \App\Core\IAuthenticator $auth */
/** @var Array $data */
/** @var \App\Models\Schedule $schedules */
/** @var \App\Core\LinkGenerator $link */

use App\Models\Flight;
use App\Models\Airport;
?>
<link rel="stylesheet" href="../../../public/css/crud.css">
<script src="../../../public/js/schedule.index.js"></script>

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
                    <th>Origin</th>
                    <th>Destination</th>
                    <th class="actions-column"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['schedules'] as $schedule): ?>
                    <tr>
                        <td><?= $schedule->getFlightNumber()?></td>
                        <td><?= $schedule->getDate() ?></td>
                        <?php $flight = Flight::getAll('`flight_number` LIKE ?', [$schedule->getFlightNumber()], limit: 1); ?>
                        <?php $airportFrom = Airport::getAll('`IATA` LIKE ?', [$flight[0]->getOrigin()], limit: 1); ?>
                        <?php $airportTo = Airport::getAll('`IATA` LIKE ?', [$flight[0]->getDestination()], limit: 1); ?>
                        <td><?=$airportFrom[0]->getAirportName()?></td>
                        <?php if($airportTo[0] != null): ?>
                            <td><?=$airportTo[0]->getAirportName()?></td>
                        <?php else: ?>
                            <td>N/A</td>
                        <?php endif; ?>
                        <td>
                            <?php if ($auth->getUserAccess() == 1): ?>
                                <a href="<?= $link->url('schedule.edit', ['id' => $schedule->getId()]) ?>" class="btn btn-primary btn-sm border-0">Edit</a>
                                <a href="<?= $link->url('schedule.delete', ['id' => $schedule->getId()]) ?>" class="btn btn-danger btn-sm border-0" onclick="return confirm('Are you sure you want to cancel the scheduling of this flight?');">Delete</a>
                            <?php else: ?>
                                <a href="#" class="btn btn-primary btn-sm buy-ticket-btn" data-flight-number="<?= $schedule->getFlightNumber() ?>">Buy a ticket</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

