<!DOCTYPE html>
<html lang="en">
<head>
  <title>GBCA Library System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <?php
	include("config.php");

	$post_id  = $_GET["post_id"];	// get book id from URL
	if ($post_id == "") {
		header("Location: index.php?message='error'");
		exit;
	}
	
	//$query = "SELECT * FROM book WHERE Book_ID = '$Book_ID'";
	$result = $conn->query("SELECT * FROM posts WHERE post_id = '$post_id'");
	if ($result->num_rows != 1) {
		header("Location: index.php?message='error'");
		exit;
	}
	$row = $result->fetch_assoc();
?>

<script>
function validateForm() {

	var errormessage = document.getElementById("errormessage");	
	var title = document.getElementById("title").value;
 	var author = document.getElementById("author").value;
	var post_date = document.getElementById("post_date").value;
	var image_url = document.getElementById("image_url").value;
	var content = document.getElementById("content").value;

	// Validation for Title and Author
  	if ( title == "" && author == ""&& post_date == ""&& image_url == ""&& content == "") {
    	errormessage.innerHTML = "<p class='alert alert-danger'> Blank should not be empty.</p>"
    	return false;
  	}
  	
}
</script>

</head>
<body>
<!-- A horizontal navbar -->
<nav class="navbar navbar-expand-sm bg-info">
	<!-- Links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link text-white" href="./index.php">Home</a>
		</li>
		<li class="nav-item">
			<a class="nav-link text-white" href="./new_post.php">Add New post</a>
		</li>
	</ul>
</nav>

<div class="jumbotron text-center">
	<h1>GBCA NEWS BLOG</h1>
	<h2>Edit a Post</h2>
</div>

<div class="container ">
	<div id="errormessage"></div>

	<form name="myForm" action="db_update_post.php" method="post" onsubmit="return validateForm()">

		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="title" id="title" value = "<?php echo $row["title"]; ?>"></p>
		<label for="content">Post Content</label>
		<textarea type="text" class="form-control" name="content"  id="content"  rows=5 value = "<?php echo $row["content"]; ?>"></textarea></p>
		<label for="image_url">Post Image URL</label>
		<input type="text" class="form-control" name="image_url" id="image_url" value = "<?php echo $row["image_url"]; ?>"></p>
		<label for="post_date">Post Date</label>
		<input type="date" class="form-control" name="post_date" id="post_date" value = "<?php echo $row["post_date"]; ?>"></p>
		<label for="author">Post Author</label>
		<input type="text" class="form-control" name="author" id="author" value = "<?php echo $row["author"]; ?>" ></p>
		<p><input type="submit" class= "btn btn-info" name="submit" value="Save changes"></p>

		<input type="text" class="invisible" name="post_id" id="post_id" value = <?php echo $row["post_id"]; ?> ></p>

	</form>

</div>
</body>
</html>	