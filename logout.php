<?php
/*
session_start();

if(isset($_SESSION['user_id']))
{
	unset($_SESSION['user_id']);

}

header("Location: index.php");
die;*/
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
header("location: login.php"); //to redirect back to "index.php" after logging out
exit();
?>