<?=$this->extend("layout/master")?>

<?=$this->section("content")?>

<?php $validation = \Config\Services::validation(); ?>
<form method="post" action="<?php echo base_url('/addcredit') ?>">
  <fieldset>
    <legend class="my-4">Ajouter un crédit</legend>

    <div class="form-group my-4">
      <label for="idClient" class="form-label">Liste des clients</label>
      <select class="form-select" name="idClient" id="idClient">
        <?php if (! empty($clients) && is_array($clients)): ?>
          <option>Clients</option>
            <?php foreach ($clients as $clients_item): ?>
                <option value="<?= esc($clients_item['idClient']) ?>"><?= esc($clients_item['firstname']) ?> <?= esc($clients_item['lastname']) ?></option>
            <?php endforeach ?>
        <?php elseif(! empty($client) && is_array($client)): ?>
          <option value="<?= esc($client['idClient']) ?>"><?= esc($client['firstname']) ?> <?= esc($client['lastname']) ?></option>
        <?php else: ?>
            <option>Aucun client trouvé</option>
        <?php endif ?>
      </select>
        <!-- Error -->
        <?php if($validation->getError('idClient')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('idClient'); ?>
            </div>
        <?php }?>
    </div>

    <!-- ORGANIZATION -->
    <div class="form-floating mb-3">
        <?php if (!empty($organization)): ?>
          <input type="text" class="form-control" name="organization" id="organization"  value="<?= esc($organization) ?>">
        <?php else: ?>
          <input type="text" class="form-control" name="organization" id="organization" placeholder="Organisme">
        <?php endif ?>
        <label for="organization">Organisme</label>
        <!-- Error -->
        <?php if($validation->getError('organization')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('organization'); ?>
            </div>
        <?php }?>
    </div>

    <!-- AMOUNT OF CREDIT -->
    <div class="form-floating mb-3">
        <?php if (!empty($amount)): ?>
          <input type="number" step="0.01" class="form-control" name="amount" id="amount"  value="<?= esc($amount) ?>">
        <?php else: ?>
          <input type="number" step="0.01" class="form-control" name="amount" id="amount" placeholder="Montant en euros (50.90)">
        <?php endif ?>
        <label for="amount">Montant en euros (50.90)</label>
        <!-- Error -->
        <?php if($validation->getError('amount')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('amount'); ?>
            </div>
        <?php }?>
    </div>


        <button type="submit" class="btn btn-primary my-4">Ajouter</button>
    </fieldset>
</form>

<?=$this->endSection()?>