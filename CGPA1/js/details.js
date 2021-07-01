function uname(type){
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
    var sel=document.getElementById("Dept");
    if(window.XMLHttpRequest){
        obj=new XMLHttpRequest();
    }
    else{
        obj=new ActiveXobject("Microsoft.XMLHTTP");
    }
    obj.onreadystatechange=function(){
       if(obj.readyState==4 && obj.status==200){
           if(obj.responseText!=null){
               var dept=obj.responseText;
               sessionStorage.setItem("dept",dept);
               sel.value=dept;
           }			
       }
    }
    //var type=typ;
    var url="dept.php";
    var val="mail="+sessionStorage["mail"]+"&type="+type;
    obj.open("POST",url,true);
    obj.setRequestHeader("content-type","application/x-www-form-urlencoded");
    obj.setRequestHeader("content-length",val.length);
    obj.setRequestHeader("connection","close");
    obj.send(val);
}