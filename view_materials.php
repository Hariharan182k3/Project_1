<?php
session_start();
include"_config.php";


?>
<html>
<head>
<?php include"_header.php";  ?>
</head>
<?php include"_navmain.php";  ?>
<body>
<div class='container-fluid'>
<div class='row'>
 <div class='col-md-3'>
<?php include"student_sidebar.php";?>
 </div>
<div class="col-md-9">
<div class='col-md-12'>
<h2>Material Details</h2><hr>
<table class='table table-bordered table-striped mt-4'>
<thead>
  <tr>
<th>SNo</th>
<th>Semester</th>
<th>Subject Name</th>
<th>Material</th>
</tr>
</thead>
<tbody>
<?php

$sql="select * from tbl_course inner join tbl_subject on tbl_course.sid=tbl_subject.sid where tbl_course.cid='{$_SESSION["cid"]}' and tbl_course.uyear='{$_SESSION["year"]}' and tbl_course.semest='{$_SESSION["sem"]}' ";

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
<td>{$row["semest"]} - Semester</td>
<td>{$row["crname"]}</td>
<td><a class='btn btn-success btn-sm' href='material/{$row["ffile"]}' onclick='dlownload(\"material/{$row["ffile"]}\",event)' ><i class='fa fa-download'></i> Download</a></td>
<input type='hidden' value='material/{$row["ffile"]}' id='file_name'>

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
<script>

async function dlownload(path,e){
e.preventDefault();
var response = await fetch(path);
const blobImage = await response.blob();


var name =path;
const url = window.URL.createObjectURL(blobImage);
const a = document.createElement('a');
a.style.display = 'none';
a.href = url;
// the filename you want
a.download = name;
document.body.appendChild(a);
a.click();
window.URL.revokeObjectURL(url);
return true;
}

</script>

</body>
</html>