<?=$this->extend("layout/master")?>

<?=$this->section("content")?>

<?php $validation = \Config\Services::validation(); ?>
<form method="post" action="<?php echo base_url('/addclient') ?>">
  <fieldset>
    <legend class="mt-4">Ajouter un client</legend>

    <!-- LASTNAME -->
    <div class="form-floating mb-3">
      <?php if (!empty($lastname)): ?>
        <input type="text" class="form-control" name="lastname" id="lastname"  value="<?= esc($lastname) ?>">
      <?php else: ?>
        <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Nom" >
      <?php endif ?>
        <label for="lastname">Nom</label>
        <!-- Error -->
        <?php if($validation->getError('lastname')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('lastname'); ?>
            </div>
        <?php }?>
    </div>

    <!-- FIRSTNAME -->
    <div class="form-floating mb-3">
        <?php if (!empty($firstname)): ?>
          <input type="text" class="form-control" name="firstname" id="firstname"  value="<?= esc($firstname) ?>">
        <?php else: ?>
          <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Prénom" >
        <?php endif ?>
        <label for="firstname">Prénom</label>
        <!-- Error -->
        <?php if($validation->getError('firstname')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('firstname'); ?>
            </div>
        <?php }?>
    </div>

    <!-- BIRTHDATE -->
    <div class="form-floating mb-3">
        <?php if (!empty($birthdate)): ?>
          <input type="date" class="form-control" name="birthdate" id="birthdate"  value="<?= esc($birthdate) ?>">
        <?php else: ?>
          <input type="date" class="form-control" name="birthdate" id="birthdate" placeholder="Date de Naissance" >
        <?php endif ?>
        <label for="birthdate">Date de Naissance</label>
        <!-- Error -->
        <?php if($validation->getError('birthdate')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('birthdate'); ?>
            </div>
        <?php }?>
    </div>

    <!-- ADDRESS -->
    <div class="form-floating mb-3">
        <?php if (!empty($address)): ?>
          <input type="text" class="form-control" name="address" id="address"  value="<?= esc($address) ?>">
        <?php else: ?>
          <input type="text" class="form-control" name="address" id="address" placeholder="Adresse">
        <?php endif ?>
        <label for="address">Adresse</label>
        <!-- Error -->
        <?php if($validation->getError('address')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('address'); ?>
            </div>
        <?php }?>
    </div>

    <!-- POSTALCODE -->
    <div class="form-floating mb-3">
        <?php if (!empty($postalcode)): ?>
          <input type="text" class="form-control" name="postalcode" id="postalcode"  value="<?= esc($postalcode) ?>">
        <?php else: ?>
          <input type="text" class="form-control" name="postalcode" id="postalcode" placeholder="Code Postal">
        <?php endif ?>
        <label for="postalcode">Code Postal</label>
        <!-- Error -->
        <?php if($validation->getError('postalcode')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('postalcode'); ?>
            </div>
        <?php }?>
    </div>

    <!-- PHONE -->
    <div class="form-floating mb-3">
        <?php if (!empty($phone)): ?>
          <input type="text" class="form-control" name="phone" id="phone"  value="<?= esc($phone) ?>">
        <?php else: ?>
          <input type="text" class="form-control" name="phone" id="phone" placeholder="Numéro de téléphone">
        <?php endif ?>
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
        <option>Statut Marital</option>
        <?php if (! empty($maritalstatus) && is_array($maritalstatus)): ?>
            <?php foreach ($maritalstatus as $maritalstatus_item): ?>
                <option value="<?= esc($maritalstatus_item['idMaritalStatus']) ?>"><?= esc($maritalstatus_item['status']) ?></option>
            <?php endforeach ?>
        <?php else: ?>
            <option>Aucun statut marital trouvé</option>
        <?php endif ?>
      </select>
    </div>

        <button type="submit" class="btn btn-primary my-4">Ajouter</button>
    </fieldset>
</form>

<?=$this->endSection()?>