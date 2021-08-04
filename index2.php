<!DOCTYPE html>
<html lang="en">
<head>
  <title>GBCA Library System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
<!-- A horizontal navbar -->
<nav class="navbar navbar-expand-sm bg-info">
	<!-- Links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link text-white" href="./welcome.php">Home</a>
		</li>
		<li class="nav-item">
			<a class="nav-link text-white" href="./new_book.php">Add New Book</a>
		</li>
	</ul>
</nav>
	
<div class="jumbotron text-center">
<h1>GBCA News Blog</h1>
<h2>Welcome</h2>
</div>

<div class="container ">
  
  <?php 
    // display message from other pages 
    if (isset($_GET['message'])) {
      echo "<p class='alert alert-warning'>" . $_GET['message'] . "</p>";
    } 
  ?>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Post ID</th>
        <th scope="col">Title</th>
        <th scope="col">Image</th>
        <th scope="col">Content</th>
        <th scope="col">Post Date</th>
        <th scope="col">Author</th>
        <th scope="col">Auction </th>
      </tr>
    </thead>
    <tbody>

  <?php
      // retrieve book records from Database Book
    	include("config.php");
      try {

        $result = $conn->query('SELECT post_id, title , content , image_url , post_date , author FROM posts ORDER BY post_id ASC');
        if ($result){
          if ($result->num_rows > 0) {
            // display all book records
            while($row = $result->fetch_assoc()) {
             
              echo "<tr>";
              echo "<th scope='row'>$row[post_id]</th>";
              echo "<td>$row[title]</td>";
              echo "<td><img class = 'img-fluid'src='$row[image_url]' alt=''></td>";
              echo "<td>$row[content]</td>";
              echo "<td>$row[post_date]</td>";
              echo "<td>$row[author]</td>";
              echo "<td><a href='./edit_book.php?book_id=$row[post_id]'>Edit</a>, ";
              echo "<a href='./db_delete_book.php?book_id=$row[post_id]'>Delete</a></td>";
              echo "</tr>";
          }
          } else {
            echo "0 book(s)";
          }
       }
      } catch(PDOException $e) {
          echo $e->getMessage();
      }
  ?>

    </tbody>
  </table>
	
</div>
</body>
</html>