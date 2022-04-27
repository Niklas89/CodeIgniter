<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceModel extends Model {

    protected $table      = 'service';
    protected $primaryKey = 'serviceid';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['serviceid','serviceName', 'description'];

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