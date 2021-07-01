<?php
session_start();
$con=odbc_connect("mcet","","");
if($_POST){
	$n1=$_POST["n1"];
$d1=$_POST["d1"];
$p1=urlencode($_POST["p1"]);
$pw1=$_POST["pw1"];
$uid=$_POST["uid"];
if($_SESSION["utype"]=="Teacher"){
$sql  = "UPDATE teacher set tname='$n1',dob='$d1',ph='$p1',pwd='$pw1' where mail='$uid'";
}
if($_SESSION["utype"]=="Student"){
	$sql  = "UPDATE student set name='$n1',dob='$d1',phone='$p1',password='$pw1' where mail='$uid'";
	}
$update=odbc_exec($con,$sql);
if($update){
 echo $uid."profile updated \nName : ".$n1."\nDOB : ".$d1."\nPhone_no : ".$p1."\nPassword : ".$pw1;
}
else
echo "Failed";	
	//echo '<script></script>';
/*$uname="Select uname from Reg where email='$uid'";
$udob="Select dob from Reg where email='$uid'";
$uph="Select ph from Reg where email='$uid'";
$upd="Select pwd from Reg where email='$uid'";
$un=odbc_exec($con,$uname);
$ud=odbc_exec($con,$udob);
$up=odbc_exec($con,$uph);
$upd=odbc_exec($con,$upd);
while(odbc_fetch_row($un)){
$name=odbc_result($un,1);
$mail=odbc_result($um,1);
$dobd =odbc_result($ud,1);
$ph=odbc_result($up,1);
$pwd=odbc_result($upd,1);
}*/
}
?>