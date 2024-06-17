<?php

namespace App\Controllers;
use App\Models\PagesModel;
use App\Models\LinksModel;

class Page extends BaseController{

    public function __Construct(){
        $this->pages = new PagesModel();
        $this->links = new LinksModel();
    }


    public function index($id){
        return view('welcome_message.php');
    }

    public function save(){ //Saves url given by the user
        $data=[]; //initialize de array for creating the page object
        $url="https://gartic-consultores.com/";
        $data["url"]=$url;
        $htlmCont=$this->getHtml($url);

        $htmlDom=new \DOMDocument();
        @$htmlDom->loadHtml($htlmCont); //converting htmltext to dom object with supress of errors for avoiding encoding issues

        $title = $htmlDom->getElementsByTagName("title");
        $name="";
        if($title->length > 0){
          $name=trim($title->item(0)->nodeValue);
        }
        
        $data["name"]=$name;

        //$page=$this->pages->insert($data);
        $page=1;

        $links = $htmlDom->getElementsByTagName('a'); //getting all a tags from dom

        foreach($links as $lnk){


            $link=trim($lnk->getAttribute("href"));

            if($link!=""&&$link!=null){ //validate that link goes to some place

                $name=trim($lnk->nodeValue);
                if($name==""||$name==null){
                    $outerHTML = $lnk->ownerDocument->saveHTML($lnk);    
                    $name = '';
                    foreach ($lnk->childNodes as $contentNode){
                        $name .= $contentNode->ownerDocument->saveHTML($contentNode);
                    }
                }
                if(strlen($name)>50) 
                    $name=substr($name,0,50); //set maximum length for a link name

                $dataLink=[]; //initilaize the array for link data

                $dataLink["link"]=$link;
                $dataLink["page_id"]=$page;
                $dataLink["name"]=$name;

                /*
                echo "<pre>";
                print_r($dataLink);
                echo "</pre>";
                //*/

                $this->links->insert($dataLink);
            }
        }

    }

    private function getHtml($url){ //gets the html content for a given url

        $ch = curl_init();
        $timeout = 0;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

        $content = curl_exec($ch);
        curl_close($ch);
        
        return $content;

    }
    
}
