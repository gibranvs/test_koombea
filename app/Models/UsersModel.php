<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use CodeIgniter\Validation\ValidationInterface;

class UsersModel extends Model {
    protected $builder;

    protected $DBGroup = 'default';
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id', 'username', 'password'];

    public function userAuth($email,$password){
        $user=$this->select('*')
                ->where(['username'=>$email,'password'=>$password])
                ->get()->getResult();

        if(count($user) > 0) {
            $user=$user[0];
            $data=[
                    "id"=>$user->id,
                    "username"=>$user->username
                ];
        }else{
            $data = FALSE;
        }
        return $data;
    }




}
