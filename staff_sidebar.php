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
  <li class="list-group-item <?php echo basename($_SERVER["PHP_SELF"])=="home.php"?"a_active":""; ?>"> <a href='staff_home.php'><i class='fa fa-home'></i> Home</li>
  
  <li class="list-group-item <?php echo basename($_SERVER["PHP_SELF"])=="courses.php"?"a_active":""; ?>"> <a href='courses.php'><i class='fa fa-upload'></i> Upload Material</a></li>
  
  <li class="list-group-item <?php echo basename($_SERVER["PHP_SELF"])=="view_courses.php"?"a_active":""; ?>"> <a href='view_courses.php'><i class="fa fa-eye" aria-hidden="true"></i> View Material</a></li>
  
  <li class="list-group-item <?php echo basename($_SERVER["PHP_SELF"])=="student.php"?"a_active":""; ?>"> <a href='student.php'><i class="fa fa-plus-square-o" aria-hidden="true"></i>Add Students </a></li>
  
  <li class="list-group-item <?php echo basename($_SERVER["PHP_SELF"])=="view_student.php"?"a_active":""; ?>"> <a href='view_student.php'><i class='fa fa-user'></i>View Students </a></li>
  
 
  
  
  <li class="list-group-item <?php echo basename($_SERVER["PHP_SELF"])=="logout.php"?"a_active":""; ?>"><a href='logout.php'><i class='fa fa-sign-out'></i> Logout</a></li>
</ul>

