<?php
	session_start();
	include"_config.php";
?>
<?php
	
	if(isset($_POST["submit"]))
	{
		
		$stname=$_POST["stname"];
		$qualify=$_POST["qualify"];
		$mobile=$_POST["mobile"];
		$email=$_POST["email"];
		$year=$_POST["year"];
		$cid=$_POST["cid"];
		
		
		$sql="INSERT INTO tbl_staffs(stname,qualify,mobile,spass,email,year,cid) values('{$stname}','{$qualify}','{$mobile}',123,'{$email}','{$year}','{$cid}')";
		if($con->query($sql))
		{
			flash("msg","Staff Added successfully");
		}
		else
		{
			flash("msg","Staff Added failed","danger");
		}		
	}
		$data["report"]=resultSet($con,"select * from tbl_staffs s INNER JOIN tbl_class d ON s.cid=d.cid");

	
?>
<html>
	<head>
		<?php include"_header.php";  ?>
	</head>
	<?php 	include"_navmain.php";  ?>
	<body>
		<div class='container-fluid'>
			 <div class='row'>
				  <div class='col-md-3'>
					<?php include"_sidebar.php";?>
				  </div>
				<div class="col-md-9"> 
				<h2><i class='fa fa-tasks'></i> Staff Details </h2><hr>
					<div class='col-md-12'>
					<?php flash("msg");?>
						<form method="post"  action='<?php echo $_SERVER["REQUEST_URI"];?>' >
							<div class='row'>
								<div class='col-md-6'>
									<div class="form-group">
										<label>Staff Name</label>
										<input type="text"  name="stname" required class='form-control'>
									</div>
								</div>
								<div class='col-md-6'>
									<div class="form-group">
										<label>Email</label>
										<input type="text"  name="email" required class='form-control'>
									</div>
								</div>
							</div>
							<div class='row'>
								<div class='col-md-6'>
									<div class="form-group">
										<label>Qualification</label>
										<input type="text"  name="qualify" required class='form-control'>
									</div>
								</div>
								<div class='col-md-6'>
									<div class="form-group">
										<label>Mobile</label>
										<input type="text"  name="mobile" required class='form-control'>
									</div>
								</div>
							</div>
							<div class='row'>
								<div class='col-md-6'>
									<div class="form-group">
										<label>Department</label>
											<select name="cid" required class='form-control chosen' >
											<?php 
												echo loadSelect($con,"select cid,cname from tbl_class","cid","cname");
											?>
										</select>
									</div>
								</div>
								<div class='col-md-6'>
									<div class="form-group">
										<label>Year</label>
										<select  class='form-control ' name='year' required>
										<?php 
											echo loadSelectArray($year);
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

