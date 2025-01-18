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


    <button type="submit" class="btn btn-primary">Register</button>
    <button type="button" class="btn btn-secondary" onclick="location.href='<?= $link->url("home.index") ?>'">Return</button>
</form>
