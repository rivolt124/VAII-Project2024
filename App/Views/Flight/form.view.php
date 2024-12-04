<?php if (!is_null(@$data['errors'])): ?>
    <?php foreach ($data['errors'] as $error): ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<form method="post" action="<?= $link->url('flight.save') ?>" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= @$data['flight']?->getId() ?>">

    <label for="flight_number" class="form-label">Flight Number</label>
    <div class="input-group has-validation mb-3 ">
        <input type="text" class="form-control" name="flight_number" id="flight_number" value="<?= @$data['flight']?->getFlightNumber() ?>" required>
    </div>
    <label for="origin" class="form-label">Origin</label>
    <div class="input-group has-validation mb-3 ">
        <input type="text" class="form-control" name="origin" id="origin" value="<?= @$data['flight']?->getOrigin() ?>" required>
    </div>
    <label for="destination" class="form-label">Destination</label>
    <div class="input-group has-validation mb-3 ">
        <textarea class="form-control" aria-label="With textarea" name="destination" id="post-text"><?= @$data['flight']?->getDestination() ?></textarea>
    </div>


    <button type="submit" class="btn btn-primary">Save</button>
    <button type="button" class="btn btn-secondary" onclick="location.href='<?= $link->url("flight.index") ?>'">Return</button>
</form>
