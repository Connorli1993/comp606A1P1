<?php
	session_start();
	session_unset();
	session_destroy();
	unset($_SESSION['username']);
	$_SESSION['message'] = "You are logged out now";
	header("location: login.php");
?>