<?php
session_start();
$con=odbc_connect("mcet","","");
$type=$_POST["type"];
if($type=='teacher'){
    $mail=$_POST["mail"];
$sql="select dept from $type where mail='$mail'";
$rs=odbc_exec($con,$sql);
if($rs){
    $_SESSION["dept"]=odbc_result($rs,"dept");
    echo $_SESSION["dept"];
}
else{
    echo "Oops something went wrong please sign out and login again!!!";
}
}
if($type=='student'){
    $mail=$_POST["mail"];
    $_SESSION["mail"]=$mail;
$sql="select dept from $type where mail='$mail'";
$rs=odbc_exec($con,$sql);
if($rs){
    $_SESSION["dept"]=odbc_result($rs,"dept");
    echo $_SESSION["dept"];
}
else{
    echo "Oops something went wrong please sign out and login again!!!";
}
}
if($type=='dc'){
    $dept=$_POST["dept"];
    $sql="select count from dept where dept='$dept'";
$rs=odbc_exec($con,$sql);
if($rs){
    echo odbc_result($rs,1);
}
else{
    echo "Oops something went wrong please sign out and login again!!!";
}
}
?>