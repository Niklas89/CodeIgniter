<?=$this->extend("layout/master")?>

<?=$this->section("content")?>

<div class="row">
    <h1 class="mt-4"><?= esc($title) ?></h1>
</div>



    <div class="d-flex flex-wrap" id="userContainer">
    <!-- LIST USERS -->                  
    <?php if (! empty($clients) && is_array($clients)): ?>
    <?php foreach ($clients as $clients_item): ?>
        <div class="card bg-light border-primary m-3" style="width: 18em;">
        <div class="card-header">Client <?= esc($clients_item['idClient']) ?></div>
        <div class="card-body">
        <h3 class="card-title"><?= esc($clients_item['firstname']) ?> <?= esc($clients_item['lastname']) ?></h3>
    
        <div class="card-text my-4">
          <ul>
            <?php
                $currentDate = new DateTime();
                $today = $currentDate->format('Y-m-d');
                $diff = date_diff(date_create($clients_item['birthdate']), date_create($today));
                echo '<li><strong>Age:</strong> '.$diff->format('%y').'</li>'; 
            ?>
            <li><strong>Naissance:</strong> <?= esc($clients_item['birthdate']) ?></li>
            <li><strong>Adresse:</strong> <?= esc($clients_item['address']) ?>, <?= esc($clients_item['postalcode']) ?></li>
            <li><strong>Téléphone:</strong> <?= esc($clients_item['phone']) ?></li>
          </ul>
        </div>
        <p><a href="/view/<?= esc($clients_item['idClient']) ?>" class="btn btn-primary stretched-link btn-sm">Voir détails</a></p>
        </div>
    </div>
    <?php endforeach ?>
    <?php else: ?>
        <div class="alert alert-danger" role="alert">
            <h2>Aucun clients</h2>
            <p>Il n'y a aucun client à afficher.</p>
        </div>
    <?php endif ?>
    </div>
        

    

<?=$this->endSection()?>
  