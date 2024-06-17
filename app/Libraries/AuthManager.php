<?php
namespace App\Libraries;
use App\Libraries\SessionManager;

class AuthManager
{
    protected $auth;

    public static function logIn($email,$password)
    {
        $authModel = new \App\Models\AuthModel();
        $user = $authModel->userAuth($email,$password);

        if($user == TRUE){
            $sessiondata=$authModel->getUserData($email,$password);

            SessionManager::addSessionData($sessiondata);

        }else if($user == FALSE){
            $sessiondata = FALSE;
        }

        return $sessiondata;
    }

    public static function logOut()
    {

        SessionManager::logOut();
        return 0;

    }

}

