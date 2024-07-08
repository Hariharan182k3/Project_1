<?php
	session_start();
	include"_config.php";

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
				
				 <h2><i class='fa fa-user'></i> Material Details</h2> <hr>
					<?php flash("msg");?>
						<div class='col-md-12'>	
								<table class='table table-bordered table-striped'>
									<thead>
									   <tr>
											<th>SNo</th>
											<th>Department</th>
											<th>Subject Name</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										<?php
											
											$sql="select * from tbl_course s INNER JOIN tbl_class d ON s.cid=d.cid ";
											
											$res=$con->query($sql);
											
											if($res->num_rows>0)
											{
												$i=0;
												while($row=$res->fetch_assoc())
												{
													$i++;
													echo"
														<tr>
															<td>{$i}</td>
															<td>{$row["cname"]}</td>
															<td>{$row["crname"]}</td>
															<td><a class='btn btn-success btn-sm' href='course_edit.php?id={$row["crid"]}'><i class='fa fa-edit'></i> Edit</a></td>
															<td><a class='btn btn-danger btn-sm' onclick='return confirm(\"Are You Sure?\")' href='course_delete.php?id={$row["crid"]}'><i class='fa fa-trash'></i>  Delete</a></td>
														
														</tr>";
												}
												
											}
									
										?>
									</tbody>
								</table>
					</div>
					</div>
			  </div>
				</div> 
			 </div>
		</div>
	</body>
</html>

