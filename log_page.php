<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Registration form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-expand-sm bg-info">
        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" href="./index.php">Home</a>
            </li>
            
        </ul>
    </nav>
    <div class="jumbotron text-center"><h1> Login </h1></div>
    <div class="container">
        <div id="errormessage"></div>
    <?php
        if (isset($_GET["message"])){
            echo"<p class='alert alert-danger'>". $_GET["message"]. "</p>";

        }
    ?>
        <form action="process_password.php" method="post">
        <div class="form-group">
            <label for="userid">user id </label>
            <input type="text" class="form-control" name="userid" id="userid" >
            
        </div>
        <div class="form-group">
            <label for="userpassword">user password </label>
            <input type="password" class="form-control" name="userpassword" id="userpassword" >
            
        </div>

		<button type="submit" class="btn-btn-info" name="submit">Login</button>


    </form>
    </div>
</div>
    
</body>
</html>