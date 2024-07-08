<?php
	session_start();
	include"_config.php";
	$sql="Delete from tbl_class where cid = '{$_GET["id"]}'";
	$con->query($sql);
	flash("msg","Department deleted successfully","danger");
	header("location:view_classes.php");
?>