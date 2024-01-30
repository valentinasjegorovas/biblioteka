<?php
    include "../../controllers/BookController.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    BookController::update();
    header("Location: ./index.php");
    die;
}

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
                <input type="text" class="form-control" name="title" placeholder="title" value="<?=$book->title?>">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Genre</label>
                <input type="text" class="form-control" name="genre" placeholder="genre" value="<?=$book->genre?>">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">AuthorId</label>
                <input type="text" class="form-control" name="authorId" placeholder="authorId" value="<?=$book->authorId?>">
            </div>

            <div class="mb-3">
                <input type="hidden" name="id" value="<?=$book->id?>">
                <button class="btn btn-primary" type="submit">save</button>
            </div>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</body>
</html>