<?php 	
$conn='C:\xampp\htdocs\CGPA1\MCET.accdb';
$con=odbc_connect("mcet","","");
if($_POST['utype']=="reg" ){
$name=$_POST["name"];
$mail=$_POST["mail"];
$dob=$_POST["dob"];
$roll_no=$_POST["roll"];
$dept=$_POST["dept"];
$quata=$_POST["quata"];
$passin=$_POST["passin"];
$ph=$_POST["ph"];
$pwd=$_POST["cp"];
$passedout=$passin+4;
$qc="Insert into student (name,mail,quata,roll_no,dob,dept,phone,password,passin,passedout) values ('$name','$mail','$quata','$roll_no','$dob','$dept','$ph','$pwd',$passin,$passedout)";
$rs=odbc_exec($con,$qc);
if($rs){
echo "Registered Successfully";
}
else{
echo "Registration Failed";
}
}

if($_POST['utype']=="Student" || $_POST['utype']=="Teacher"){
	$mail=$_POST["uid"];
	$pwd=$_POST["pwd"];
	session_start();
	$_SESSION["mail"]=$mail;
	$_SESSION["utype"]=$_POST['utype'];
	if($_POST['utype']=="Student"){
        $qc="Select * from student where mail='$mail' and password='$pwd'";
		$rs=odbc_exec($con,$qc);
		$result=odbc_result($rs,"name");
		if($result!=''){
			echo $result;
		}
		else{
			echo "Invalid User";
		}
		}
	if($_POST['utype']=="Teacher"){
        $qc="Select tname from teacher where mail='$mail' and pwd='$pwd'";
		$rs=odbc_exec($con,$qc);
		$result=odbc_result($rs,"tname");
		if($result!=''){
			echo $result;
		}
		else{
			echo "Invalid User";
		}
	}
}
?>