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
				
				 <h2><i class='fa fa-tasks'></i> Staff Details</h2> <hr> 
					<?php flash("msg");?>
						<div class='col-md-12'>	
								<table class='table table-bordered table-striped' id='myTable'>
									<thead>
									   <tr>
											<th>SNo</th>
											<th>Staff Name</th>
											<th>Email</th>
											<th>Mobile</th>
											<th>Department</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										<?php
											
											$sql="select * from tbl_staffs s INNER JOIN tbl_class d ON s.cid=d.cid ";
											
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
															<td>{$row["stname"]}</td>
															<td>{$row["email"]}</td>
															<td>{$row["mobile"]}</td>
															<td>{$row["cname"]}</td>
															<td><a class='btn btn-success btn-sm' href='staff_edit.php?id={$row["stid"]}'><i class='fa fa-edit'></i> Edit</a></td>
															<td><a class='btn btn-danger btn-sm' onclick='return confirm(\"Are You Sure?\")' href='staff_delete.php?id={$row["stid"]}'><i class='fa fa-trash'></i>  Delete</a></td>
														
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

