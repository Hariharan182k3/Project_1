<?php
	session_start();
	include"_config.php";
?>
<?php
	
	if(isset($_POST["submit"]))
	{
		
		$cname=$_POST["cname"];
		
		
		$sql="update tbl_class set cname='{$cname}' where cid='{$_GET["id"]}'";
		if($con->query($sql))
		{
			flash("msg","Department Updated successfully");
		}
		else
		{
			flash("msg","Department Update failed","danger");
		}		
	}
	$sql="select * from tbl_class where cid='{$_GET["id"]}'";
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
						<li class="breadcrumb-item active"><i class='fa fa-tasks'></i><a href='view_classes.php' class=''>View Department</a></li>
						<li class="breadcrumb-item active"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</li>
					  </ol>
					</nav><hr>
					<div class='col-md-6'>
					<?php flash("msg");?>
						<form method="post"  action='<?php echo $_SERVER["REQUEST_URI"];?>' >
							
							<div class="form-group">
								<label>Department Name</label>
								<input type="text"  name="cname" required class='form-control' value="<?php echo $data["row"]["cname"]; ?>">
							</div>
										
							<input type='submit' name='submit' value='submit' class='btn btn-info'>
						</form>
						</div>
					</div>
					</div>
				</div> 
			
	</body>
</html>

