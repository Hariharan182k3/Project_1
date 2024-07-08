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
		
		
		$sql="update tbl_subject set sname='{$sname}',year='{$year}',sem='{$sem}',cid='{$cid}' where sid='{$_GET["id"]}'";
		if($con->query($sql))
		{
			flash("msg","Subject Updated successfully");
		}
		else
		{
			flash("msg","Subject Update failed","danger");
		}		
	}
	$sql="select * from tbl_Subject where sid='{$_GET["id"]}'";
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
						<li class="breadcrumb-item active"><i class='fa fa-tasks'></i><a href='view_subjects.php' class=''> View subject</a></li>
						<li class="breadcrumb-item active"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</li>
					  </ol>
					</nav><hr>
					<div class='col-md-6'>
					<?php flash("msg");?>
						<form method="post"  action='<?php echo $_SERVER["REQUEST_URI"];?>' >
							<div class="form-group">
								<label>Subject Name</label>
								<input type="text"  name="sname" required class='form-control' value="<?php echo $data["row"]["sname"]; ?>">
							</div>
							<div class="form-group">
								<label>Year</label>
								<select  class='form-control form-control-sm ' name='year'  required>
										<option value=''>Select year</option>
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
							<div class="form-group">
								<label>Semester</label>
								<select  class='form-control form-control-sm ' name='sem'  required>
										<option value=''>Select Semester</option>
										<?php 
											foreach($sem as $i)
											{
												if($i==$data["row"]["sem"]){
													echo"<option value='{$i}' selected >{$i}</option>";
												}else{
													echo"<option value='{$i}'>{$i}</option>";
												}
											}
										?>
										
										</select>
							</div>
							
							<div class="form-group">
								<label>Department</label>
								<select name="cid" required class='form-control'>
								<?php 
									echo loadSelect($con,"select cid,cname from tbl_class","cid","cname",$data["row"]["cid"]);
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

