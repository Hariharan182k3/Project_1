<?php 
	session_start(); 
	include"_config.php";
	#post
	if($_SERVER["REQUEST_METHOD"]=='POST'){
		try{
			$con->autocommit(FALSE);
			$_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
			
			$cid=$_POST["cid"];
			$sid=$_POST["sid"];
			$stid=$_SESSION["stid"];
			$cname=$_POST["cname"];
			$uyear=$_POST["uyear"];
			$semest=$_POST["semest"];
			$ddate=$_POST["ddate"];
			
			$sql="INSERT INTO tbl_course(cid,sid,stid,crname,uyear,semest,ddate) values('{$cid}','{$sid}','{$stid}','{$cname}','{$uyear}','{$semest}','{$ddate}')";

						
					if(!$con->query($sql)){
							
						throw new Exception('File Upload Failed');
					}
					
					$crid=$con->insert_id;
					
					flash("msg","File Upload Successfully");
					
					if(isset($_FILES["ffile"])){
		if($_FILES["ffile"]["name"]!=""){
			
			$fileType=strtolower(pathinfo($_FILES["ffile"]["name"],PATHINFO_EXTENSION));
			$allowedFiles=["doc", "docx","png","jpeg","jpg","pdf"];
			if(in_array($fileType,$allowedFiles))
			{
				$ffile=date("Ymd").time().rand(1,1000).".$fileType";
				if(move_uploaded_file($_FILES["ffile"]["tmp_name"],"assets/img/".$ffile))
				{
					$sql="update tbl_course set ffile='{$ffile}' where crid='{$crid}'";
					if($con->query($sql)){
						flash("msgImg","Image Uploaded Successfully");
					}
				}
				else{
					flash("msgImg"," File Upload failed","danger");
				}
			}else{
				flash("msgImg","$fileType file Not allowed","danger");
				
			}

		}
	}
				
			$con->commit();	
		}catch(Exception $e){
			$con->rollback();
			flash("msg",$e->getMessage(),"danger");
		}
	}
	

	
	
	$data["report"]=resultSet($con,"select * from tbl_course s INNER JOIN tbl_class d ON s.cid=d.cid");
	$data["report"]=resultSet($con,"select * from tbl_course s INNER JOIN tbl_subject d ON s.sid=d.sid");
	
	
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
				<h2><i class='fa fa-tasks'></i> Upload Material </h2><hr>
					<div class='col-md-12'>
					<?php flash("msg");?>
						<form method="post"  action='<?php echo $_SERVER["REQUEST_URI"];?>' autocomplete='off' enctype='multipart/form-data'>
						<div class='row'>
							<div class='col-md-6'>
								<div class="form-group">
									<label>Department</label>
									<select name="cid" required class='form-control chosen' >
										<?php 
										echo loadSelect($con,"select cid,cname from tbl_class","cid","cname");
										?>
									</select>
								</div>
							</div>
							<div class='col-md-6'>
								<div class="form-group">
									<label>Subject</label>
									<select name="sid" required class='form-control ' >
										<?php 
										echo loadSelect($con,"select sid,sname from tbl_subject","sid","sname");
										?>
									</select>
								</div>
							</div>
						</div>
						<div class='row'>
							<div class='col-md-6'>
								<div class="form-group">
								<label>Year</label>
									<select  class='form-control ' name='uyear' required>
											<?php
												echo loadSelectArray($year);
											?>
									</select>
								</div>
							</div>
							<div class='col-md-6'>
								<div class="form-group">
									<label>Semester</label>
										<select  class='form-control form-control-sm chosen' name='semest' required>
											<?php 
												echo loadSelectArray($sem);
											?>
										</select>
								</div>
							</div>
						</div>
						<div class='row'>
							<div class='col-md-6'>
								<div class="form-group">
									<label>Material Name</label>
									<input type="text"  name="cname" required class='form-control'>
								</div>
							</div>
							<div class='col-md-6'>
								<div class="form-group">
									<label>Date</label>
									<input type="date"  name="ddate" required class='form-control'>
								</div>
							</div>
						</div>
						
						<div class='row'>
							<div class='col-md-10'>
								<div class="form-group">
									<label>Upload File</label>
									<input type="file"  name="ffile" required class='form-control'>
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

