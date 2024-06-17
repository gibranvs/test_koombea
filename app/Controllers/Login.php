<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Libraries\AuthManager;
use App\Models\UsersModel;

class Login extends Controller{

    public function index(){
        $data=[];

        $session = session();
        if(isset($_SESSION['error']))
            $data["error"]=$_SESSION['error'];
        return view('login.php',$data);
    }

    public function validate_user(){ //Validates the user login

        $email=$this->request->getPost('username');
        $password=sha1($this->request->getPost('password'));

        $isAuth=AuthManager::logIn($email,$password);

        $session = session();

        $session->setFlashdata('error', 'Invalid credentials');

        if($isAuth==FALSE){
            return redirect()->to(base_url("login"));

        }else{
            return redirect()->to(base_url());
        }
    }

    public function register_user(){ //Add a user

        $username=trim($this->request->getPost('username'));
        $password=sha1(trim($this->request->getPost('password')));

        $users=new UsersModel();

        $isUsr=$users->where(["username"=>$username])->countAllResults();

        $response=[
                "status"=>0,
                "data"=>""
            ];

        if($isUsr==0){ //if username doesn't exist create user
            $nusr=$users->insert(["username"=>$username,"password"=>$password]);
            $response["status"]=1;
            $response["data"]=$nusr;
        }else{
            $response["data"]="Username already exists. try a different one or login with your password";
        }

        return json_encode($response);

    }

    public function logout()
    {
        AuthManager::logOut();
        return redirect()->to(base_url()."/admin/login");
    }

}
