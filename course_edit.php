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
			$cname=$_POST["cname"];
			$uyear=$_POST["uyear"];
			$semest=$_POST["semest"];
			$ddate=$_POST["ddate"];
			
			$sql="update tbl_course set cid='{$cid}',sid='{$sid}',crname='{$cname}',uyear='{$uyear}',semest='{$semest}',ddate='{$ddate}' where crid='{$_GET["id"]}'";	
					if(!$con->query($sql)){
							
						throw new Exception('File Upload Failed');
					}
					
					flash("msg","File Upload Successfully");
					
					
				
			$con->commit();	
		}catch(Exception $e){
			$con->rollback();
			flash("msg",$e->getMessage(),"danger");
		}
	}
	if(isset($_FILES["ffile"])){
		if($_FILES["ffile"]["name"]!=""){
			
			$fileType=strtolower(pathinfo($_FILES["ffile"]["name"],PATHINFO_EXTENSION));
			$allowedFiles=["doc", "docx","png","jpeg","jpg","pdf"];
			if(in_array($fileType,$allowedFiles))
			{
				$ffile=date("Ymd").time().rand(1,1000).".$fileType";
				if(move_uploaded_file($_FILES["ffile"]["tmp_name"],"material/".$ffile))
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

	
	
	
		$sql="select * from tbl_course where crid='{$_GET["id"]}'";
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
						<li class="breadcrumb-item active"><i class='fa fa-tasks'></i><a href='view_course.php' class=''>Upload Material</a></li>
						<li class="breadcrumb-item active"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</li>
					  </ol>
					</nav><hr>
					<div class='col-md-12'>
					<?php flash("msg");?>
						<form method="post"  action='<?php echo $_SERVER["REQUEST_URI"];?>' autocomplete='off' enctype='multipart/form-data'>
						<div class='row'>
							<div class='col-md-6'>
								<div class="form-group">
									<label>Department</label>
									<select name="cid" required class='form-control chosen' >
									<?php	
									echo loadSelect($con,"select cid,cname from tbl_class","cid","cname",$data["row"]["cid"]);
									?>
									</select>
								</div>
							</div>
							<div class='col-md-6'>
								<div class="form-group">
									<label>Subject</label>
									<select name="sid" required class='form-control ' >
										<?php 
										echo loadSelect($con,"select sid,sname from tbl_subject","sid","sname",$data["row"]["sid"]);
										?>
									</select>
								</div>
							</div>
						</div>
						<div class='row'>
							<div class='col-md-6'>
								<div class="form-group">
								<label>Year</label>
									<select  class='form-control form-control-sm chosen' name='uyear'  required>
										<option value=''>Select Type</option>
										<?php 
											foreach($year as $i)
											{
												if($i==$data["row"]["uyear"]){
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
									<label>Semester</label>
										<select  class='form-control form-control-sm chosen' name='semest'  required>
										<option value=''>Select Type</option>
										<?php 
											foreach($sem as $i)
											{
												if($i==$data["row"]["semest"]){
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
									<label>Material Name</label>
									<input type="text"  name="cname" required class='form-control' value='<?php echo $data["row"]["crname"];?>'>
								</div>
							</div>
							<div class='col-md-6'>
								<div class="form-group">
									<label>Date</label>
									<input type="date"  name="ddate" required class='form-control' value='<?php echo $data["row"]["ddate"];?>'>
								</div>
							</div>
						</div>
						
						<div class='row'>
							<div class='col-md-6'>
								<div class="form-group">
									<label>Upload File</label>
									<input type="file"  name="ffile"  class='form-control' >
									<a href='assets/img/<?php echo $data["row"]["ffile"]; ?>' target='_blank' style='margin-left:300px;margin-top:20px;'><?php echo $data["row"]["ffile"]; ?></a>
									
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

