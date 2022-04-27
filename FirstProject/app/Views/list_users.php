<?=$this->extend("layout/master")?>

<?=$this->section("content")?>

<div class="row">
    <h1 class="mt-4"><?= esc($title) ?></h1>
</div>

        <!-- DROPDOWN-LIST to filter services in Javascript -->  
        <!-- Uncomment <script src="/js/script.js"></script> in Views/layout/master.php in order to make it work -->
        <!--
        <div class="btn-group mt-2 mb-2" role="group" aria-label="Button group with nested dropdown">
            <button type="button" class="btn btn-primary">Services</button>
            <div class="btn-group" role="group">
                    <button id="btnGroupDrop3" type="button" class="btn btn-primary dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop3">
                <a class="dropdown-item" href="#" data-service-id=0 >All services</a>
                    <?php if (! empty($services) && is_array($services)): ?>
                        <?php foreach ($services as $services_item): ?>
                            <a class="dropdown-item" href="#" data-service-id="<?= esc($services_item['serviceid']) ?>"><?= esc($services_item['serviceName']) ?></a>
                        <?php endforeach ?>
                    <?php else: ?>
                        <h2>No services</h2>
                        <p>Unable to find any services for you.</p>
                    <?php endif ?>
                </div>
            </div>
        </div> -->

        <!-- DROPDOWN-LIST to filter services in PHP -->  
        <div class="btn-group mt-2 mb-2" role="group" aria-label="Button group with nested dropdown">
            <button type="button" class="btn btn-primary">Services</button>
            <div class="btn-group" role="group">
                    <button id="btnGroupDrop3" type="button" class="btn btn-primary dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop3">
                <a class="dropdown-item" href="0" data-service-id=0 >All services</a>
                    <?php if (! empty($services) && is_array($services)): ?>
                        <?php foreach ($services as $services_item): ?>
                            <a class="dropdown-item" href="<?= esc($services_item['serviceid']) ?>" data-service-id="<?= esc($services_item['serviceid']) ?>"><?= esc($services_item['serviceName']) ?></a>
                        <?php endforeach ?>
                    <?php else: ?>
                        <div class="alert alert-danger" role="alert">
                            <h2>No Users</h2>
                            <p>Unable to find any users for you.</p>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div> 


    <div class="d-flex flex-wrap" id="userContainer">
    <!-- LIST USERS -->                  
    <?php if (! empty($users) && is_array($users)): ?>
    <?php foreach ($users as $users_item): ?>
        <div class="card bg-light border-primary m-3 w-25 <?= esc($users_item['id_service']) ?>">
        <div class="card-header">User <?= esc($users_item['userid']) ?> / Service <?= esc($users_item['id_service']) ?></div>
        <div class="card-body">
        <h3 class="card-title"><?= esc($users_item['firstname']) ?> <?= esc($users_item['lastname']) ?></h3>
    
        <div class="card-text my-4">
            <ul>
            <?php
                $currentDate = new DateTime();
                $today = $currentDate->format('Y-m-d');
                $diff = date_diff(date_create($users_item['birthdate']), date_create($today));
                echo '<li><strong>Age:</strong> '.$diff->format('%y').'</li>'; 
            ?>
            <li><strong>Birthdate:</strong> <?= esc($users_item['birthdate']) ?></li>
            <li><strong>Address:</strong> <?= esc($users_item['address']) ?>, <?= esc($users_item['postalcode']) ?></li>
            <li><strong>Phone:</strong> <?= esc($users_item['phone']) ?></li>
            <li class="text-info"><?= esc($users_item['serviceName']) ?></li>
            <li class="text-info"><?= esc($users_item['description']) ?></li>
            </ul>
        </div>
        <p><a href="/delete/<?= esc($users_item['userid']) ?>" class="btn btn-danger stretched-link btn-sm">Delete</a> | 
        <a href="/edit/<?= esc($users_item['userid']) ?>" class="btn btn-primary stretched-link btn-sm">Edit</a></p>
        </div>
    </div>
    <?php endforeach ?>
    <?php else: ?>
        <div class="alert alert-danger" role="alert">
            <h2>No Users</h2>
            <p>Unable to find any users for you.</p>
        </div>
    <?php endif ?>
    </div>
        

    

<?=$this->endSection()?>
  