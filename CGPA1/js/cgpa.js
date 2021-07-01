function fun() { 
alert("function called");
      
		var di=document.createElement("div");
	di.setAttribute("class","popup");
		var sp=document.createElement("span");
	sp.id="myPopup";
	sp.setAttribute("class","popuptext");
	var a=0;
	var q=document.querySelectorAll("#p");
	var r=document.querySelectorAll("#c");
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
	else if(q[i].value=="B+"||q[i].value=="b"||q[i].value=="6"){
		pt[i]=6;
	}
	else {
		pt[i]=0;
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
	di.onclick=function(){
		//var no=document.getElementById("ns").value;
		sp.innerHTML= "Total no.of subjects posted: "+9+"<br/>";
		sp.innerHTML+="Your CGPA is : "+cgpa+"<br/>";
		sp.innerHTML+="<p>"+"Click Me to Reload"+"</p>";
    	//document.getElementById('myPopup').value
		    sp.classList.toggle("show");
			sp.onclick=function(){
	         location.reload();
			}
		di.appendChild(sp);
		
	}
	}
	document.getElementsByTagName('div')[0].appendChild(s);
	 document.getElementById("btn").onclick = null;
}