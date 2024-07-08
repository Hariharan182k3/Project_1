<?php
	session_start();
	include"_config.php";

?>
<html>
	<head>
		<?php include"_header.php";  ?>
	</head>
	<?php 	include"nav_stud.php";  ?>
	<body>
		
		<div class='container-fluid'>
			 <div class='row'>
				  <div class='col-md-3'>
						<?php 	include"student_sidebar.php";  ?>
				  </div>
				<div class="col-md-9"> 
				 <h2><i class='fa fa-home'></i> Dashboard</h2><hr>
					<div class='alert alert-info'>Welcome <b><?php echo $_SESSION["suname"]; ?></b></div>
					
					<h3 class='mt-3 ml-3'>Your Details</h3>
					<div class='col-md-6 mt-1'>
					<table class='table table-bordered table-striped'><hr>
						<tbody>
						<?php
							$sql="select * from tbl_students s inner join tbl_class c on s.cid=c.cid where suid='{$_SESSION["suid"]}'";
							$data["row"]=single($con,$sql);

						?>
								<tr>
									<td>Name</td>
									<td><?php echo $_SESSION["suname"]; ?></td>
								</tr>
								<tr>
									<td>Department</td>
									<td><?php echo $data["row"]["cname"];?></td>
								</tr>
								<tr>
									<td>Year</td>
									<td><?php echo $data["row"]["syear"];?></td>
								</tr>
								<tr>
									<td>Semester</td>
									<td><?php echo $data["row"]["semet"];?></td>
								</tr>
						</tbody>
					
					
					</table>
					</div>
					<?php flash("msg");?>
					<div class='row'>
						
					</div>
				</div> 
			 </div>
		</div>
	</body>
</html>

