<?=$this->extend("layout/master")?>

<?=$this->section("content")?>

<?php $validation = \Config\Services::validation(); ?>
<form method="post" action="<?php echo base_url('/edit') ?>">
  <fieldset>
    <legend class="mt-4">Modifier <?= esc($clients['firstname']) ?> <?= esc($clients['lastname']) ?></legend>

    <div class="form-floating mb-3">
        <input type="hidden" class="form-control" name="idClient" id="idClient" value="<?= esc($clients['idClient']) ?>">
        <input type="text" class="form-control" name="lastname" id="lastname" value="<?= esc($clients['lastname']) ?>">
        <label for="lastname">Nom</label>
        <!-- Error -->
        <?php if($validation->getError('lastname')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('lastname'); ?>
            </div>
        <?php }?>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="firstname" id="firstname" value="<?= esc($clients['firstname']) ?>">
        <label for="firstname">Prénom</label>
        <!-- Error -->
        <?php if($validation->getError('firstname')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('firstname'); ?>
            </div>
        <?php }?>
    </div>

    <div class="form-floating mb-3">
        <input type="date" class="form-control" name="birthdate" id="birthdate" value="<?= esc($clients['birthdate']) ?>">
        <label for="birthdate">Date de Naissance</label>
        <!-- Error -->
        <?php if($validation->getError('birthdate')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('birthdate'); ?>
            </div>
        <?php }?>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="address" id="address" value="<?= esc($clients['address']) ?>">
        <label for="address">Adresse</label>
        <!-- Error -->
        <?php if($validation->getError('address')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('address'); ?>
            </div>
        <?php }?>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="postalcode" id="postalcode" value="<?= esc($clients['postalcode']) ?>">
        <label for="postalcode">Code Postal</label>
        <!-- Error -->
        <?php if($validation->getError('postalcode')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('postalcode'); ?>
            </div>
        <?php }?>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="phone" id="phone" value="<?= esc($clients['phone']) ?>">
        <label for="phone">Numéro de téléphone</label>
        <!-- Error -->
        <?php if($validation->getError('phone')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('phone'); ?>
            </div>
        <?php }?>
    </div>

    


    <div class="form-group">
      <label for="idMaritalStatus" class="form-label mt-4">Votre statut marital</label>
      <select class="form-select" name="idMaritalStatus" id="idMaritalStatus">
        <?php if (! empty($maritalstatus) && is_array($maritalstatus)): ?>
            <?php foreach ($maritalstatus as $maritalstatus_item): ?>
                <option value="<?= esc($maritalstatus_item['idMaritalStatus']) ?>"><?= esc($maritalstatus_item['status']) ?></option>
            <?php endforeach ?>
        <?php else: ?>
            <option>Aucun statut marital trouvé</option>
        <?php endif ?>
      </select>
    </div>

        <button type="submit" class="btn btn-primary my-4">Enregistrer</button>
    </fieldset>
</form>

<?=$this->endSection()?>