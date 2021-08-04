<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>



<?php

echo date_default_timezone_set('Australia/Melbourne');
echo date("Y-m-d");
echo "<br>";
echo date("h:i:s a");
echo "<br>";
echo getHostByName(getHostName());
// echo $_SERVER["REMOTE_ADDR"];
// echo 'User IP Address - '.$_SERVER['REMOTE_ADDR'];
?>
</body>
</html>

