<?php

// ADD VALUE OF ID
$id = isset($_GET['id']) ? $_GET['id'] : die("ERROR no ID");
$title = 'EDIT TASK';
// Including
include '../layouts/header.php';

// adding Class
require_once '../config/Database.php';
require '../app/Controller/task.php';

$database = new Database;
$db = $database->getConnection();

// calling Class
$task = new Task($db);
$task->id = $id;
$task->getOne();

// if getting POST then adding values
if($_POST){
    $task->name = $_POST['name'];
    $task->description = $_POST['description'];
    $task->deadline = $_POST['deadline'];

    
    if($task->update()){
        header("Location: http://localhost/php/OOP/task.app/views/task.create.php#section2");
    }else{
        echo "Update failed";
    }

}

?>

 <!-- FORM STYLE -->
 <div class="formBox" style="width: 700px; height:400px; margin: 0 auto; margin-top:50px; background-color: rgb(164, 208, 223, 0.3); border-radius:50px; padding:20px; margin-bottom:190px; text-align:center;">

<!-- FORM -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?id={$id}"; ?>" method="POST">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="" name="name" value="<?php echo $task->name;?>">
        <label for="floatingInput">Task name</label>
    </div>
    <div class="form-floating">
    <input type="text" class="form-control" id="floatingInput" placeholder="" name="description" value="<?php echo $task->description;?>">
        <label for="floatingInput">Task name</label>
      
    </div>
    <div class="form-floating mb-3">
        <input type="datetime-local" class="form-control mt-3" id="floatingInput" placeholder="" name="deadline" value="<?php echo $task->deadline;?>">
        <label for="floatingInput">Deadline</label>
    </div>
    <button type="submit" class="btn btn-outline-dark "> <a href="#section2" style="text-decoration: none; color:red;"></a>Edit </button>

</form>

</div>









<?php
include '../layouts/footer.php'



?>