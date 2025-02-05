<?php if (!is_null(@$data['errors'])): ?>
    <?php foreach ($data['errors'] as $error): ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<form method="post" action="<?= $link->url('airplane.save') ?>" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= @$data['airplane']?->getId() ?>">

    <label for="registration" class="form-label">Registration</label>
    <div class="input-group has-validation mb-3 ">
        <input type="text" class="form-control" name="registration" id="registration" value="<?= @$data['airplane']?->getRegistration() ?>" required>
    </div>
    <label for="type" class="form-label">Aircraft Type</label>
    <div class="input-group has-validation mb-3 ">
        <input type="text" class="form-control" name="type" id="type" value="<?= @$data['airplane']?->getType() ?>" required>
    </div>
    <label for="picture" class="form-label">Picture</label>
    <div class="input-group has-validation mb-3 ">
        <textarea class="form-control" aria-label="With textarea" name="picture" id="post-text"><?= @$data['airplane']?->getPicture() ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
    <button type="button" class="btn btn-secondary" onclick="location.href='<?= $link->url("airplane.index") ?>'">Return</button>
</form>

