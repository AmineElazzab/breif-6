<?php

// define('URLR','http://localhost/ajax/test/Api');

require 'autoload.php'; // autoload function
if(isset($_GET['page']))    
$parametrs=explode('/',$_GET['page']);  // explode url
if(isset($parametrs[0]) & !empty($parametrs[0]) )   // if url is not empty

{
    $controller=ucfirst($parametrs[0]); // get first part of url
    $file='controllers/'.$controller.'Controller'.'.php';   // concatenate path and class name
    if(file_exists($file)){ // if file exists
  
        require_once $file; // include file
        
        $controller=$controller.'Controller';   // concatenate class name
        if(class_exists($controller))       
        {
            $obj=new $controller(); // create object
            if(isset($parametrs[1]) & !empty($parametrs[1]))    // if url is not empty
            
            { 
                $action=$parametrs[1];  // get second part of url
                if(method_exists($obj,$action))  // if method exists
               
                {
                    if (isset($parametrs[2]) && !empty($parametrs[2]))  
                    {
                        $obj->$action($parametrs[2]);   // call method with parameter
                    }else
                    {

                        $obj->$action();    // call method without parameter
                    }
                }else
                {
                    http_response_code(404);    // if method doesn't exist
				    echo "<h1>this method doesn't exist</h1>";  // show error
                }

            }else
            {
                $action="index";    // if url is empty
                $obj->$action();    // call method without parameter
            }
        }else
        {   // if class doesn't exist
            http_response_code(404);    // show error
            echo "<h1>this classe doesn't exist</h1>";  // show error
        }
        

    }else   
    {   // if file doesn't exist
        http_response_code(404);    // show error
        echo "<h1>this page doesn't exist</h1>";    // show error
    }
}
