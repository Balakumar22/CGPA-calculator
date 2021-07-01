<?php
$con=odbc_connect("MCET","","");
$sem=$_POST["sem"];
$gpa=$_POST["gpa"];
$mail=$_POST["mail"];
$sql="Update student set sem$sem=$gpa where mail='$mail'";
$rs=odbc_exec($con,$sql);
if($rs)
echo "Updated Successfully!!!";
else
echo "Oops something went wrong!!!";
?>