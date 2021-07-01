var batch=document.getElementById("year");
var dept=document.getElementById("dept1");
var ycnt=0;
var scnt=0;
var ocnt=0;
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
  pload();
}
function pload(){
      var d=new Date()
      var year=d.getFullYear();
      for(i=0;i<4;i++){
            document.getElementById((i+1)).value=year-i;
        } 
}
function year(){
      if(ycnt>0){
        var tb=document.getElementById("tb");
        var th=document.getElementById("th");
        tb.remove();
        th.remove();
      }
      document.getElementById("dept1").value=sessionStorage["dept"];
      department();
      ycnt++;
}
function department(){
    if(window.XMLHttpRequest){
        obj=new XMLHttpRequest();
    }
    else{
        obj=new ActiveXobject("Microsoft.XMLHTTP");
    }
    obj.onreadystatechange=function(){
       if(obj.readyState==4 && obj.status==200){
           if(obj.responseText!=null){
               var cnt=Number(obj.responseText);
               if(cnt>60){
                   document.getElementById("section").disabled=false;
                   document.getElementById("op").disabled=true;
               }
               else{
                document.getElementById("section").disabled=true;
                document.getElementById("op").disabled=false;
               }
               tab("dept");
           }			
       }
    }
    var dept=document.getElementById("dept1").value;
    var type="dc";
    var url="/CGPA1/php/dept.php";
    var val="dept="+dept+"&type="+type;
    obj.open("POST",url,true);
    obj.setRequestHeader("content-type","application/x-www-form-urlencoded");
    obj.setRequestHeader("content-length",val.length);
    obj.setRequestHeader("connection","close");
    obj.send(val);
}
function section(){
if(scnt>0){
    op();
  }
  else{
    var tb=document.getElementById("tb");
    var th=document.getElementById("th");
    tb.remove();
    th.remove();
   document.getElementById("op").disabled=false;
   tab("sec");
}
   scnt++;
}
function op(){
    var tb=document.getElementById("tb");
    var th=document.getElementById("th");
    tb.remove();
    th.remove();
    var op=document.getElementById("op").value;
    tab(op);
}
function tab(type){
    var tab=document.getElementById("tab");
    var th=document.createElement("thead");
    var tb=document.createElement("tbody");
    th.id="th";
    tb.id="tb";
    if(type=='dept' || type=='sec')
    th.innerHTML="<th>Sl.No</th><th id='roll'>Roll_No</th><th id='sn'>Student Name</th>";
    if(type=='fasttrack')
    th.innerHTML="<th>Sl.No</th><th id='roll'>Roll_No</th><th id='sn'>Student Name</th><th>Fasttrack</th>";
    if(type=='elective')
    th.innerHTML="<th>Sl.No</th><th id='roll'>Roll_No</th><th id='sn'>Student Name</th><th>Elective 1</th><th>Elective 2</th><th>Elective 3</th><th>Elective 4</th><th>Elective 5</th><th>Elective 6</th><th>Open Elective</th>";
    if(type=='Marks'){
        th.innerHTML="<th>Sl.No</th><th id='roll'>Roll_No</th><th id='sn'>Student Name</th><th>Sem 1</th><th>Sem 2</th><th>Sem 3</th><th>Sem 4</th><th>Sem 5</th><th>Sem 6</th><th>Sem 7</th><th>Sem 8</th><th>CGPA</th>"; 
    }
    tab.appendChild(th);
    if(window.XMLHttpRequest){
        obj=new XMLHttpRequest();
    }
    else{
        obj=new ActiveXobject("Microsoft.XMLHTTP");
    }
    obj.onreadystatechange=function(){
       if(obj.readyState==4 && obj.status==200){
           if(obj.responseText!=null){
               if(type!='elective'){
               tb.innerHTML+=obj.responseText;
               tab.appendChild(tb);
               }
               else{
                   var script=document.createElement("script");
                   script.innerHTML=obj.responseText;
                   console.log(obj.responseText);
                   document.head.appendChild(script);
                   elective();
               }
           }			
       }
    }
    var dept=sessionStorage["dept"];
    var batch=document.getElementById("year").value;
    if(type=='dept')
    var val="batch="+batch+"&dept="+dept+"&type="+type;
    if(type=='sec'){
        var sec=document.getElementById("section").value;
        var val="batch="+batch+"&dept="+dept+"&sec="+sec+"&type="+type;
    }
    if((type=='fasttrack' && document.getElementById("section").disabled==false) || (type=='elective' && document.getElementById("section").disabled==false)||(type=='Marks' && document.getElementById("section").disabled==false)){
        var sec=document.getElementById("section").value;
        var val="batch="+batch+"&dept="+dept+"&sec="+sec+"&type="+type;
    }
    if(type=='fasttrack' && document.getElementById("section").disabled==true  || (type=='elective' && document.getElementById("section").disabled==true)||(type=='Marks' && document.getElementById("section").disabled==true)){
        type+='ns';
        var val="batch="+batch+"&dept="+dept+"&type="+type;
    }
    var url="/CGPA1/php/table.php";
    obj.open("POST",url,true);
    obj.setRequestHeader("content-type","application/x-www-form-urlencoded");
    obj.setRequestHeader("content-length",val.length);
    obj.setRequestHeader("connection","close");
    obj.send(val);
}
function check(clicked,roll){
    var check;
     if(document.getElementById(clicked).checked==true){
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
        var dept=document.getElementById("dept1").value;
        var type="check";
        check="Yes";
        var url="/CGPA1/php/table.php";
        var val="check="+check+"&roll="+roll+"&type="+type;
        obj.open("POST",url,true);
        obj.setRequestHeader("content-type","application/x-www-form-urlencoded");
        obj.setRequestHeader("content-length",val.length);
        obj.setRequestHeader("connection","close");
        obj.send(val); 
     }
     if(document.getElementById(clicked).checked==false){
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
        var dept=document.getElementById("dept1").value;
        var type="check";
        check="No";
        var url="/CGPA1/php/table.php";
        var val="check="+check+"&roll="+roll+"&type="+type;
        obj.open("POST",url,true);
        obj.setRequestHeader("content-type","application/x-www-form-urlencoded");
        obj.setRequestHeader("content-length",val.length);
        obj.setRequestHeader("connection","close");
        obj.send(val); 
     }
}
function eedit(id){
    document.getElementById(id).disabled=false;
}
function eupdate(id,roll){
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
               document.getElementById(id).disabled=true;
           }			
       }
    }
    var cc=document.getElementById(id).value;
    var elect=document.getElementById(id).name;
    var type="eupdate";
    var url="/CGPA1/php/table.php";
    var val="cc="+cc+"&elec="+elect+"&roll="+roll+"&type="+type;
    obj.open("POST",url,true);
    obj.setRequestHeader("content-type","application/x-www-form-urlencoded");
    obj.setRequestHeader("content-length",val.length);
    obj.setRequestHeader("connection","close");
    obj.send(val);
}
function elective(){
    var tab=document.getElementById("tab");
    var tb=document.createElement("tbody");
    tb.id="tb";
var len=ob.count;
var olen=Object.keys(ob.oop).length;
var elen=Object.keys(ob.eop).length;
var oop='';
var eop='';
for(var i=0;i<olen;i++){
    oop+="<option value='"+ob.oop[i].value+"'/>"+ob.oop[i].in+"</option>";
}
for(var i=0;i<elen;i++){
    eop+="<option value='"+ob.eop[i].value+"'/>"+ob.eop[i].in+"</option>";
}
for(var i=1;i<=len;i++){
    tb.innerHTML+="<tr><td>"+i+"</td><td>"+ob["roll"+i]+"</td><td>"+ob["name"+i]+"</td><td><select class='eelect' id='eone"+i+"' name='Elective1' value='"+ob["eone"+i]+"' disabled>"+eop+"</select><button class='eedit' onclick='eedit(\"eone"+i+"\")'>Edit</button><button class='eupdate' onclick='eupdate(\"eone"+i+"\",\""+ob["roll"+i]+"\")'>Update</button></td><td><select class='eelect' id='etwo"+i+"' name='Elective2'  disabled>"+eop+"</select><button class='eedit' onclick='eedit(\"etwo"+i+"\")'>Edit</button><button class='eupdate' onclick='eupdate(\"etwo"+i+"\",\""+ob["roll"+i]+"\")'>Update</button></td><td><select class='eelect' id='ethree"+i+"' name='Elective3' disabled>"+eop+"</select><button class='eedit' onclick='eedit(\"ethree"+i+"\")'>Edit</button><button class='eupdate' onclick='eupdate(\"ethree"+i+"\",\""+ob["roll"+i]+"\")'>Update</button></td><td><select class='eelect' id='efour"+i+"' name='Elective4' disabled>"+eop+"</select><button class='eedit' onclick='eedit(\"efour"+i+"\")'>Edit</button><button class='eupdate' onclick='eupdate(\"efour"+i+"\",\""+ob["roll"+i]+"\")'>Update</button></td><td><select class='eelect' id='efive"+i+"' name='Elective5' disabled>"+eop+"</select><button class='eedit' onclick='eedit(\"efive"+i+"\")'>Edit</button><button class='eupdate' onclick='eupdate(\"efive"+i+"\",\""+ob["roll"+i]+"\")'>Update</button></td><td><select class='eelect' id='esix"+i+"' name='Elective6' disabled>"+eop+"</select><button class='eedit' onclick='eedit(\"esix"+i+"\")'>Edit</button><button class='eupdate' onclick='eupdate(\"esix"+i+"\",\""+ob["roll"+i]+"\")'>Update</button></td><td><select class='eelect' id='eopen"+i+"' name='OpenElective' disabled>"+oop+"</select><button class='eedit' onclick='eedit(\"eopen"+i+"\")'>Edit</button><button class='eupdate' onclick='eupdate(\"eopen"+i+"\",\""+ob["roll"+i]+"\")'>Update</button></td></tr>";
}
tab.appendChild(tb);
data(len);
}
function data(len){
    for(var i=1;i<=len;i++){
    document.getElementById("eone"+i).value=ob["eone"+i];
    document.getElementById("etwo"+i).value=ob["etwo"+i];
    document.getElementById("ethree"+i).value=ob["ethree"+i];
    document.getElementById("efour"+i).value=ob["efour"+i];
    document.getElementById("efive"+i).value=ob["efive"+i];
    document.getElementById("esix"+i).value=ob["esix"+i];
    document.getElementById("eopen"+i).value=ob["eopen"+i];
    }
}
