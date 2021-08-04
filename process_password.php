<?php
    
	include("config.php");
    
	//if form is submitted 
	if(isset($_POST["submit"])){
        
		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data into variables $BookTitle and $BookAuthor
		extract($_POST);
        echo $userid. $userpassword;
		
		//very basic validation before adding to database
		if(!($userid =="" || $userpassword =="")){
			try {
				$sql = "SELECT* FROM users WHERE userid='$userid' AND userpassword='$userpassword'";
                $result = $conn->query($sql);
                if($result->num_rows !=1){
                    $msg = "Login failed";
                    header("Location:log_page.php?message='$msg'");
                }else{
					//start a sesstion
					session_start();
					$_SESSION['login_user'] = $userid;
					header("Location:index.php");
				
				}
				

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}
		}
	}
?>