<?php
	session_start();
	include"_config.php";
?>
<?php
	
	if(isset($_POST["submit"]))
	{
		
		$suname=$_POST["suname"];
		$roll=$_POST["roll"];
		$dob=$_POST["dob"];
		$syear=$_POST["syear"];
		$semet=$_POST["semet"];
		$cid=$_POST["cid"];
		$stid=$_SESSION["stid"];
		
		
		$sql="INSERT INTO tbl_Students(suname,stid,roll,dob,syear,semet,cid) values('{$suname}','{$stid}','{$roll}','{$dob}','{$syear}','{$semet}','{$cid}')";
		if($con->query($sql))
		{
			flash("msg","Student Added successfully");
		}
		else
		{
			flash("msg","Student Added failed","danger");
		}		
	}
		$data["report"]=resultSet($con,"select * from tbl_students s INNER JOIN tbl_class d ON s.cid=d.cid");

	
?>
<html>
	<head>
		<?php include"_header.php";  ?>
	</head>
	<?php 	include"nav_staff.php";  ?>
	<body>
		<div class='container-fluid'>
			 <div class='row'>
				  <div class='col-md-3'>
					<?php include"staff_sidebar.php";?>
				  </div>
				<div class="col-md-9"> 
				<h2><i class='fa fa-tasks'></i> Student Details </h2><hr>
					<div class='col-md-12'>
					<?php flash("msg");?>
						<form method="post"  action='<?php echo $_SERVER["REQUEST_URI"];?>' >
							<div class='row'>
								<div class='col-md-6'>
									<div class="form-group">
										<label>Student Name</label>
										<input type="text"  name="suname" required class='form-control'>
									</div>
								</div>
								<div class='col-md-6'>
									<div class="form-group">
										<label>Roll No</label>
										<input type="text"  name="roll" required class='form-control'>
									</div>
								</div>
							</div>
							<div class='row'>
								<div class='col-md-6'>
									<div class="form-group">
										<label>Date of Birth</label>
										<input type="date"  name="dob" required class='form-control date-picker'>
									</div>
								</div>
								<div class='col-md-6'>
									<div class="form-group">
										<label>Year</label>
										<select  class='form-control ' name='syear' required>
										<?php 
											echo loadSelectArray($year);
										?>
								</select>
									</div>
								</div>
							</div>
							<div class='row'>
							<div class='col-md-6'>
									<div class="form-group">
										<label>Semester</label>
										<select  class='form-control ' name='semet' required>
										<?php 
											echo loadSelectArray($sem);
										?>
								</select>
									</div>
								</div>
								<div class='col-md-6'>
								
									<div class="form-group">
										<label>Department</label>
											<select name="cid" required class='form-control ' >
											<?php 
												echo loadSelect($con,"select cid,cname from tbl_class","cid","cname");
											?>
										</select>
									</div>
								</div>
								
							</div>
											
							<input type='submit' name='submit' value='submit' class='btn btn-info'>
						</form>
						</div>
					</div>
					</div>
				</div> 
			
	</body>
</html>

