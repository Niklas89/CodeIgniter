<?=$this->extend("layout/master")?>

<?=$this->section("content")?>

<?php $validation = \Config\Services::validation(); ?>
<form method="post" action="<?php echo base_url('/edit') ?>">
  <fieldset>
    <legend class="mt-4">Détails</legend>

    <div class="form-floating mb-3">
        <input type="hidden" class="form-control" name="idClient" id="idClient" value="<?= esc($clients['idClient']) ?>">
        <input type="text" class="form-control" name="lastname" id="lastname" value="<?= esc($clients['lastname']) ?>" disabled>
        <label for="lastname">Nom</label>
        <!-- Error -->
        <?php if($validation->getError('lastname')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('lastname'); ?>
            </div>
        <?php }?>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="firstname" id="firstname" value="<?= esc($clients['firstname']) ?>" disabled>
        <label for="firstname">Prénom</label>
        <!-- Error -->
        <?php if($validation->getError('firstname')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('firstname'); ?>
            </div>
        <?php }?>
    </div>

    <div class="form-floating mb-3">
        <input type="date" class="form-control" name="birthdate" id="birthdate" value="<?= esc($clients['birthdate']) ?>" disabled>
        <label for="birthdate">Date de Naissance</label>
        <!-- Error -->
        <?php if($validation->getError('birthdate')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('birthdate'); ?>
            </div>
        <?php }?>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="address" id="address" value="<?= esc($clients['address']) ?>" disabled>
        <label for="address">Adresse</label>
        <!-- Error -->
        <?php if($validation->getError('address')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('address'); ?>
            </div>
        <?php }?>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="postalcode" id="postalcode" value="<?= esc($clients['postalcode']) ?>" disabled>
        <label for="postalcode">Code Postal</label>
        <!-- Error -->
        <?php if($validation->getError('postalcode')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('postalcode'); ?>
            </div>
        <?php }?>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="phone" id="phone" value="<?= esc($clients['phone']) ?>" disabled>
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
      <select class="form-select" name="idMaritalStatus" id="idMaritalStatus" disabled>
        <?php if (! empty($maritalstatus) && is_array($maritalstatus)): ?>
            <?php foreach ($maritalstatus as $maritalstatus_item): ?>
              <?php if ($maritalstatus_item['idMaritalStatus'] == $clients['idMaritalStatus']): ?>
                  <option value="<?= esc($maritalstatus_item['idMaritalStatus']) ?>"><?= esc($maritalstatus_item['status']) ?></option>
              <?php endif ?>
            <?php endforeach ?>
        <?php else: ?>
            <option>Aucun statut marital trouvé</option>
        <?php endif ?>
      </select>
    </div>


    <?php if (! empty($credits) && is_array($credits)): ?>
      
      <table class="table table-hover mt-4 text-center">
      <p></p>
        <caption><a href="/addcredit/<?= esc($clients['idClient']) ?>" class="btn btn-outline-success btn-sm">Ajouter un crédit</a></caption>
        <thead>
          <tr class="table-primary">
            <th scope="col">Organisme</th>
            <th scope="col">Montant</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($credits as $credits_item): ?>
            <tr class="table-light">
              <th scope="row"><?= esc($credits_item['organization']) ?></th>
              <td><?= esc($credits_item['amount']) ?> €</td>
              <td><a href="/delete/<?= esc($clients['idClient']) ?>/credit/<?= esc($credits_item['idCredit']) ?>" class="btn btn-outline-danger btn-sm">Supprimer</a> | 
              <a href="/edit/<?= esc($clients['idClient']) ?>/credit/<?= esc($credits_item['idCredit']) ?>/" class="btn btn-outline-primary btn-sm">Modifier</a>
              
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
      <?php endif ?>


      <p class="my-4"><a href="/delete/<?= esc($clients['idClient']) ?>" class="btn btn-danger">Supprimer</a> | 
      <a href="/edit/<?= esc($clients['idClient']) ?>" class="btn btn-primary">Modifier</a></p>
    </fieldset>
</form>

<?=$this->endSection()?>