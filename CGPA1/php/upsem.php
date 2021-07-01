<?php
session_start();
$con=odbc_connect("mcet","","");
$cc=$_POST["cc"];
$sub=$_POST["sub"];
$credit=$_POST["credit"];
$dept=$_SESSION["dept"];
$sem=$_SESSION["sem"];
$reg=$_SESSION["reg"];
$type=$_POST["type"];
$dept=$dept.$reg;
//echo $old."\n".$sub."\n".$sem."\n".$credit;
if($type=="edit"){
    $old=$_POST["old"];
$oldc=$_POST["oldc"];
$oldcc=$_POST["oldcc"];
if($cc!=$oldcc || $sub!=$old || $credit!=$oldc){
$sql="update $dept set coursecode='$cc',subject='$sub',credit=$credit where coursecode='$oldcc'";//"select coursecode from $dept where sem=$sem and subject='$old'";
$rs=odbc_exec($con,$sql);
if($rs)
echo "Updated";
}
else{
    echo "Nothing is Edited";
}
}
if($type=="add"){
    $sql="Insert into $dept (coursecode,sem,subject,credit) values ('$cc',$sem,'$sub',$credit)";//"select coursecode from $dept where sem=$sem and subject='$old'";
$rs=odbc_exec($con,$sql);
if($rs)
echo "Added Successfully";
else
    echo "Oops Something went wrong!!!";
}
if($type=="delete"){
    $sql="delete from $dept where coursecode='$cc'";//"select coursecode from $dept where sem=$sem and subject='$old'";
    $rs=odbc_exec($con,$sql);
    if($rs)
    echo "Deleted Successfully!!!";
    else
        echo "Oops Something went wrong!!!";
    
}

?>