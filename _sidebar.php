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
  <li class="list-group-item <?php echo basename($_SERVER["PHP_SELF"])=="home.php"?"a_active":""; ?>"> <a href='home.php'><i class='fa fa-home'></i> Home</li>
  
 <li class="list-group-item <?php echo basename($_SERVER["PHP_SELF"])=="class.php"?"a_active":""; ?>"> <a href='class.php'><i class="fa fa-plus-circle" aria-hidden="true"></i>Add Department</a></li>
 
 <li class="list-group-item <?php echo basename($_SERVER["PHP_SELF"])=="view_classes.php"?"a_active":""; ?>"> <a href='view_classes.php'><i class='fa fa-building'></i>View Department</a></li>
 
 <li class="list-group-item <?php echo basename($_SERVER["PHP_SELF"])=="staffs.php"?"a_active":""; ?>"> <a href='staffs.php'><i class="fa fa-address-card" aria-hidden="true"></i>
Add Staffs</a></li>
 
 <li class="list-group-item <?php echo basename($_SERVER["PHP_SELF"])=="view_staffs.php"?"a_active":""; ?>"> <a href='view_staffs.php'><i class='fa fa-user'></i>View Staffs</a></li>
  
  <li class="list-group-item <?php echo basename($_SERVER["PHP_SELF"])=="subject.php"?"a_active":""; ?>"> <a href='subject.php'><i class='fa fa-book'></i>Add Subject</a></li>
  
  <li class="list-group-item <?php echo basename($_SERVER["PHP_SELF"])=="view_subjects.php"?"a_active":""; ?>"> <a href='view_subjects.php'><i class="fa fa-eye" aria-hidden="true"></i>View Subject</a></li>
  
  <!--<li class="list-group-item <?php echo basename($_SERVER["PHP_SELF"])=="view_courses.php"?"a_active":""; ?>"> <a href='view_courses.php'><i class='fa fa-bookmark'></i> Course</a></li>-->
  
 
  
  
  <li class="list-group-item <?php echo basename($_SERVER["PHP_SELF"])=="logout.php"?"a_active":""; ?>"><a href='logout.php'><i class='fa fa-sign-out'></i> Logout</a></li>
</ul>

