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
		
		
		$sql="update tbl_Students set suname='{$suname}',roll='{$roll}',dob='{$dob}',syear='{$syear}',semet='{$semet}',cid='{$cid}' where suid='{$_GET["id"]}'";
		if($con->query($sql))
		{
			flash("msg","Student Updated successfully");
		}
		else
		{
			flash("msg","Student Update failed","danger");
		}		
	}
		$sql="select * from tbl_students where suid='{$_GET["id"]}'";
		$data["row"]=single($con,$sql);
	
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
					<nav aria-label="breadcrumb" class=''>
					  <ol class="breadcrumb">
						<li class="breadcrumb-item"><a href='home.php' class=''><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
						<li class="breadcrumb-item active"><i class='fa fa-tasks'></i><a href='view_student.php' class=''>View Student</a></li>
						<li class="breadcrumb-item active"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</li>
					  </ol>
					</nav><hr>
					<div class='col-md-12'>
					<?php flash("msg");?>
						<form method="post"  action='<?php echo $_SERVER["REQUEST_URI"];?>' >
							<div class='row'>
								<div class='col-md-6'>
									<div class="form-group">
										<label>Student Name</label>
										<input type="text"  name="suname" value="<?php echo $data["row"]["suname"]; ?>"  required class='form-control'>
									</div>
								</div>
								<div class='col-md-6'>
									<div class="form-group">
										<label>Roll No</label>
										<input type="text"  name="roll" value="<?php echo $data["row"]["roll"]; ?>"  required class='form-control'>
									</div>
								</div>
							</div>
							<div class='row'>
								<div class='col-md-6'>
									<div class="form-group">
										<label>Date of Birth</label>
										<input type="date"  name="dob" value="<?php echo $data["row"]["dob"]; ?>"  required class='form-control date-picker'>
									</div>
								</div>
								<div class='col-md-6'>
									<div class="form-group">
										<label>Year</label>
										<select  class='form-control form-control-sm chosen' name='syear'  required>
										<option value=''>Select Type</option>
										<?php 
											foreach($year as $i)
											{
												if($i==$data["row"]["syear"]){
													echo"<option value='{$i}' selected >{$i}</option>";
												}else{
													echo"<option value='{$i}'>{$i}</option>";
												}
											}
										?>
										
										</select>
									</div>
								</div>
							</div>
							<div class='row'>
							<div class='col-md-6'>
									<div class="form-group">
										<label>Semester</label>
										<select  class='form-control form-control-sm chosen' name='semet'  required>
										<option value=''>Select Type</option>
										<?php 
											foreach($sem as $i)
											{
												if($i==$data["row"]["semet"]){
													echo"<option value='{$i}' selected >{$i}</option>";
												}else{
													echo"<option value='{$i}'>{$i}</option>";
												}
											}
										?>
										
										</select>
									</div>
								</div>
								<div class='col-md-6'>
								
									<div class="form-group">
										<label>Department</label>
											<select name="cid" required class='form-control ' >
											<?php 
												echo loadSelect($con,"select cid,cname from tbl_class","cid","cname",$data["row"]["cid"]);
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

