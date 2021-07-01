//document.getElementById("fr1").onsubmit=function(){submit1()};
var subt=document.createElement("input");
	subt.id="subBtn";
var count=0;
var subt;
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
//if(document.getElementById("subBtn").clicked==true){
	//  alert("Submitted");
//}
//else{
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab	
//}
function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML="Submit";
    document.getElementById("nextBtn").setAttribute("onclick","login(this.name)");
    document.getElementById("nextBtn").setAttribute("name","reg");
  }  
  else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}
function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
	   if( document.getElementById("npwd").value != document.getElementById("cpwd").value){
  document.getElementById("cpwd").placeholder= "Password Mismatch";
	  document.getElementById("cpwd").value='';
      document.getElementById("cpwd").className = " invalid";
	  var error_message = '';
	if(document.getElementById("mail").value == '') {
		error_message+="Please Fill Email Address";
	}
	if(document.getElementById("npwd").value == '') {
		error_message+="Please Fill Password";
	}
	if(document.getElementById("ph").value == '') {
		error_message+="Please Fill Mobile Number";
	}
	// Display error if any else submit form
	if(error_message) {
		alert(error_message);
		return false;
	} 
      //valid = false;
     currentTab=currentTab-n;
	 //return false;
	}
    //...the form gets submitted:
    else{
	document.getElementById("fr1").submit();
  login("reg");
	//log();
	//window.stop();
	return false;
	}
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}
function validateForm() {
	
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}
function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
 
}
 function submit1(){   
 var nm=document.getElementById('name').value;
 var db=document.getElementById('dob').value.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3-$2-$1");
 var ml=document.getElementById('mail').value;
 var ph=document.getElementById('ph').value;
 var np=document.getElementById('npwd').value;
 var cp=document.getElementById('cpwd').value;  
 var roll=document.getElementById('roll').value;
 var passin=document.getElementById('batch').value;
		alert("Name :"+nm+"\n"+"Dob :"+db+"\n"+"Mail :"+ml+"\n"+"Phone :"+ph+"\n Password :"+cp+","+np);
			alert("Registration Successful !!!");
			log();
		return false;
		window.stop();
 }
 function log() {
	document.getElementById("log").style.backgroundColor="rgba(3,3,3,0.5)";
	document.getElementById("reg").style.backgroundColor="rgba(3,3,3,0.4)";
	document.getElementById("reg").style.color="rgba(255,255,255,0.8)";
	document.getElementById("log").style.color="white";
	const fr=document.querySelector('#fr1');
	const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#pwd');
togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
  var x = document.getElementById("fr");
  var y = document.getElementById("fr1");
  var z = document.getElementById("fr2");
  if (x.style.display === "none") {
	  y.style.display = "none";
    x.style.display = "block";
  } else {
    document.getElementById("fr").disabled = true;
  }
}

function reg(){
	document.getElementById("reg").style.backgroundColor="rgba(3,3,3,0.5)";
	document.getElementById("log").style.backgroundColor="rgba(3,3,3,0.4)";
    document.getElementById("reg").style.color="white";
document.getElementById("log").style.color="rgba(255,255,255,0.8)";	
	var x = document.getElementById("fr");
  var y = document.getElementById("fr1");
   if (y.style.display === "none") {
    x.style.display = "none";
	y.style.display = "block";

  } 
  else {
    document.getElementById("fr1").disabled = true;
	//this.classList.toggle('fa-eye-slash');
	//y.style.display = "block";
  }
}
function login(clicked_id){
  var utype=clicked_id;
 if(window.XMLHttpRequest){
	 obj=new XMLHttpRequest();
 }
 else{
     obj=new ActiveXobject("Microsoft.XMLHTTP");
 }
 obj.onreadystatechange=function(){
    if(obj.readyState==4 && obj.status==200){
		if(obj.responseText!='Registered Successfully' && obj.responseText!='Registered Failed' && obj.responseText!='Invalid User'){
			var name=obj.responseText;
      if(utype=='Student'){
        sessionStorage.setItem("mail",uid);
      sessionStorage.setItem("uname",name);
        var user="You are Logged in as "+name+"(Student) Successfully";
        alert(user);
        window.location.href="/CGPA1/php/details.php";
          }
          if(utype=='Teacher'){
            sessionStorage.setItem("mail",uid);
      sessionStorage.setItem("uname",name);
            var user="You are Logged in as "+name+"(Teacher) Successfully";
            alert(user);
            window.location.href="/CGPA1/php/tdetails.php";
          }
          if(utype=='reg'){
            alert(obj.responseText);
            log();
          }
        }
        else{
		alert(obj.responseText);
		//log();
		}			
	}
 }
 
 var url="/CGPA1/php/reg.php";
 if(utype=='Teacher'|| utype=='Student'){
 var uid=document.getElementById('uid').value;
 var pwd=document.getElementById('pwd').value;
 var val="uid="+uid+"&pwd="+pwd+"&utype="+utype;
 }
 if(utype=='reg'){
  var name=document.getElementById('name').value;
  var dob=document.getElementById('dob').value;
  var mail=document.getElementById('mail').value;
  var ph=document.getElementById('ph').value;
  var cp=document.getElementById('cpwd').value;
 var roll=document.getElementById('roll').value;
 var passin=document.getElementById('batch').value;
 var dept=document.getElementById('Dept').value;
 var quata=document.getElementById('quata').value;
  var val="name="+name+"&dob="+dob+"&mail="+mail+"&ph="+ph+"&cp="+cp+"&roll="+roll+"&dept="+dept+"&quata="+quata+"&passin="+passin+"&utype="+utype;
 }
 obj.open("POST",url,true);
 obj.setRequestHeader("content-type","application/x-www-form-urlencoded");
 obj.setRequestHeader("content-length",val.length);
 obj.setRequestHeader("connection","close");
 obj.send(val);
}