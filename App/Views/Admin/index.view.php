<?php
/** @var \App\Core\IAuthenticator $auth */

// Get the logged-in user's name
$userName = $auth->getLoggedUserName();
/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <a href="<?= $link->url('post.add') ?>" class="btn btn-success">Pridať príspevok</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <?php foreach ($data['flights'] as $flight): ?>
            <div class="col-3 d-flex gap-4 flex-column">
                <div class="m-2">
                    <div>
                        <?= $flight->getFlightNumber() ?>
                    </div>
                    <div class="m-2">
                        <?= $flight->getOrigin() ?>
                    </div>
                    <div class="m-2 d-flex gap-2 justify-content-end">
                        <a href="<?= $link->url('post.edit', ['id' => $flight->getId()]) ?>" class="btn btn-primary">Upraviť</a>
                        <a href="<?= $link->url('post.delete', ['id' => $flight->getId()]) ?>"  class="btn btn-danger">Zmazať</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>



<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div>
                <h2>Welcome, <strong><?= htmlspecialchars($userName) ?></strong>!</h2>
                <p>This section of the application is only accessible after logging in.</p>
                <p>Here you can work with the Flight database</p>
                <hr>

                <!-- Flight data table -->
                <h3>Flight Information</h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Flight Number</th>
                        <th>Origin</th>
                        <th>Destination</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if ($flights): ?>
                        <?php foreach ($flights as $flight): ?>
                            <tr>
                                <td><?= htmlspecialchars($flight['flight_number']) ?></td>
                                <td><?= htmlspecialchars($flight['origin']) ?></td>
                                <td><?= htmlspecialchars($flight['destination']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3">No flight data available.</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

