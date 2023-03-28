<?php

class Connect
{
    private $localhost = "localhost";
    private $user = "root";
    private $pswd = "";
    private $db_name = "todos";
    private $port = 5432;

    public function db_connect()
    {   
        try {
            return $conn = new PDO("mysql:host=$this->localhost;dbname=$this->db_name", $this->user, $this->pswd);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
          echo "Connection failed : ". $e->getMessage();
        }
    }
}