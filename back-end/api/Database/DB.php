<?php

class DB
{

    private   $servername = 'localhost';    
    private    $db = 'api';     
    private    $username = 'root';      
    private    $passw = '';     
    public    $con;     

    public static function connect()
    {

        $con = new PDO("mysql:host=localhost;dbname=api", "root", '');  // connect to database

        return $con;    // return connection
    }

    public function deconnect() // deconnect from database
    
    {
        return $this->con = null;   // return null
    }
}