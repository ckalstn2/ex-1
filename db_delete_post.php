<?php
	include("config.php");

	$msg = "";
	
	//if form has been submitted process it
	$post_id  = $_GET["post_id"];
	if ($post_id == "") {
		header("Location: index.php?message='error'");
		exit;
	}
	//very basic validation before delete from database
	if(!($post_id =="")){

		try {
			$sql = "DELETE FROM posts WHERE post_id='$post_id'";

			if ($conn->query($sql) === TRUE) {
				$msg = "post_id $post_id deleted successfully";
			} else {
				$msg = "Error: $sql" . $conn->error;
			}			
			
			//redirect to home page
			header("Location: index.php?message='$msg'");
			exit;

		} catch(PDOException $e) {
			$msg = $e->getMessage();
		}
	}
	
?>