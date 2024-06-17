<?php
namespace App\Libraries;
use App\Libraries\SessionManager;

class AuthManager
{
    protected $auth;

    public static function logIn($email,$password){

        $users = new \App\Models\UsersModel();

        $user = $users->userAuth($email,$password); //get the data from the user or false if not valid credentials
        if($user){
            SessionManager::addSessionData($user); //add user data to session
            $sessiondata= TRUE;
        }else{
            $sessiondata = FALSE;
        }

        return $sessiondata;
    }

    public static function logOut(){

        SessionManager::logOut();
        return 0;

    }

}

