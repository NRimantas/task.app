<?php

class Task
{   
    //table in database
    private static $conn;
    private static $table = "tasks";


    public $id;
    public $name;
    public $description;
    public $deadline;
    

    // sending connection
    public function __construct($db)        
    {
        self::$conn = $db;
    }

    // create  function
    public function create()
    {
        $sql = "INSERT INTO ".self::$table." SET name=:name, description=:description, deadline=:deadline";
        $query = self::$conn->prepare($sql);

        //bind values //inserting values
        $query->bindParam(":name", $this->name);        
        $query->bindParam(":description", $this->description);
        $query->bindParam(":deadline", $this->deadline);
        
        // additional check.
        if($query->execute()){   
            return true;
        }else{
            return false;
        }
    }

    // READ function
    
    public static function index($db)  //dazniausiai vadinamas, kad atvaizduoti duomenis
    {
        self::$conn = $db;  //prisidedame prijungima prie duomenu bazes (static, nes nekursime objekto naujo)

        $sql = "SELECT * FROM ".self::$table;
        $query = self::$conn->prepare($sql);
        $query->execute();
        $taskArray = $query->fetchAll();
        return $taskArray;
    }

    // DELETE

    public function delete()
    {
        $sql = "DELETE FROM ".self::$table." WHERE id = ".$this->id;
        $query = self::$conn->prepare($sql);
        
        if($query->execute()){
            return true;
        }else{
            return false;
        }
    }

    // UPDATE

    public function update()
    {
        $sql = "UPDATE ".self::$table." SET name=:name, description=:description, deadline=:deadline WHERE id=:id";
        $query=self::$conn->prepare($sql);

         //bind values //updating values
         $query->bindParam(":name", $this->name);        
         $query->bindParam(":description", $this->description);
         $query->bindParam(":deadline", $this->deadline);
         $query->bindParam(":id", $this->id);
        

        if($query->execute()){     
            return true;
        }else{
            return false;
        }
    }

    public  function getOne()
    {   
        // select one ID
        $sql = "SELECT * FROM ".self::$table." WHERE id = ".$this->id;
        $query = self::$conn->prepare($sql);
        $query->execute();
        $result = $query->fetch();
        

        //adding values
        $this->name = $result['name'];
        $this->description = $result['description'];
        $this->deadline = $result['deadline'];


    }

}