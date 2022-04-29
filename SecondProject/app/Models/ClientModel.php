<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model {

    protected $table      = 'client';
    protected $primaryKey = 'idClient';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['idClient','lastname', 'firstname', 'birthdate', 'address', 'postalcode', 'phone', 'idMaritalStatus'];

    // Dates
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;


}

