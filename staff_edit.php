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
		$syear=$_POST["year"];
		$cid=$_POST["cid"];
		
		$sql="update tbl_staffs set stname='{$stname}',qualify='{$qualify}',mobile='{$mobile}',email='{$email}',year='{$syear}',cid='{$cid}' where stid='{$_GET["id"]}'";
		
		if($con->query($sql))
		{
			flash("msg","Staff Updated successfully");
		}
		else
		{
			flash("msg","Staff Update failed","danger");
		}		
	}
		$sql="select * from tbl_staffs where stid='{$_GET["id"]}'";
		$data["row"]=single($con,$sql);
	
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
					<nav aria-label="breadcrumb" class=''>
					  <ol class="breadcrumb">
						<li class="breadcrumb-item"><a href='home.php' class=''><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
						<li class="breadcrumb-item active"><i class='fa fa-tasks'></i><a href='view_staffs.php' class=''> View staff</a></li>
						<li class="breadcrumb-item active"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</li>
					  </ol>
					</nav><hr>
					<div class='col-md-12'>
					<?php flash("msg");?>
						<form method="post"  action='<?php echo $_SERVER["REQUEST_URI"];?>' >
							<div class='row'>
								<div class='col-md-6'>
									<div class="form-group">
										<label>Staff Name</label>
										<input type="text"  name="stname" value="<?php echo $data["row"]["stname"]; ?>" required class='form-control'>
									</div>
								</div>
								<div class='col-md-6'>
									<div class="form-group">
										<label>Email</label>
										<input type="text"  name="email" value="<?php echo $data["row"]["email"]; ?>" required class='form-control'>
									</div>
								</div>
							</div>
							<div class='row'>
								<div class='col-md-6'>
									<div class="form-group">
										<label>Qualification</label>
										<input type="text"  name="qualify" value="<?php echo $data["row"]["qualify"]; ?>" required class='form-control'>
									</div>
								</div>
								<div class='col-md-6'>
									<div class="form-group">
										<label>Mobile</label>
										<input type="text"  name="mobile"  value="<?php echo $data["row"]["mobile"]; ?>" required class='form-control'>
									</div>
								</div>
							</div>
							<div class='row'>
								<div class='col-md-6'>
									<div class="form-group">
										<label>Department</label>
											<select name="cid" required class='form-control'>
												<?php 
													echo loadSelect($con,"select cid,cname from tbl_class","cid","cname",$data["row"]["cid"]);
												?>
											</select>
									</div>
								</div>
								<div class='col-md-6'>
									<div class="form-group">
										<label>Year</label>
									<select  class='form-control' name='year'  required>
										<option value=''>Select Type</option>
										<?php 
											foreach($year as $i)
											{
												if($i==$data["row"]["year"]){
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
											
							<input type='submit' name='submit' value='submit' class='btn btn-info'>
						</form>
						</div>
					</div>
					</div>
				</div> 
			
	</body>
</html>

