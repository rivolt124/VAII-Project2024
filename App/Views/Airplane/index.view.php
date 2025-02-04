<?php
/** @var \App\Core\IAuthenticator $auth */
/** @var Array $data */
/** @var \App\Models\Airplane $airplanes */
/** @var \App\Core\LinkGenerator $link */
?>

<link rel="stylesheet" href="../../../public/css/crud.css">

<div class="container-fluid">
    <div class="row mb-4 pt-4">
        <div class="col">
            <h2 class="text-center">Our Airplanes</h2>
            <div class="text-center">
                <a href="<?= $link->url('airplane.add') ?>" class="btn btn-outline-danger mt-2">Add Airplane</a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center" id="airplaneList">
        <?php foreach ($data['airplanes'] as $airplane): ?>
            <div class="col-md-3 col-sm-6 col-12 text-center mb-4" data-origin="<?= strtolower($airplane->getType()) ?>" data-destination="<?= strtolower($airplane->getPicture()) ?>">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title"><?= $airplane->getRegistration() ?></h5>
                        <p class="card-text">
                            <strong>Type:</strong> <?= $airplane->getType() ?><br>
                        </p>
                        <img src="<?= $airplane->getPicture() ?>" alt="Airplane Picture" class="img-fluid mb-2" style="max-height: 290px; width: auto;">
                        <div class="d-flex justify-content-center gap-2">
                            <a href="<?= $link->url('airplane.edit', ['id' => $airplane->getId()]) ?>" class="btn btn-primary btn-sm border-0">Edit</a>
                            <a href="<?= $link->url('airplane.delete', ['id' => $airplane->getId()]) ?>" class="btn btn-danger btn-sm border-0" onclick="return confirm('Are you sure you want to delete this flight?');">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
