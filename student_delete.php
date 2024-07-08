<?php
	session_start();
	include"_config.php";
	$sql="Delete from tbl_students where suid = '{$_GET["id"]}'";
	$con->query($sql);
	flash("msg","Student deleted successfully","danger");
	header("location:view_student.php");
?>