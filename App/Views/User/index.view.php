<?php
/** @var \App\Core\IAuthenticator $auth */
/** @var Array $data */
/** @var \App\Models\User $users */
/** @var \App\Core\LinkGenerator $link */
?>

<link rel="stylesheet" href="../../../public/css/crud.css">

<div class="container-fluid">
    <div class="row mb-4 pt-4">
        <div class="col">
            <h2 class="text-center">Registered Users</h2>
            <div class="text-center">
                <a href="<?= $link->url('users.add') ?>" class="btn btn-outline-danger mt-2">Add User</a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center" id="flightList">
        <?php foreach ($data['users'] as $user): ?>
            <div class="col-md-3 col-sm-6 col-12 text-center mb-4 flight-card">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title"><?= $user->getName() ?></h5>
                        <p class="card-text">
                            <strong>Email:</strong> <?= $user->getEmail() ?><br>
                            <strong>Password:</strong> <?= $user->getPassword() ?><br>
                        </p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="<?= $link->url('user.edit', ['id' => $user->getId()]) ?>" class="btn btn-primary btn-sm border-0">Edit</a>
                            <a href="<?= $link->url('user.delete', ['id' => $user->getId()]) ?>" class="btn btn-danger btn-sm border-0" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
