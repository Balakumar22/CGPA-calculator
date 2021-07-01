<?php
session_start();
$con=odbc_connect("mcet","","");
$uid=$_SESSION["mail"];
/*$umail="Select email from Reg where email='$uid'";
$uname="Select uname from Reg where email='$uid'";
$udob="Select dob from Reg where email='$uid'";
$uph="Select ph from Reg where email='$uid'";
$upd="Select pwd from Reg where email='$uid'";
//$um=odbc_exec($con,$umail);
//$un=odbc_exec($con,$uname);
//$ud=odbc_exec($con,$udob);
//$up=odbc_exec($con,$uph);
//$upd=odbc_exec($con,$upd);*/
if($_SESSION["utype"]=="Student"){
	$pg="/CGPA1/php/details.php";
	$qc="Select * from student where mail='$uid'";
	$rs=odbc_exec($con,$qc);
	$name=odbc_result($rs,"name");
	$mail=odbc_result($rs,"mail");
	$dobd =odbc_result($rs,"dob");
	$ph=odbc_result($rs,"phone");
	$pwd=odbc_result($rs,"password");
	$dob=date("Y-m-d ", strtotime($dobd));
	}
if($_SESSION["utype"]=="Teacher"){
	$pg="/CGPA1/php/tdetails.php";
	$qc="Select * from teacher where mail='$uid'";
$rs=odbc_exec($con,$qc);
$name=odbc_result($rs,"tname");
$mail=odbc_result($rs,"mail");
$dobd =odbc_result($rs,"dob");
$ph=odbc_result($rs,"ph");
$pwd=odbc_result($rs,"pwd");
$dob=date("Y-m-d ", strtotime($dobd));
}
echo'<html>
<head>
<title>profile</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<style>
body{
	background-image:url("/CGPA1/images/cgpa.jpeg");
	background-size:cover;
}
h3{
color:white;
font-style:bold;
}
.btn {
position:absolute;
left:440px;
top:650px;
 height:50px;
  background: black;
  color: white;
  min-width: 100px;
  text-align: center;
}
.home{
position:absolute;
left:40px;
top:650px;
 height:50px;
  background: dodgerblue;
  color: white;
  min-width: 100px;
  text-align: center;
}
#container{
	position:absolute;
	top:100px;
	left:545px;
	max-width:600px;
	height:630px;
	background-color:rgba(3,3,3,0.5);
	padding-bottom:40px;
	padding-left:40px;
	padding-right:40px;
	padding-top:40px;
  }
  #upnm{
		height:50px;
width:500px;
margin-top:6px;
padding:10px;
}
#updob{
	height:50px;
width:500px;
margin-top:6px;
padding:10px;
}
#upm{
	height:50px;
width:500px;
margin-top:6px;
padding:10px;
}
#upph{
		height:50px;
width:500px;
margin-top:6px;
padding:10px;
}
#uppd{
		height:50px;
width:500px;
margin-top:6px;
padding:10px;
}
#togglePassword {
    position:relative;
	font-size:20px;
	left:460px;
	bottom:35px;
	margin-right: -30px;
    cursor: pointer;
}
</style>
<script src="/CGPA1/js/profile.js"></script>
</head>
<body>
<input type="hidden" value="'.$uid.'" id="uid">';
if($_POST){
		echo '<script> $("form").submit(function(){
  $.post($(this).attr("action"), $(this).serialize());
  return false;
});</script>';
	 //$rs=odbc_exec($con,$qc);
	 if($_SESSION["utype"]=="Student"){
		//$qc="Select * from reg where mail='$uid'";
		//$rs=odbc_exec($con,$qc);
		$name=odbc_result($rs,"name");
		$mail=odbc_result($rs,"mail");
		$dobd =odbc_result($rs,"dob");
		$ph=odbc_result($rs,"phone");
		$pwd=odbc_result($rs,"password");
		$dob=date("Y-m-d ", strtotime($dobd));
		}
	if($_SESSION["utype"]=="Teacher"){
	//$qc="Select * from teacher where mail='$uid'";
	//$rs=odbc_exec($con,$qc);
	$name=odbc_result($rs,"tname");
	$mail=odbc_result($rs,"mail");
	$dobd =odbc_result($rs,"dob");
	$ph=odbc_result($rs,"ph");
	$pwd=odbc_result($rs,"pwd");
	$dob=date("Y-m-d ", strtotime($dobd));
	}

$dob=date("Y-m-d ", strtotime($dobd));
	echo '

<div id="container">
<form method="post" role="form" target="_self">
<h3>Name :</h3>
<input id="upnm" name="un" value="'.$name.'" disabled><br>
<h3>Email :</h3>
<input id="upm" name="um" value="'.$mail.'" disabled><br>
<h3>DOB :</h3>
<input type="date" name="ud" id="updob" value='.$dob.' disabled><br>
<h3>Phone_no :</h3>
<input id="upph" name="up" value="'.$ph.'" pattern="[+91]{3}-[0-9]{10}" disabled><br>
<h3>Password :</h3>
<input type="password" id="uppd" name="upd" value="'.$pwd.'" disabled>
 <i class="far fa-eye" id="togglePassword"></i><br>
<div id="cbtn"><button type="button" class="btn" id="btn" onclick="edit()"><i class="fas fa-edit icon" disabled></i> Edit</button></div>
</form>
</div>
	<script>
var back=document.createElement("button");
back.id="home";
back.className="home";
back.innerHTML=\'<i class="fas fa-home"></i> back\';
back.onclick="history.go(-1)";
document.getElementById("cbtn").appendChild(back);
document.getElementById("btn").innerHTML=\'<i class="fas fa-edit"></i> Saved\';
</script>
</body>
</html>';
}
else{
echo'
<body>
<div id="container">
<form method="post" role="form" target="_self">
<h3>Name :</h3>
<input id="upnm" name="un" value="'.$name.'" disabled><br>
<h3>Email :</h3>
<input id="upm" name="um" value="'.$mail.'" disabled><br>
<h3>DOB :</h3>
<input type="date" name="ud" id="updob" value='.$dob.' disabled><br>
<h3>Phone_no :</h3>
<input id="upph"  name="up" value="'.$ph.'" pattern="[+91]{3}-[0-9]{10}" disabled><br>
<h3>Password :</h3>
<input type="password" id="uppd" name="upd" value="'.$pwd.'" disabled><br>
 <i class="far fa-eye" id="togglePassword"></i><br>
<div id="cbtn">
<a href="'.$pg.'"><button type="button" class="home" ><i class="fas fa-home icon"></i> Home</button></a>
<button type="button" class="btn" id="btn" onclick="edit()"><i class="fas fa-edit icon"></i> Edit</button></div>
<input type="submit" style="visibility:hidden;" id="hbtn">
</form>
</div>
</body>
</html>';
}
?>
