<?php
session_start();
$con=odbc_connect("MCET","","");
$mail=$_SESSION["mail"];
$sql="select * from student where mail='$mail'";
$rs=odbc_exec($con,$sql);
?>
<html>
<head>
<title>CGPA\Calculate</title>
<link rel="stylesheet" href="/CGPA1/css/cgpa.css">
<link rel="stylesheet" href="/CGPA1/css/myacademics.css">
<script src="cgpaphp.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js" integrity="sha256-c3RzsUWg+y2XljunEQS0LqWdQ04X1D3j22fd/8JCAKw=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.min.js" integrity="sha256-FPJJt8nA+xL4RU6/gsriA8p8xAeLGatoyTjldvQKGdE=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="/CGPA1/css/details.css">
<link rel="stylesheet" href="/CGPA1/css/cal.css">
<script src="/CGPA1/js/cgpaphp.js"></script>
<script type="text/javascript">
function uname(){
    var uname=sessionStorage.getItem("uname");
    var top=document.getElementById('top');
    var len=(uname.length*10)+60;
    top.style.right=len+"px";
    var topcon=document.getElementById('topcon');
    topcon.style.right=len;
    var un=document.getElementById('un');
    un.innerHTML=uname;
    var dd=document.getElementById('dd');
    dd.style.width=((len*1.05)-10)+"px";
    var ddc=document.getElementsByClassName('dropdown-content')[0];
    ddc.style.minWidth=(len*1.05)+"px";
    ddc.style.top="48px";
    ddc.style.right="0px";
}
  </script>
</head>
<body onload="uname()">
<div id="top">
<nav class="top1">
<div id="topcon">
<li><a href="/CGPA1/html/index.html"><i class="fa fa-home icon2"><spacer style="margin-left:5px;">Home</spacer></i></a></li>
<li><a href="/CGPA1/php/myacademics.php"><i class="fas fa-save icon2"><spacer style="margin-left:5px;">My Accademic Profile</spacer></i></a></li>
 </div>
<div id="dd" class="dropdown">
   <i class="fas fa-user-circle icon1"><spacer id="un" style="margin-left:10px;"></spacer></i>
  <div class="dropdown-content">
  <a href="profile.php"><i class="fa fa-user"> Profile</i></a>
  <a href="/CGPA1/php/logout.php"><i class="fas fa-power-off"> Logout</i></a>
  </div>
  </div> 
  </nav>
 </div>
 <div class="bx" >
    <div class="bx1">
        <div id="sem1">
    <p  style="font-size: 22px;color:goldenrod"><b>Sem 1</b></p><?php $sem1=odbc_result($rs,"sem1"); if($sem1=='')echo "NaN"; else echo $sem1;?>
    </div>
    <div id="sem2" >
        <p  style="font-size: 22px;color:goldenrod"><b>Sem 2</b></p><?php $sem2=odbc_result($rs,"sem2"); if($sem2=='')echo "NaN"; else echo $sem2;?></div>
    <div id="sem3" >
        <p  style="font-size: 22px;color:goldenrod"><b>Sem 3</b></p><?php $sem3=odbc_result($rs,"sem3"); if($sem3=='')echo "NaN"; else echo $sem3;?>
    </div>
    <div id="sem4" >
        <p  style="font-size: 22px;color:goldenrod"><b>Sem 4</b></p><?php $sem4=odbc_result($rs,"sem4"); if($sem4=='')echo "NaN"; else echo $sem4;?>
    </div>
    </div>
    <div class="bx2">
        `<div id="sem5"><p  style="font-size: 22px;color:goldenrod"><b>Sem5</b></p><?php $sem5=odbc_result($rs,"sem5"); if($sem5=='')echo "NaN"; else echo $sem5;?></div>
       <div id="sem6" >
        <p  style="font-size: 22px;color:goldenrod"><b>Sem 6</b></p><?php $sem6=odbc_result($rs,"sem6"); if($sem6=='')echo "NaN"; else echo $sem6;?>
    </div>
    <div id="sem7">
        <p  style="font-size: 22px;color:goldenrod"><b>Sem 7</b></p><?php $sem7=odbc_result($rs,"sem7"); if($sem7=='')echo "NaN"; else echo $sem7;?>
    </div>
    <div id="sem8">
        <p  style="font-size: 22px;color:goldenrod"><b>Sem 8</b></p><?php $sem8=odbc_result($rs,"sem8"); if($sem8=='')echo "NaN"; else echo $sem8;?>
    </div>
</div>
</div>
<div id="cgpa">
<p  style="font-size: 22px;color:goldenrod"><b>CGPA</b></p><?php $cgpa=odbc_result($rs,"cgpa"); if($cgpa=='')echo "NaN"; else echo $cgpa;?>
</div>
</body>
</html>