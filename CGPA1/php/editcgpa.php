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
<link rel="stylesheet" href="/CGPA1/css/edit.css">
<script src="/CGPA1/js/editcgpa.js"></script>
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
    dd.style.width=(len-10)+"px";
    var ddc=document.getElementsByClassName('dropdown-content')[0];
    ddc.style.minWidth=len+"px";
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
<li><a href="/CGPA1/html/upst.html"><i class="fas fa-user-graduate icon2"><spacer style="margin-left:5px;">Update Student data</spacer></i></a></li>
<li><a href="upsd.php"><i class="fas fa-book-open icon2"><spacer style="margin-left:5px;">Update Semester data</spacer></i></a></li>
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
 <?php 
session_start();
$conn='C:\xampp\htdocs\CGPA\MCET.accdb';
$con=odbc_connect("MCET","","");
$dept=$_SESSION["dept"];
$sem=$_POST["sem"];
$reg=$_POST["reg"];
$dept=$dept.$reg;
//$_SESSION["dept"]=$dept;
$_SESSION["sem"]=$sem;
$_SESSION["reg"]=$reg;
$qc="SELECT * from ".$dept." where sem= ".$sem;
$rs=odbc_exec($con,$qc);
$count=0;
print'<input type="hidden" value="'.$sem.'" id="sem">';
print '<div id="ss"></div>';
print '<div id="wcon">';
while($row=odbc_fetch_array($rs)){
    print '<input id="cc"  placeholder="Enter the Course Code" value="'.$row['coursecode'].'" class="cc" name="cc'.$count.'" disabled>';
 print '<input class="sub" width="500" value="'.$row['subject'].'" name="sub'.$count.'" disabled/>' ;
 print '<input id="credit" class="credit" value='.$row['credit'].' name="credit'.$count.'" disabled>';
 print '<button class="editbtn" onclick="edit('.$count.',1)"><i class="fas fa-edit icona"></i>Edit</button>';
 print '<button class="delbtn" onclick="del('.$count.')"><i class="fas fa-minus-circle icona"></i>Delete</button>';
echo "<br>";
$count=$count+1;
}
echo "</div><br>";
print '<div id="pl">
<a href="/CGPA1/php/tdetails.php"><Button name="btn" id="btn" class="btn" onclick=" window.history.back()" >Back</Button></a>
<Button name="edit" id="ed" class="ed" onclick="edit('.$count.',0)">Edit</Button>
<Button name="add" id="add" class="add" onclick="add('.$count.')">Add</Button>
</div>';
print '<input id="hd" type="hidden" visible="false" value="'.$count.'"/>';
?>
</body>
</html>