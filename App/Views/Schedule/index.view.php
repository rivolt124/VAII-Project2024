<?php
/** @var \App\Core\IAuthenticator $auth */
/** @var Array $data */
/** @var \App\Models\Schedule $schedules */
/** @var \App\Core\LinkGenerator $link */
?>

<link rel="stylesheet" href="../../../public/css/crud.css">

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col">
            <h2 class="text-center">Scheduled Flights</h2>
            <div class="text-center">
                <a href="<?= $link->url('schedule.add') ?>" class="btn btn-outline-danger mt-2">Schedule flight</a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center" id="flightList">
        <?php foreach ($data['schedules'] as $schedules): ?>
            <div class="col-md-3 col-sm-6 col-12 text-center mb-4 flight-card">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title"><?= $schedules->getFlightNumber() ?></h5>
                        <p class="card-text">
                            <strong>Date:</strong> <?= $schedules->getDate() ?><br>
                            <strong>From:</strong><?= $schedules->getId() ?>
                            <strong>To:</strong><?= $schedules->getId() ?>
                        </p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="<?= $link->url('schedule.edit', ['id' => $schedules->getId()]) ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="<?= $link->url('schedule.delete', ['id' => $schedules->getId()]) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to cancel the scheduling of this flight?');">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
