<?php
include "../../controllers/AuthorController.php";

if($_SERVER['REQUEST_METHOD'] == "POST") {
	AuthorController::destroy();
	header("Location: ./index.php");
}

$authors = AuthorController::all();
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "../components/head.php"; ?>
</head>
<body>
	<?php include "../components/navbar.php"; ?>
	
    <table class="table table-stripped">
		<tr>
			<th>id</th>
			<th>name</th>
			<th>surname</th>
			<th>options <a class="btn btn-primary" href="./create.php">sukurti nauja</a></th>
		</tr>

		<?php foreach ($authors as $key => $author) { ?>
		<tr>
			<td><?= $author->id ?></td>
			<td><?= $author->name ?></td>
			<td><?= $author->surname ?></td>
			<td class="row">
				<div class="col-3">
					<a class="btn btn-success" href="./show.php?id=<?=$author->id?>">show</a>
				</div>

				<div class="col-3">
					<a class="btn btn-primary" href="./edit.php?id=<?=$author->id?>">edit</a>
				</div>

				<div class="col-3">
					<form action="" method="post">
						<input type="hidden" name="id" value="<?=$author->id?>">
						<button class="btn btn-danger" type="submit">delete</button>
					</form>
				</div>
			</td>
		</tr>
	<?php	} ?>
	</table>
	<div class="col-3"></div>
</body>
</html>