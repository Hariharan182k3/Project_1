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
				
				 <h2><i class='fa fa-user'></i> Subject Details</h2> <hr>
					<?php flash("msg");?>
						<div class='col-md-12'>	
								<table class='table table-bordered table-striped'>
									<thead>
									   <tr>
											<th>SNo</th>
											<th>Subject Name</th>
											<th>Department</th>
											<th>Year</th>
											<th>Semester</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										<?php
											
											$sql="select * from tbl_subject s INNER JOIN tbl_class d ON s.cid=d.cid ";
											
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
															<td>{$row["sname"]}</td>
															<td>{$row["cname"]}</td>
															<td>{$row["year"]}</td>
															<td>{$row["sem"]}</td>
															<td><a class='btn btn-success btn-sm' href='subject_edit.php?id={$row["sid"]}'><i class='fa fa-edit'></i> Edit</a></td>
															<td><a class='btn btn-danger btn-sm' onclick='return confirm(\"Are You Sure?\")' href='subject_delete.php?id={$row["sid"]}'><i class='fa fa-trash'></i>  Delete</a></td>
														
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

