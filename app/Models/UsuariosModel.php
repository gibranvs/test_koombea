<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use CodeIgniter\Validation\ValidationInterface;

class UsuariosModel extends Model {
    protected $builder;

    protected $DBGroup = 'default';
    protected $table      = 'usuarios';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id', 'nombre', 'apellido', 'correo', 'password', 'id_perfil', 'estado'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getUsuarioById($id) {
        $db      = \Config\Database::connect();
        $this->builder = $db->table($this->table);
        $this->builder->select('id, nombre, apellido, correo,id_perfil,estado');
        $this->builder->where('id', $id);
        //$this->builder->where('estado', 1);
        $res=$this->builder->get();
        return $res->getRow();
    }
    
    public function getUsuariosAdmin() {
        $db      = \Config\Database::connect();
        $this->builder = $db->table($this->table." u");
        $this->builder->select('u.id, u.nombre, u.apellido, u.correo, u.estado');
        $this->builder->where('estado !=', 3);
        $this->builder->orderBy('u.id', 'ASC');
        $res = $this->builder->get();
        return $res->getResult();
    }
}
