<?php
	include("config.php");

	//if form has been submitted process it
	if(isset($_POST["submit"])){

		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data
		extract($_POST);

		//very basic validation before updating to database
		if(!($post_id =="" || $title =="" || $content ==""|| $image_url ==""|| $post_date ==""|| $author =="")){

			try {
				$sql = "UPDATE posts SET title='$title', content='$content', post_date='$post_date', image_url='$image_url', author='$author' WHERE post_id='$post_id'";

				if ($conn->query($sql) === TRUE) {
					$msg = "post_id $post_id updated successfully";
				} else {
					$msg = "Error: $sql" . $conn->error;
				}	
				//redirect to home page
				header("Location: index.php?message='$msg'");
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}
		}
	}

?>