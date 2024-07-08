<?php
	session_start();
	include"_config.php";

?>
<html>
	<head>
		<?php include"_header.php";  ?>
	</head>
	<?php 	include"_nav.php";  ?>
	<body>
		<div class='container mt-5'>
			<div class='row mt-5'>
				<div class='col-md-6 mx-auto'>
				<h3 class='text-center'><i class='fa fa-user'></i> Staff Login</h3>
			<hr>
				<?php
					if(isset($_POST["submit"]))
						{
							$name=$_POST["stname"];
							$pass=$_POST["spass"];
							$sql="select * from tbl_staffs where stname='{$name}' and  spass='{$pass}'";
							$res=$con->query($sql);
							if($res->num_rows>0)
							{
								$row=$res->fetch_assoc();
								$_SESSION["stid"]=$row["stid"];
								$_SESSION["stname"]=$row["stname"];
								flash("msg","login successfully");
								header("location:staff_home.php");
							}
							else{
								flash("msg","Invalid Login Details","danger");
							}
						}
					?>
					
			<?php flash("msg"); ?>
					<form method="post" class="mt-5">
						<div class='form-group'>
							<label><h4>Staff Name</h4></label>
							<input type='text' name='stname' class='form-control '>
						</div>
						<div class='form-group'>
							<label><h4>Password</h4></label>
							<input type='password' name='spass' class='form-control'>
						</div>
						<p class='text-center mt-5' ><input type='submit' name='submit' value='submit' class='btn btn-primary btn-md'></p>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>

