<?php
// adding page Name & link to header
$title = 'CREATE TASK';
include '../layouts/header.php';

// connecting Class links
require_once "../config/Database.php";
require "../app/Controller/task.php";

$database = new Database;
$db = $database->getConnection();

$tasksConnect = new Task($db);
$task = Task::index($db);

// adding values from post

if ($_POST) {
    $tasksConnect->name = $_POST['name'];
    $tasksConnect->description = $_POST['description'];
    $tasksConnect->deadline = $_POST['deadline'];


    // creating new task
    if ($tasksConnect->create()) {
        echo "Created";
        header("Location: ../views/task.create.php");
    } else {
        echo "something went wrong";
    }
}

?>

<section id="section1" style="display: block;  height:100vh; width:100%;">
    <!-- FORM CONTAINER  -->
    <div class="formContainer" style="position: absolute; top: 80px; left:0px; width:50%; height:80vh; text-align: center;">

        <!-- ICON AND HEADER -->
        <div class="icon">
            <h1 style="font-family: 'Anton', sans-serif;"> <span style="color: red;">Create</span> your <span style="color: red;">task</span> <i class="fa-solid fa-list-check" style="font-size: 60px; margin-left:20px"></i></h1>
        </div>

        <!-- FORM STYLE -->
        <div class="formBox" style="width: 700px; height:400px; margin: 0 auto; margin-top:50px; background-color: rgb(164, 208, 223, 0.3); border-radius:50px; padding:20px; margin-bottom:50px; ">

            <!-- FORM -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="" name="name">
                    <label for="floatingInput">Task name</label>
                </div>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="description"></textarea>
                    <label for="floatingTextarea2">Description</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="datetime-local" class="form-control mt-3" id="floatingInput" placeholder="" name="deadline">
                    <label for="floatingInput">Deadline</label>
                </div>
                <button type="submit" class="btn btn-outline-dark "> <a href="#section2" style="text-decoration: none; color:red;"></a>Create </button>

            </form>

            <!-- LINK TO TABLE -->
            <div class="linkSection" style="margin-left:500px;">
                <button type="submit" class="btn btn-outline-info ">
                    <a href="#section2" style="text-decoration: none;">My Tasks </a></button>

            </div>
        </div>

    </div>
</section>
<section id="section2" style="display: block; height:80vh; width:100%;">

    <!-- TASK TABLE -->
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Task</th>
                    <th scope="col">Description</th>
                    <th scope="col">Deadline</th>
                    <th scope="col">Created</th>
                    <th scope="col">Modified</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($task as $task) {
                    echo "<tr>
                    <td >" . $task['id'] . "</td>
                    <td >" . $task['name'] . "</td>
                    <td >" . $task['description'] . "</td>
                    <td >" . $task['deadline'] . "</td>
                    <td >" . $task['created'] . "</td>
                    <td >" . $task['modified'] . "</td>
                    <td >
                        <button type='button' class='btn btn-outline-secondary'>
                             <a href='task.update.php/?id=" . $task['id'] . "'style='text-decoration: none; color:black;'>Update</a>
                        </button>
                        <button type='button' class='btn btn-outline-danger'>
                            <a href='../app/Controller/task.delete.php/?id=" . $task['id'] . "' style='text-decoration: none; color:black;'>Delete</a>
                         </button>
                     </td>
                                        
            </tr>";
                }
                ?>


            </tbody>
        </table>

        
        <!-- phrase -->
    <div class="phrase" style="width: 350px; height:50px; position:absolute; right:500px; margin-top:50px;">
        <h1 style="text-decoration: double;"> <span style="color: red; font-family: 'Anton', sans-serif;">YOU</span> deserve a <span style="color: red; font-family: 'Anton', sans-serif;">coffee </span> <strong>BREAK...</strong> </h1>
    </div>
    <div class="iconBox" style="font-size: 100px; position:absolute; right:350px;">
    <i class="fa-solid fa-mug-hot"></i>
    </div>
    </div>
</section>


<!-- IMAGE  -->

<div class="imgBox2">
    <img src="../dist/img/Mind map-amico.png" alt="" style="width: 650px; height: 650px; position:absolute; right:50px; top:10px;">
    
</div>









<?php
include '../layouts/footer.php';
?>