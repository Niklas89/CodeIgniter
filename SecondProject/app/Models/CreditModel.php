<?php

namespace App\Models;

use CodeIgniter\Model;

class CreditModel extends Model {

    protected $table      = 'credit';
    protected $primaryKey = 'idCredit';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['idCredit','organization', 'amount','idClient'];

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