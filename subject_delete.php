<?php
	session_start();
	include"_config.php";
	$sql="Delete from tbl_subject where sid = '{$_GET["id"]}'";
	$con->query($sql);
	flash("msg","Subject deleted successfully","danger");
	header("location:view_subjects.php");
?>