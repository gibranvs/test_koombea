<?php
namespace App\Libraries;

class SessionManager{

    public static function isLogged(){
        $session = \Config\Services::session();
        if($is_logged==0){
            header('Location: '.base_url("login"));
            exit;
        }

    }
    public static function isActive(){
        $session = \Config\Services::session();
        $is_active=$session->get('pid');
        if($is_active==NULL){
            // Solucion Temporal
            header('Location: '.base_url());
            exit;
        }

    }
    public static function logOut(){
        $session = \Config\Services::session();
        $session->destroy();
        return 0;
    }

    public static function addSessionData($data){
        $session = \Config\Services::session();
        $session->set($data);
    }
    
    public static function getSessionData()
    {
        $session = \Config\Services::session();
        $data=$session->get();
        return $data;

    }

}
