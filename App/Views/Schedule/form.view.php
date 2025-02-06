<?php if (!is_null(@$data['errors'])): ?>
    <?php foreach ($data['errors'] as $error): ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<form method="post" action="<?= $link->url('schedule.save') ?>" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= @$data['schedule']?->getId() ?>">

    <label for="flightNumber" class="form-label">Flight Number</label>
    <div class="input-group has-validation mb-3 ">
        <input type="text" class="form-control" name="flightNumber" id="flightNumber" value="<?= @$data['schedule']?->getFlightNumber() ?>" required>
    </div>
    <label for="date" class="form-label">Date</label>
    <div class="input-group has-validation mb-3 ">
        <input type="date" class="form-control" name="date" id="date" value="<?= @$data['schedule']?->getDate() ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
    <button type="button" class="btn btn-secondary" onclick="location.href='<?= $link->url("schedule.index") ?>'">Return</button>
</form>

