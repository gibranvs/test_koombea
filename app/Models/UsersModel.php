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
        $this->select('id')
                ->where(['username'=>$email,'password'=>$password]);
        $total_rows=$this->countAllResults();

        if($total_rows > 0) {
            $user=$this->get()->getResult();
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
