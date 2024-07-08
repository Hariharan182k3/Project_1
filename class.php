<?php
	session_start();
	include"_config.php";
?>
<?php
	
	if(isset($_POST["submit"]))
	{
		
		$cname=$_POST["cname"];
		
		
		$sql="INSERT INTO tbl_class(cname) values('{$cname}')";
		if($con->query($sql))
		{
			flash("msg","Department Added successfully");
		}
		else
		{
			flash("msg","Department Added failed","danger");
		}		
	}
	
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
				<h2><i class='fa fa-tasks'></i> Department Details </h2><hr>
					<div class='col-md-6'>
					<?php flash("msg");?>
						<form method="post"  action='<?php echo $_SERVER["REQUEST_URI"];?>' >
							
							<div class="form-group">
								<label>Department Name</label>
								<input type="text"  name="cname" required class='form-control'>
							</div>
											
							<input type='submit' name='submit' value='submit' class='btn btn-info'>
						</form>
						</div>
					</div>
					</div>
				</div> 
			
	</body>
</html>

