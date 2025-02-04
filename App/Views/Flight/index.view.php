<?php
/** @var \App\Core\IAuthenticator $auth */
/** @var Array $data */
/** @var \App\Models\Flight $flights */
/** @var \App\Core\LinkGenerator $link */
?>

<link rel="stylesheet" href="../../../public/css/crud.css">
<script src="../../../public/js/flight.index.js"></script>

<div class="container-fluid">
    <div class="row mb-4 pt-4">
        <div class="col">
            <h2 class="text-center">Our Flights</h2>
            <div class="text-center mb-3">
                <input type="text" id="flightSearch" class="form-control w-50 mx-auto" placeholder="Search flights by origin / destination">
            </div>
            <div class="text-center">
                <a href="<?= $link->url('flight.add') ?>" class="btn btn-outline-danger mt-2">Add Flight</a>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <table class="table table-striped table-bordered text-center">
                <thead class="table-dark">
                <tr>
                    <th>Flight Number</th>
                    <th>Origin</th>
                    <th>Destination</th>
                    <th>Airplane</th>
                    <th class="actions-column">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['flights'] as $flight): ?>
                    <tr>
                        <td><?= $flight->getFlightNumber() ?></td>
                        <td><?= $flight->getOrigin() ?></td>
                        <td><?= $flight->getDestination() ?></td>
                        <td><?= $flight->getAirplane() ?></td>
                        <td>
                            <a href="<?= $link->url('flight.edit', ['id' => $flight->getId()]) ?>" class="btn btn-primary btn-sm border-0">Edit</a>
                            <a href="<?= $link->url('flight.delete', ['id' => $flight->getId()]) ?>" class="btn btn-danger btn-sm border-0" onclick="return confirm('Are you sure you want to delete this flight?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

