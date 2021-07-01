<?php 
session_start();
$conn='C:\xampp\htdocs\CGPA\MCET.accdb';
$con=odbc_connect("MCET","","");
$dept=$_SESSION["dept"];
$sem=$_POST["sem"];
$reg=$_POST["reg"];
$dept=$dept.$reg;
$qc="SELECT * from ".$dept." where sem= ".$sem;
$rs=odbc_exec($con,$qc);
$count=0;
print'<input type="hidden" value="'.$sem.'" id="sem">';
print '<div id="ss"></div>';
print '<div id="wcon">';
while($row=odbc_fetch_array($rs)){
 if($row['subject']!='Elective1'&&$row['subject']!='Elective2'&&$row['subject']!='Elective3'&&$row['subject']!='Elective4'&&$row['subject']!='Elective5'&&$row['subject']!='Elective6'&&$row['subject']!='Elective7'&&$row['subject']!='OpenElective'){ 
 print '<lable class="sub" width="500">'.$row['subject'].'</lable>' ;
 print '<input id="credit" class="credit" value='.$row['credit'].' name="credit'.$count.'" disabled>';
 print '<input id="grade" placeholder="Enter your grade" class="grade" name="grade'.$count.'">';
echo "<br>";
}
 else {
  $sql="select * from student where mail='$_SESSION[mail]'";
  $rs1=odbc_exec($con,$sql);
  if(odbc_result($rs1,$row['subject'])!='' && $sem!=7 ){
    $t=$dept.'elec';
    $cc=odbc_result($rs1,$row['subject']);
    $sql2="select * from $t where coursecode='$cc'";
  $rs2=odbc_exec($con,$sql2);
  print '<lable class="sub" width="500">'.odbc_result($rs2,"subject").'</lable>' ;
  print '<input id="credit" class="credit" value="'.odbc_result($rs2,"credit").'" name="credit'.$count.'" disabled>';
  print '<input id="grade" placeholder="Enter your grade" class="grade" name="grade'.$count.'">';
 echo "<br>";
 }
 if(odbc_result($rs1,$row['subject'])!='' && $sem==7){
  $t='Open'.$reg;
  $cc=odbc_result($rs1,$row['subject']);
  $sql2="select * from $t where coursecode='$cc'";
$rs2=odbc_exec($con,$sql2);
print '<lable class="sub" width="500">'.odbc_result($rs2,"subject").'</lable>' ;
print '<input id="credit" class="credit" value="'.odbc_result($rs2,"credit").'" name="credit'.$count.'" disabled>';
print '<input id="grade" placeholder="Enter your grade" class="grade" name="grade'.$count.'">';
echo "<br>";
}
}
$count=$count+1;
}
echo "</div><br>";
print '<div id="pl">
<a href="/CGPA1/php/details.php"><Button name="btn" id="bk" class="bk" onclick=" window.history.back()" >Back</Button></a>
<Button name="btn" id="btn" class="btn" onclick="fun()" >Calculate</Button>
<Button id="save" class="save" disabled>Save</Button>
</div>';
print '<input id="hd" type="hidden" visible="false" value="'.$count.'"/>';
?>
<html>
<head>
<title>CGPA\Calculate</title>
<link rel="stylesheet" href="/CGPA1/css/cgpa.css">
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
function generate()
{
  html2canvas(document.body, {
      onrendered: function(canvas)  
      {
        var uname=sessionStorage.getItem("uname");
        var fn=uname+"_sem"+document.getElementById('sem').value+"_cgpa.png";
         canvas.toBlob(function(blob) {
          saveAs(blob, fn);
        });
      }
  });
  return false;
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

</body>
</html>