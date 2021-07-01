function fun() { 
	var di=document.createElement("div");
	di.setAttribute("class","popup");
		var sp=document.createElement("span");
	sp.id="myPopup";
	sp.setAttribute("class","popuptext");
	//var but=document.getElementById("btn");
	//di.appendChild(but);
	var a=0;
	var q=document.querySelectorAll("#grade");
	var r=document.querySelectorAll("#credit");
	var tot=new Array(q.length);
	var pt=new Array(q.length);
	for(var i=0;i<q.length;i++){
	if(q[i].value==""){
		alert("Enter the Grade of "+Number(i+1)+" subject");
		return false;
	}
	else if(r[i].value==""){
			alert("Enter the Credit of "+Number(i+1)+" subject");
		return false;
	}
	if(q[i].value=="O"||q[i].value=="o"||q[i].value=="10"){
		pt[i]=10;
	}
	else if(q[i].value=="A+"||q[i].value=="a+"||q[i].value=="9"){
		pt[i]=9;
	}
	else if(q[i].value=="A"||q[i].value=="a"||q[i].value=="8"){
		pt[i]=8;
	}
	else if(q[i].value=="B+"||q[i].value=="b+"||q[i].value=="7"){
		pt[i]=7;
	}
	else if(q[i].value=="B"||q[i].value=="b"||q[i].value=="6"){
		pt[i]=6;
	}
	else if(q[i].value=="RA" ||q[i].value=="ra"){
		alert("Reappear Cannot calculate cgpa");
		location.reload();
		
	}
	else{
		alert("Invalid Grade");
	}
	}
	for(var i=0;i<q.length;i++){
	temp1=Number(pt[i]);
	temp2=Number(r[i].value);
	tot[i]=Number(a+[temp1*temp2]);
	}
		for(var i=0;i<r.length;i++){
	a=a+tot[i];
	}
		var b=0;
	for(var i=0;i<r.length;i++){
	b=b+Number(r[i].value);
	}
	var cgpa=(a/b).toFixed(2);
	var count=document.getElementById("hd").value;
	//document.getElementById("div").onclick=function(){
		//var no=document.getElementById("ns").value;
		sp.innerHTML= "Total no.of subjects posted: "+count+"<br/>";
		sp.innerHTML+="Your CGPA is : "+cgpa+"<br/>";
		sp.innerHTML+="<p>"+"Click Me to go Home page"+"</p>";
    	//document.getElementById('myPopup').value
		    sp.classList.toggle("show");
			di.appendChild(sp);
			document.getElementById("pl").appendChild(di);
			var ss=document.getElementById('ss');
	ss.innerHTML='<a href="javascript:;" id="ts" onclick="generate();" ><i class="fa fa-download" aria-hidden="true"></i>&nbsp;&nbsp;Take Screen Shot</a>';
			sp.onclick=function(){
	         //location.assign("http://localhost/cgpa/cgpa.html");
			 window.history.back();
			 window.history.reload();
			 //location.reload();
			}
			document.getElementById("save").setAttribute("onclick","save("+cgpa+")");		
	document.getElementById("save").disabled=false;
}
function save(gpa){
    if(window.XMLHttpRequest){
        obj=new XMLHttpRequest();
    }
    else{
        obj=new ActiveXobject("Microsoft.XMLHTTP");
    }
    obj.onreadystatechange=function(){
       if(obj.readyState==4 && obj.status==200){
           if(obj.responseText!=null){
               alert(obj.responseText);
           }			
       }
    }
    var sem=document.getElementById("sem").value;
    var mail=sessionStorage["mail"];
    var url="/CGPA1/php/savegpa.php";
    var val="mail="+mail+"&sem="+sem+"&gpa="+gpa;
    obj.open("POST",url,true);
    obj.setRequestHeader("content-type","application/x-www-form-urlencoded");
    obj.setRequestHeader("content-length",val.length);
    obj.setRequestHeader("connection","close");
    obj.send(val);
}
