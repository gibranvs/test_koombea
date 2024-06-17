<?php
namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $builder;
    public function __construct()
    {

        $db = \Config\Database::connect();
        $this->builder = $db->table('usuarios u');

    }

    public function userAuth($email,$password)
    {
        //dd($username);
        $this->builder->select('correo,password');
        $this->builder->where('correo',$email);
        $this->builder->where('password',$password);
        $this->builder->where('estado',1);


        $total_rows=$this->builder->countAllResults();
        $query=$this->builder->get();


        if($total_rows > 0) {

            $data = TRUE;

        }else{

            $data = FALSE;
        }


        return $data;
    }




    public function getUserData($email,$password)
    {
        $this->builder->select('
        u.id       as id,
        u.correo as correo,
        u.nombre as nombre,
        u.apellido as apellido,
        u.id_perfil as id_perfil
       

        ');
        //$this->builder->from('users as u');
        //$this->builder->join('clients as c','u.id_client=c.id','left');
        $this->builder->where('u.correo',$email);
        $this->builder->where('u.password',$password);
        $this->builder->where('estado',1);
        $query=$this->builder->get();
        $total_rows=$this->builder->countAllResults();


        if($total_rows > 0) {

            foreach ($query->getResult() as $row) {

                $data['id']       = $row->id;
                $data['correo']  = $row->correo;
                $data['nombre']       = $row->nombre;
                $data['apellido']  = $row->apellido;
                $data['perfil']       = $row->id_perfil;
            }
        }else{

            throw new \Exception("No se encuentra el usuario");
        }
        return $data;


    }

}

