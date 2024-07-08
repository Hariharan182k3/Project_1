<?php
	session_start();
	include"_config.php";
	$sql="Delete from tbl_course where crid = '{$_GET["id"]}'";
	$con->query($sql);
	flash("msg","Course deleted successfully","danger");
	header("location:view_courses.php");
?>