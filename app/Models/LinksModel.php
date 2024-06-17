<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use CodeIgniter\Validation\ValidationInterface;

class LinksModel extends Model {
    protected $builder;

    protected $DBGroup = 'default';
    protected $table      = 'page_links';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id', 'name', 'link', 'page_id'];

}
