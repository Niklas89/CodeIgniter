<?=$this->extend("layout/master")?>

<?=$this->section("content")?>

<?php $validation = \Config\Services::validation(); ?>
<form method="post" action="<?php echo base_url('/editcredit') ?>">
  <fieldset>
    <legend class="my-4">Modifier un crédit</legend>

    <input type="hidden" class="form-control" name="idCredit" id="idCredit" value="<?= esc($credit['idCredit']) ?>">
    <div class="form-group my-4">
      <label for="idClient" class="form-label"><?= esc($client['firstname']) ?> <?= esc($client['lastname']) ?></label>
      <input type="hidden" class="form-control" name="idClient" id="idClient" value="<?= esc($client['idClient']) ?>" >
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="organization" id="organization" value="<?= esc($credit['organization']) ?>">
        <label for="organization">Organisme</label>
        <!-- Error -->
        <?php if($validation->getError('organization')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('organization'); ?>
            </div>
        <?php }?>
    </div>

    <div class="form-floating mb-3">
        <input type="number" step="0.01" class="form-control" name="amount" id="amount" value="<?= esc($credit['amount']) ?>"">
        <label for="amount">Montant en euros (50.90)</label>
        <!-- Error -->
        <?php if($validation->getError('amount')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('amount'); ?>
            </div>
        <?php }?>
    </div>

    
        <button type="submit" class="btn btn-primary my-4">Enregistrer</button>
    </fieldset>
</form>

<?=$this->endSection()?>