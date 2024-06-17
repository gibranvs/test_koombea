<?php

if (! function_exists('load_files')) {

    function load_files(array $files)
    {
        $res="";

        foreach ($files as $file){

           $res.= "<script src=\"$file\">" . "</script>" . "\r\n";
       }

       return $res;
    }
}

