<?php

  $id = isset($_GET['id']) ? $_GET['id'] : die("ERROR: no ID");
  
//   connecting DATABASE
  require_once "../../config/Database.php";

//   connecting Class file
  require "task.php";  
  
//   connecting method
$database = new Database;
$db = $database->getConnection();

$task = new Task($db);
$task->id = $id;

if($task->delete()){
    header("Location: http://localhost/php/OOP/task.app/views/task.create.php#section2");

}else{
    echo "Delete failed";
}