<?php
/** @var \App\Core\IAuthenticator $auth */
?>
<?php if (!is_null(@$data['errors'])): ?>
    <?php foreach ($data['errors'] as $error): ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<form method="post" action="<?= $link->url('user.save') ?>" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= @$data['user']?->getId() ?>">

    <label for="password" class="form-label">Password</label>
    <div class="input-group has-validation mb-3 ">
        <input type="text" class="form-control" name="password" id="password" value="<?= @$data['user']?->getPassword() ?>" required>
    </div>
    <label for="email" class="form-label">Email</label>
    <div class="input-group has-validation mb-3 ">
        <input type="text" class="form-control" name="email" id="email" value="<?= @$data['user']?->getEmail() ?>" required>
    </div>
    <label for="name" class="form-label">Name</label>
    <div class="input-group has-validation mb-3 ">
        <textarea class="form-control" aria-label="With textarea" name="name" id="post-text"><?= @$data['user']?->getName() ?></textarea>
    </div>
    <?php if($auth->isLogged() && $auth->getUserAccess() == 1 && $auth->getLoggedUserId() != @$data['user']?->getId()): ?>
        <label for="access" class="form-label">Access</label>
        <div class="input-group has-validation mb-3 ">
            <textarea class="form-control" aria-label="With textarea" name="access" id="post-text"><?= @$data['user']?->getAccess() ?></textarea>
        </div>
    <?php endif; ?>

    <button type="submit" class="btn btn-primary">Save</button>
    <?php if($auth->isLogged() && $auth->getUserAccess() == 0): ?>
        <button type="button" class="btn btn-danger" onclick="if (confirm('Are you sure you want to delete your account?')) { location.href='<?= $link->url('user.delete', ['id' => @$data['user']?->getId()]) ?>'; }">Delete</button>
        <button type="button" class="btn btn-secondary" onclick="location.href='<?= $link->url("home.index") ?>'">Return</button>
    <?php endif; ?>
    <?php if($auth->isLogged() && $auth->getUserAccess() == 1): ?>
        <button type="button" class="btn btn-secondary" onclick="location.href='<?= $link->url("user.index") ?>'">Return</button>
    <?php endif; ?>
</form>