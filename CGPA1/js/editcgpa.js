var editmaincnt=0;
var id=0;
function edit(n,from){
    var ad=document.getElementById("add");
    var btn=document.getElementById("btn");
    var ed=document.getElementById("ed");
      var sub=document.getElementsByClassName("sub");
      var credit=document.getElementsByClassName("credit");
      var edit=document.getElementsByClassName("editbtn");
      var del=document.getElementsByClassName("delbtn");
      var cc=document.getElementsByClassName("cc");
      var i;
      if(from==0){
          if(editmaincnt%2==0){
              for(i=0;i<n;i++){
                  edit[i].style.visibility="visible";
                  del[i].style.visibility="visible";
                }
                ed.innerHTML="Updated";
                ad.disabled=true;
                btn.disabled=true;
           }
           else{
            for(i=0;i<n;i++){
                edit[i].style.visibility="hidden";
                del[i].style.visibility="hidden";
              }
              ed.innerHTML="Edit";
             ad.disabled=false;
             btn.disabled=false;
              //if(cc[id].disabled==false||sub[id].disabled==false||credit[id].disabled==false){
                cc[id].style.backgroundColor="rgba(3,3,3,0.5)";
                cc[id].disabled=true;
                sub[id].style.backgroundColor="rgba(3,3,3,0.5)";
                sub[id].disabled=true;
                credit[id].style.backgroundColor="rgba(3,3,3,0.5)";
                credit[id].disabled=true;
              //}
           }
           editmaincnt++;
      }
      if(from==1){
          id=n;
          var oldcc=document.getElementsByClassName("cc");
        var old=document.getElementsByClassName("sub");
        var oldc=document.getElementsByClassName("credit");
        sessionStorage["cc"]=oldcc[n].value;
        sessionStorage["sub"]=old[n].value;
        sessionStorage["credit"]=oldc[n].value;
          cc[n].style.backgroundColor="rgba(3,3,3,0.8)";
          cc[n].disabled=false;
          sub[n].style.backgroundColor="rgba(3,3,3,0.8)";
          sub[n].disabled=false;
          credit[n].disabled=false;
          credit[n].style.backgroundColor="rgba(3,3,3,0.8)";
          for(i=0;i<edit.length;i++){
          edit[i].disabled=true;
          }
          edit[n].disabled=false;
    }
      ed.setAttribute("onclick","update("+n+",0)");
}
function update(n,from){
   var ad=document.getElementById("add");
    var btn=document.getElementById("btn");
   ad.disabled=false;
   btn.disabled=false;
   if(from==0){
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
               alert(doc);
               cnt=doc;
               document.getElementById("hbtn").click();
           }
           else{
           alert(obj.responseText);
           }			
       }
    }
    var sub=document.getElementsByClassName("sub");
   var credit=document.getElementsByClassName("credit");
   var cc=document.getElementsByClassName("cc");
   var s="";
   var c="";
      s=sub[n].value;
      c=credit[n].value;
      cc=cc[n].value;
    var type="edit";
    var url="upsem.php";
    var val="cc="+cc+"&sub="+s+"&credit="+c+"&old="+sessionStorage["sub"]+"&oldc="+sessionStorage["credit"]+"&oldcc="+sessionStorage["cc"]+"&type="+type;
    obj.open("POST",url,true);
    obj.setRequestHeader("content-type","application/x-www-form-urlencoded");
    obj.setRequestHeader("content-length",val.length);
    obj.setRequestHeader("connection","close");
    obj.send(val);
   }
   if(from==1){
    if(window.XMLHttpRequest){
        obj=new XMLHttpRequest();
    }
    else{
        obj=new ActiveXobject("Microsoft.XMLHTTP");
    }
    obj.onreadystatechange=function(){
       if(obj.readyState==4 && obj.status==200){
               var doc=obj.responseText;
               alert(doc);
           }			
       }
    var sub=document.getElementsByClassName("sub");
   var credit=document.getElementsByClassName("credit");
   var cc=document.getElementsByClassName("cc");
   if(sub[n].value==""||credit[n].value==""||cc[n].value==""){
         alert("Please Enter all the values correctly in newly added field!!!");
         return false;
   }
   var s="";
   var c="";
      s=sub[n].value;
      c=credit[n].value;
      cc=cc[n].value;
    var type="add";
    var url="upsem.php";
    var val="cc="+cc+"&sub="+s+"&credit="+c+"&type="+type;
    obj.open("POST",url,true);
    obj.setRequestHeader("content-type","application/x-www-form-urlencoded");
    obj.setRequestHeader("content-length",val.length);
    obj.setRequestHeader("connection","close");
    obj.send(val);
   }
   window.location.reload();
}
function add(n){
    var id=n;
    var sub=document.createElement("input");
    sub.className="sub";
    sub.setAttribute("name","sub"+id);
    sub.placeholder="Enter the subject name";
    var credit=document.createElement("input");
    credit.className="credit";
    credit.id="credit";
    credit.setAttribute("name","credit"+id);
    credit.placeholder="Enter the credit value";
    var cc=document.createElement("input");
    cc.className="cc";
    cc.id="cc";
    cc.setAttribute("name","cc"+id);
    cc.placeholder="Enter the Course Code";
    document.getElementById("wcon").appendChild(cc);
    document.getElementById("wcon").appendChild(sub);
    document.getElementById("wcon").appendChild(credit);
    var add=document.getElementById("add");
    add.innerHTML="Update";
    add.setAttribute("onclick","update("+id+",1)");
}
function del(n){
       var sub=document.getElementsByClassName("sub");
       var credit=document.getElementsByClassName("credit");
       var cc=document.getElementsByClassName("cc");
       var r=confirm("Are your sure you want to delete "+cc[n].value);
       if (r == true) {
        if(window.XMLHttpRequest){
            obj=new XMLHttpRequest();
        }
        else{
            obj=new ActiveXobject("Microsoft.XMLHTTP");
        }
        obj.onreadystatechange=function(){
           if(obj.readyState==4 && obj.status==200){
                   var doc=obj.responseText;
                   alert(doc);
               }			
           }
        var s="";
        var c="";
        s=sub[n].value;
        c=credit[n].value;
         cc=cc[n].value;
        var type="delete";
        var url="upsem.php";
        var val="cc="+cc+"&sub="+s+"&credit="+c+"&type="+type;
        obj.open("POST",url,true);
        obj.setRequestHeader("content-type","application/x-www-form-urlencoded");
        obj.setRequestHeader("content-length",val.length);
        obj.setRequestHeader("connection","close");
        obj.send(val); 
      } 
      else {
          alert("You have cancelled your request...");
        return false;
      }
   window.location.reload();
}