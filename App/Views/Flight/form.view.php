
<form method="post" action="<?= $link->url('flight.save') ?>" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= @$data['flight']?->getId() ?>">

    <label for="inputGroupFile02" class="form-label">Flight number</label>
    <div class="input-group has-validation mb-3 ">

        <textarea class="form-control" aria-label="With textarea" name="flight_number" id="post-text"><?= $data['flight']->getFlightNumber() ?? '' ?></textarea>
    </div>
    <label for="post-text" class="form-label">Origin</label>
    <div class="input-group has-validation mb-3 ">
        <textarea class="form-control" aria-label="With textarea" name="origin" id="post-text"><?= @$data['flight']?->getOrigin() ?></textarea>
    </div>
    <label for="post-text" class="form-label">Destination</label>
    <div class="input-group has-validation mb-3 ">
        <textarea class="form-control" aria-label="With textarea" name="destination" id="post-text"><?= @$data['flight']?->getDestination() ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>

