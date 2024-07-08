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
				<h3 class='text-center'><i class='fa fa-user'></i> Admin Login</h3>
			<hr>
				<?php
					if(isset($_POST["submit"]))
						{
							$name=$_POST["aname"];
							$pass=$_POST["apass"];
							$sql="select * from tbl_admin where aname='{$name}' and  apass='{$pass}'";
							$res=$con->query($sql);
							if($res->num_rows>0)
							{
								$row=$res->fetch_assoc();
								$_SESSION["aid"]=$row["aid"];
								$_SESSION["aname"]=$row["aname"];
								flash("msg","login successfully");
								header("location:home.php");
							}
							else{
								flash("msg","Invalid Login Details","danger");
							}
						}
					?>
					
			<?php flash("msg"); ?>
					<form method="post" class="mt-5">
						<div class='form-group'>
							<label><h4>UserName</h4></label>
							<input type='text' name='aname' class='form-control '>
						</div>
						<div class='form-group'>
							<label><h4>Password</h4></label>
							<input type='password' name='apass' class='form-control'>
						</div>
						<p class='text-center mt-5' ><input type='submit' name='submit' value='submit' class='btn btn-primary btn-md'></p>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>

