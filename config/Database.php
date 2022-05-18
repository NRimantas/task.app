<?php

class Database
{
    // database 
    private $host = "localhost";
    private $dbName = "task_planner";
    private $username = "root";
    private $password = "";
    public $conn;

    // connection to database
    public function getConnection(){
        $this->conn = null;     //null if something wrong

        try{
            $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->dbName, $this->username, $this->password);
          
        }catch(PDOException $e){
            echo "Connection failed: ".$e->getMessage();
        }

        return $this->conn;
    }
}
