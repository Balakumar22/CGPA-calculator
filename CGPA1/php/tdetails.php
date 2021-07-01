<html>
<head>
<title>CGPA</title>
<link rel="stylesheet" href="/CGPA1/css/cgpa.css">
<link rel="stylesheet" href="/CGPA1/css/details.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<script src="/CGPA1/js/details.js"></script>
<style>
::placeholder {
    color:#ffffff;
    font-family: Andalus;
  opacity: 0.5; /* Firefox */
}
focus:input[contenteditable] {
  background-color:lightgreen;
}
[contenteditable] {
  outline: 0px solid transparent;
}
select{
  background-color: (255,255,255,0.3);
  font-size: 1.3em;
}
 select:focus, textarea:focus, select:focus{
        outline: none;
    }
	 button:focus, textarea:focus, select:focus{
        outline: none;
    }
	select::-webkit-outer-spin-button,
select::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>
</head>
<body onload="uname('teacher')">
<div id="top">
<nav class="top1">
<div id="topcon">
<li><a href="/CGPA1/html/index.html"><i class="fa fa-home icon2"><spacer style="margin-left:5px;">Home</spacer></i></a></li>
<li><a href="/CGPA1/html/upst.html"><i class="fas fa-user-graduate icon2"><spacer style="margin-left:5px;">Update Student data</spacer></i></a></li>
<li><a href="/CGPA1/php/tdetails.php"><i class="fas fa-book-open icon2"><spacer style="margin-left:5px;">Update Semester data</spacer></i></a></li>
 </div>
<div id="dd" class="dropdown">
   <i class="fas fa-user-circle icon1"><spacer id="un" style="margin-left:10px;"></spacer></i>
  <div class="dropdown-content">
  <a href="profile.php"><i class="fa fa-user"> Profile</i></a>
  <a href="logout.php"><i class="fas fa-power-off"> Logout</i></a>
  </div>
  </div> 
  </nav>
 </div>
<form  method="post" action="/CGPA1/php/editcgpa.php">
<div id="back">
<select id="Dept" name="dept" disabled>
<option value="summa" disabled selected>Select Your Department</option>
<option value="CSE">CSE</option>
<option value="IT">IT</option>
<option value="ECE">ECE</option>
<option value="CE">CE</option>
<option value="EEE">EEE</option>
<option value="ei">EI</option>
<option value="pd">PD</option>
<option value="MECH">MECH</option>
<option value="mct">MCT</option>
<option value="AU">AU</option>
</select><br>
<select id="reg" name="reg">
<option value="Summa">Select Regulation</option>
<option value="16">2016</option>
<option value="19">2019</option>
</select>
<br>
<select id="sem" name="sem">
<option value="Summa">Select Your Semester</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
</select>
<br>
<center><Button id="ft">Fetch</Button></center>
<br>
</div>
</form>
</body>
</html>