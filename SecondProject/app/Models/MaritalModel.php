<?php

namespace App\Models;

use CodeIgniter\Model;

class MaritalModel extends Model {

    protected $table      = 'maritalstatus';
    protected $primaryKey = 'idMaritalStatus';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['idMaritalStatus','status'];

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