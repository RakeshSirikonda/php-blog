<?php
require('config/config.php');
require('config/db.php');

// Check For Submit
if (isset($_POST['submit'])) {
	// Get form data
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$body = mysqli_real_escape_string($conn, $_POST['body']);
	$author = mysqli_real_escape_string($conn, $_POST['author']);

	$query = "INSERT INTO posts(title, author,body) VALUES('$title', '$author', '$body')";

	if (mysqli_query($conn, $query)) {
		header('Location: ' . ROOT_URL . '');
	} else {
		echo 'ERROR: ' . mysqli_error($conn);
	}
}
?>


<?php include('inc/header.php'); ?>
<style>
	.container {
		width: 100%;
		text-align: center;
	}
	form {
		width: 50%;
		display: inline-block;
		text-align: left;
	}
</style>
<div class="container">
	<h1>Add Post</h1>
	<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
		<div class="row">
			<div class="col-lg-6 col-md-12">
				<div class="form-group">
					<label>Title</label>
					<input type="text" name="title" class="form-control">
				</div>
				<div class="form-group">
					<label>Author</label>
					<input type="text" name="author" class="form-control">
				</div>
			</div>
			<div class="col-lg-6 col-md-12">
				<div class="form-group">
					<label>Body</label>
					<textarea rows="5" name="body" class="form-control"></textarea>
				</div>
			</div>
		</div>
		<input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block">
	</form>
</div>
<?php include('inc/footer.php'); ?>