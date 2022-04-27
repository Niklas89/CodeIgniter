<?=$this->extend("layout/master")?>

<?=$this->section("content")?>

<?php $validation = \Config\Services::validation(); ?>
<form method="post" action="<?php echo base_url('/edit') ?>">
  <fieldset>
    <legend class="mt-4">Edit <?= esc($users['firstname']) ?> <?= esc($users['lastname']) ?></legend>

    <div class="form-floating mb-3">
        <input type="hidden" class="form-control" name="userid" id="userid" value="<?= esc($users['userid']) ?>">
        <input type="text" class="form-control" name="lastname" id="lastname" value="<?= esc($users['lastname']) ?>">
        <label for="lastname">Lastname</label>
        <!-- Error -->
        <?php if($validation->getError('lastname')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('lastname'); ?>
            </div>
        <?php }?>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="firstname" id="firstname" value="<?= esc($users['firstname']) ?>">
        <label for="firstname">Firstname</label>
        <!-- Error -->
        <?php if($validation->getError('firstname')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('firstname'); ?>
            </div>
        <?php }?>
    </div>

    <div class="form-floating mb-3">
        <input type="date" class="form-control" name="birthdate" id="birthdate" value="<?= esc($users['birthdate']) ?>">
        <label for="birthdate">Birthdate</label>
        <!-- Error -->
        <?php if($validation->getError('birthdate')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('birthdate'); ?>
            </div>
        <?php }?>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="address" id="address" value="<?= esc($users['address']) ?>">
        <label for="address">Address</label>
        <!-- Error -->
        <?php if($validation->getError('address')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('address'); ?>
            </div>
        <?php }?>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="postalcode" id="postalcode" value="<?= esc($users['postalcode']) ?>">
        <label for="postalcode">Postal Code</label>
        <!-- Error -->
        <?php if($validation->getError('postalcode')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('postalcode'); ?>
            </div>
        <?php }?>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="phone" id="phone" value="<?= esc($users['phone']) ?>">
        <label for="phone">Phone number</label>
        <!-- Error -->
        <?php if($validation->getError('phone')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('phone'); ?>
            </div>
        <?php }?>
    </div>

    


    <div class="form-group">
      <label for="id_service" class="form-label mt-4">Select your service</label>
      <select class="form-select" name="id_service" id="id_service">
        <?php if (! empty($services) && is_array($services)): ?>
            <?php foreach ($services as $services_item): ?>
                <option value="<?= esc($services_item['serviceid']) ?>"><?= esc($services_item['serviceName']) ?></option>
            <?php endforeach ?>
        <?php else: ?>
            <option>No services found</option>
        <?php endif ?>
      </select>
    </div>

        <button type="submit" class="btn btn-primary mt-4">Submit</button>
    </fieldset>
</form>

<?=$this->endSection()?>