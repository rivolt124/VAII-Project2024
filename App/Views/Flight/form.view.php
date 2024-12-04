<?php if (!is_null(@$data['errors'])): ?>
    <?php foreach ($data['errors'] as $error): ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<form method="post" action="<?= $link->url('flight.save') ?>" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= @$data['flight']?->getId() ?>">

    <label for="post-text" class="form-label">Flight Number</label>
    <div class="input-group has-validation mb-3 ">
        <textarea class="form-control" aria-label="With textarea" name="flight_number" id="post-text"><?= @$data['flight']?->getFlightNumber() ?></textarea>
    </div>
    <label for="post-text" class="form-label">Origin</label>
    <div class="input-group has-validation mb-3 ">
        <textarea class="form-control" aria-label="With textarea" name="origin" id="post-text"><?= @$data['flight']?->getOrigin() ?></textarea>
    </div>
    <label for="post-text" class="form-label">Destinatio</label>
    <div class="input-group has-validation mb-3 ">
        <textarea class="form-control" aria-label="With textarea" name="destination" id="post-text"><?= @$data['flight']?->getDestination() ?></textarea>
    </div>


    <button type="submit" class="btn btn-primary">Save</button>
</form>
