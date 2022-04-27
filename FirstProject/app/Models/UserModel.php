<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {

    protected $table      = 'user';
    protected $primaryKey = 'userid';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['userid','lastname', 'firstname', 'birthdate', 'address', 'postalcode', 'phone', 'id_service'];

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

