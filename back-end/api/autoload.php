<?php


session_start();

spl_autoload_register('autoload');  // autoload function
function autoload($class_name)  
{ 
    $array_paths=array('database/','classes/','models/','controllers/');    // array of paths

    $parts=explode('\\',$class_name);   // explode class name

    $name=array_pop($parts);    // get last part of class name
    // die($class_name);
    foreach($array_paths as $path){   // loop through paths
        $file=sprintf($path.'%s.php',$name);    // concatenate path and class name
        if(is_file($file)){  // if file exists

            include_once $file;  // include file
        }
    }

}
