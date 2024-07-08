<?php
	session_start();
	include"_config.php";
?>
<?php
	
	if(isset($_POST["submit"]))
	{
		$sname=$_POST["sname"];
		$year=$_POST["year"];
		$sem=$_POST["sem"];
		$cid=$_POST["cid"];
		
		
		$sql="INSERT INTO tbl_subject(sname,year,sem,cid) values('{$sname}','{$year}','{$sem}','{$cid}')";
		if($con->query($sql))
		{
			flash("msg","Subject Added successfully");
		}
		else
		{
			flash("msg","Subject Added failed","danger");
		}		
	}
	$data["report"]=resultSet($con,"select * from tbl_subject s INNER JOIN tbl_class d ON s.cid=d.cid");
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
				<h2><i class='fa fa-tasks'></i> Subject Details </h2><hr>
					<div class='col-md-6'>
					<?php flash("msg");?>
						<form method="post"  action='<?php echo $_SERVER["REQUEST_URI"];?>' >
							<div class="form-group">
								<label>Subject Name</label>
								<input type="text"  name="sname" required class='form-control'>
							</div>
							<div class="form-group">
								<label>Year</label>
								<select  class='form-control ' name='year' required>
										<?php 
											
											echo loadSelectArray($year);
										?>
										
										</select>
							</div>
							<div class="form-group">
								<label>Semester</label>
								<select  class='form-control form-control-sm chosen' name='sem' required>
										<?php 
											echo loadSelectArray($sem);
										?>
								</select>
							</div>
							
							<div class="form-group">
								<label>Department</label>
								<select name="cid" required class='form-control chosen' >
									<?php 
									echo loadSelect($con,"select cid,cname from tbl_class","cid","cname");
									?>
								</select>
							</div>
											
							<input type='submit' name='submit' value='submit' class='btn btn-info'>
						</form>
						</div>
					</div>
					</div>
				</div> 
			
	</body>
</html>

