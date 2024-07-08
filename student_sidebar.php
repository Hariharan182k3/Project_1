<style>
	.list-group-item.active{
		background-color:#343a40;
		border-color:black;
	}
	a{
		color:#343a40;
	}
	.list-group .list-group-item a{
		text-decoration:none;
	}
	.list-group .list-group-item a:hover{
		color:grey;
	}
	.a_active a{
		color:grey!important;
		font-weight:bold;	
	}
</style>
<?php 
	basename($_SERVER["PHP_SELF"]);
?>	
<ul class="list-group">
  <li class="list-group-item active"><i class='fa fa-dashboard'></i> Dashboard</li>
  <li class="list-group-item <?php echo basename($_SERVER["PHP_SELF"])=="student_home.php"?"a_active":""; ?>"> <a href='student_home.php'><i class='fa fa-home'></i> Home</li>
  <li class="list-group-item <?php echo basename($_SERVER["PHP_SELF"])=="view_materials.php"?"a_active":""; ?>"> <a href='view_materials.php'><i class='fa fa-book'></i> View Materials</a></li>
  <li class="list-group-item <?php echo basename($_SERVER["PHP_SELF"])=="logout.php"?"a_active":""; ?>"><a href='logout.php'><i class='fa fa-sign-out'></i> Logout</a></li>
</ul>

