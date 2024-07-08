<?php
	session_start();
	include"_config.php";
	$sql="Delete from tbl_staffs where stid = '{$_GET["id"]}'";
	$con->query($sql);
	flash("msg","Staff deleted successfully","danger");
	header("location:view_staffs.php");
?>