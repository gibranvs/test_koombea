<?php

namespace App\Controllers;
use App\Models\PagesModel;

class Home extends BaseController{

    public function __Construct(){
        $this->pages = new PagesModel();
    }

    public function index(){

        $session = session();
        $pages=$this->pages;

        $pages->select("pages.*,(SELECT COUNT(*) from page_links where page_id=pages.id) as total_links")
                ->where("user_id",$session->id);
        
        $data=[];
        $data['pages']=$pages->paginate(10);
        $data['pager']=$this->pages->pager;
        return view('home.php',$data);
    }
    
}
