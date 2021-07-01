var cnt=0;
function edit(){
document.getElementById("upnm").disabled=false;
document.getElementById("updob").disabled=false;
document.getElementById("upph").disabled=false;
document.getElementById("uppd").disabled=false;
document.getElementById("btn").remove();
const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#uppd");
togglePassword.addEventListener("click", function (e) {
    // toggle the type attribute
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
    // toggle the eye slash icon
    this.classList.toggle("fa-eye-slash");
});
var s=document.createElement("input");
s.type="button";
s.className="btn";
s.id="sbtn";
s.setAttribute("onclick","save()");
s.value="Save";
var ic=document.createElement("i");
ic.className="fas fa-edit icon";
document.getElementById("cbtn").appendChild(s);
document.getElementById("cbtn").appendChild(ic);
}
function save(){
	if(window.XMLHttpRequest){
	 obj=new XMLHttpRequest();
 }
 else{
     obj=new ActiveXobject("Microsoft.XMLHTTP");
 }
 obj.onreadystatechange=function(){
    if(obj.readyState==4 && obj.status==200){
		if(obj.responseText!=null){
			var doc=obj.responseText;
			alert("Datas you edited is updated and the changes will appear when you loggedIn next Time\n"+doc);
			cnt=doc;
			document.getElementById("hbtn").click();
        }
        else{
		alert(obj.responseText);
		}			
	}
 }
 var uid=document.getElementById("uid").value;
var name=document.getElementById("upnm").value;
var dob=document.getElementById("updob").value;
var ph=document.getElementById("upph").value;
var pwd=document.getElementById("uppd").value;
 var url="profilesave.php";
 var val="n1="+name+"&d1="+dob+"&p1="+ph+"&pw1="+pwd+"&uid="+uid;
 obj.open("POST",url,true);
 obj.setRequestHeader("content-type","application/x-www-form-urlencoded");
 obj.setRequestHeader("content-length",val.length);
 obj.setRequestHeader("connection","close");
 obj.send(val);
}
