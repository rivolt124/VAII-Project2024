<?php
/** @var \App\Core\IAuthenticator $auth */

/** @var Array $data */
/** @var \App\Models\Flight $flights */
/** @var \App\Core\LinkGenerator $link */
?>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #ff8a00, #e52e71);
        overflow-x: hidden;
        height: 100vh;
    }

    .btn {
        border-color: black;
        color: black;
    }

    .card:hover {
        transform: scale(1.1);
        transition: transform 0.5s ease;
    }
</style>

<div class="container-fluid">
    <div class="row mb-4">
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
    <div class="row justify-content-center" id="flightList">
        <?php foreach ($data['flights'] as $flight): ?>
            <div class="col-md-3 col-sm-6 col-12 text-center mb-4 flight-card" data-origin="<?= strtolower($flight->getOrigin()) ?>" data-destination="<?= strtolower($flight->getDestination()) ?>">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title"><?= $flight->getFlightNumber() ?></h5>
                        <p class="card-text">
                            <strong>Origin:</strong> <?= $flight->getOrigin() ?><br>
                            <strong>Destination:</strong> <?= $flight->getDestination() ?>
                        </p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="<?= $link->url('flight.edit', ['id' => $flight->getId()]) ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="<?= $link->url('flight.delete', ['id' => $flight->getId()]) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this flight?');">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('flightSearch');
        const flightCards = document.querySelectorAll('.flight-card');

        searchInput.addEventListener('input', function () {
            const query = searchInput.value.toLowerCase();

            flightCards.forEach(card => {
                const origin = card.getAttribute('data-origin');
                const destination = card.getAttribute('data-destination');

                if (origin.includes(query) || destination.includes(query)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
</script>
