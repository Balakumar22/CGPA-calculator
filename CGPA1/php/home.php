<html>
<head>
<title>CGPA</title>
<link rel="stylesheet" href="home.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <script src="home.js"></script>
<style>
::placeholder {
    color:gray;
    font-family: Andalus;
  opacity: 0.5; /* Firefox */
}
focus:[contenteditable] {
  background-color:lightgreen;
}
[contenteditable] {
  outline: 0px solid transparent;
}
 input:focus, textarea:focus, select:focus{
        outline: none;
    }
	 button:focus, textarea:focus, select:focus{
        outline: none;
    }
	input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
.icon {
position:relative;
left:4.6px;
top:2px;
  padding-top: 16.5px;
  padding-bottom:16.5px;
  padding-left:10px;
  padding-right:10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}
#togglePassword {
    position:relative;
	left:345px;
	bottom:30px;
	margin-right: -30px;
    cursor: pointer;
}
#togglePassword1{
	height:16px;
position:relative;
	left:345px;
	bottom:30px;
	margin-right: -30px;
    cursor: pointer;
}
#togglePassword2{
    height:16px;
	position:relative;
	left:345px;
	bottom:30px;
    cursor: pointer;
}
</style>
</head>
<body >
<div id="top">
<Button id="reg" onclick="reg()">Register</Button><Button id="log" onclick="log()">Login</Button>
</div>
<div id="pl">
</div>
<form id="fr" type="hidden" style="display:none" action="BMI.php">
<!--<i id="ulog" src="./image/user.png" width="45px" height="45px"/>-->
<i class="fa fa-user icon"></i>
<input id="uid" type="email" name="uid" placeholder="Enter UserId"></input><br>
<i class="fa fa-key icon"></i>
<input id="pwd" type="password" name="pwd" placeholder="Enter Password" />
 <i class="far fa-eye" id="togglePassword"></i><br>

<Button id="lg">Login</Button><br>
</form>
<form  onload="first1()" id="fr1"  novalidate method="post">
<!--<fieldset>-->
<div class="tab">
<i class="fa fa-user icon"></i>
<input id="name" type="text" name="name" placeholder="Enter your name " required></input><br>
<i class="fas fa-calendar-alt icon"></i>
<input id="dob" type="date" name="dob" required></input><br>
 </div>
 <!--<div style="overflow:auto;">
    <div style="float:right;">
<input type="button" id="nextBtn" class="next-form btn btn-info" onclick="nextPrev(1)" value="Next" />
</div>
</div>
 </div>
<!--</fieldset>-->
<!--<fieldset>-->
<div class="tab">
<i class="fa fa-envelope icon"></i>
<input id="mail" type="email" name="mail" placeholder="Enter clg mail_Id" pattern="[0-9]{2}[a-z]{3}[0-9]{3}@mcet.in"></input><br>
<i class="fa fa-phone icon"></i>
<input id="ph" type="tel" name="ph" placeholder="Enter phone_no" pattern="[+91]{2}-[0-9]{10}"></input><br>
 </div>
  <!--<div style="overflow:auto;">
    <div style="float:right;">
 <input type="button" name="previous" id="prevBtn" class="previous-form btn btn-default" onclick="nextPrev(-1)" value="Previous" />
	<input type="button" name="next" id="nextBtn" class="next-form btn btn-info" onclick="nextPrev(1)" value="Next" />
 </div>
 </div>
 </div>
<!--</fieldset>
<fieldset>-->
<div class="tab">
<i class="fa fa-lock icon"></i>
<input id="npwd" type="password" name="npwd" placeholder="Enter New Password" required></input>
<i class="far fa-eye" id="togglePassword1"></i><br>
 <i class="fa fa-key icon"></i>
 <input id="cpwd" type="password" name="cpwd" placeholder="Enter Confirm Password" required></input>
 <i class="far fa-eye" id="togglePassword2"></i><br>
  </div>
 <div style="overflow:auto;">
    <div style="float:right;" id="in">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>    
	</div>
  </div>
<script>
tp1 = document.querySelector('#togglePassword1');
tp2 = document.querySelector('#togglePassword2');
password1 = document.querySelector('#npwd');
password2 = document.querySelector('#cpwd');
tp1.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
    password1.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
tp2.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
    password2.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>
<!--</fieldset>-->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>
</center>
</div>
</body>
</html>
<?php 
if($_POST){
$conn='C:\xampp\htdocs\CGPA1\MCET.accdb';
$con=odbc_connect("mcet","","");
$name=$_POST["name"];
$mail=$_POST["mail"];
$dob=$_POST["dob"];
//$gen=$_POST["gen"];
$ph=$_POST["ph"];
$pwd=$_POST["cpwd"];
//$con =new PDO("odbc:DRIVER={Microsoft Access Driver(*.mdb,*.accdb)}; DBQ=$con;");
//$qc="select * from CSE";
$qc="Insert into reg (name,mail,dob,phone,password) values ('$name','$mail','$dob','$ph','$pwd')";
$rs=odbc_exec($con,$qc);
if($rs){
echo "Registered Successfully";
}
else{
echo "Registration Failed";
}
}
?>