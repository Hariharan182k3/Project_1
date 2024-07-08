<?php
	session_start();
	include"_config.php";

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
				 <h2><i class='fa fa-home'></i> Dashboard</h2><hr>
					<div class='alert alert-info'>Welcome <b><?php echo $_SESSION["aname"]; ?> </b></div>
					<?php flash("msg");?>
					<div class='row'>
						
					</div>
				</div> 
			 </div>
		</div>
	</body>
</html>

