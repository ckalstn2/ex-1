<?php
	include("config.php");

	//if form is submitted 
	if(isset($_POST["submit"])){

		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data into variables $BookTitle and $BookAuthor
		extract($_POST);
		
		//very basic validation before adding to database
		if(!($title =="" || $author =="" || $content =="" || $image_url =="" || $post_date =="")){
			try {
				$sql = "INSERT INTO posts ( title, author, content , image_url , post_date) VALUES ( '$title' , '$author', '$content', '$image_url', '$post_date')";

				if ($conn->query($sql) === TRUE) {
					$msg = "Record added successfully";
				} else {
					$msg = "Error: $sql" . $conn->error;
				}			
				mysqli_close($conn);		
				//redirect to home page
				header("Location: index.php?message='$msg'");
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}
		}
	}
?>