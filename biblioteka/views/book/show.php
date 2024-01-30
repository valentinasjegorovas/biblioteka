<?php

include "../../controllers/BookController.php";
$book = BookController::find($_GET['id']);

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
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" name="name" disabled placeholder="title" value="<?=$book->title?>">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Genre</label>
                <input type="text" class="form-control" name="genre" disabled placeholder="genre" value="<?=$book->genre?>">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">AuthorId</label>
                <input type="text" class="form-control" name="authorId" disabled placeholder="authorId" value="<?=$book->authorId?>">
            </div>


            </form>
        </div>
        <div class="col-3"></div>
    </div>
</body>
</html>