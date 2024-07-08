<?php 
	session_start();
	unset($_SESSION["aid"]);
	unset($_SESSION["aname"]);
	session_destroy();
	header("location:index.php");
?>