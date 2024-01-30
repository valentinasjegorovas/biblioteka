<?php

include "../../controllers/AuthorController.php";
$author = AuthorController::find($_GET['id']);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../components/head.php"; ?>
</head>
<body>
    <?php include "../components/navbar.php"; ?>
    
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <h1>EDIT</h1>
            <form action="" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" disabled placeholder="name" value="<?=$author->name?>">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" class="form-control" name="surname" disabled placeholder="surname" value="<?=$author->surname?>">
            </div>


            </form>
        </div>
        <div class="col-3"></div>
    </div>
</body>
</html>