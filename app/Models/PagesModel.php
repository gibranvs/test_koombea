<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use CodeIgniter\Validation\ValidationInterface;

class PagesModel extends Model {
    protected $builder;

    protected $DBGroup = 'default';
    protected $table      = 'pages';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id', 'name', 'url', 'user_id', 'status'];

}
