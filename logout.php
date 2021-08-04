<?php


session_start();
session_destroy();
$msg = 'Logout successfully';

header("Location:index.php?message='$msg'");
exit;

?>