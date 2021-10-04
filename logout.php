<?php
session_start();
session_destroy();

// setcookie('email',"");

header("location:login.php");

?>
