<?php

// page title
$title = "HOME PAGE";
include "../task.app/layouts/header.php";


?>
<div class="mainContainer">

    <!-- page image -->
    <div class="overImg">
        <img src="./dist/img/Add tasks-amico.png" alt="">
    </div>
    <!-- welcome box -->
    <div class="welcomeBox">
        <div class="motivationBox">
            <h1> <span style="color: red;">Start</span>  planning your <span style="color: red;">wishes</span> so that they can become <span style="color: red;">G O A L S</span></h1>
            <p>“A goal without a plan is just a wish.” — Antoine de Saint-Exupéry</p>
        </div>
        <button type="button" class="btn btn-secondary btn-lg"><a href="http://localhost/php/OOP/task.app/views/task.create.php">Get STARTED<i class="fa-solid fa-play"></i></a></button>
    </div>


</div>

<?php
include "../task.app/layouts/footer.php";

?>