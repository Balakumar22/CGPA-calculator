<?php
$con=odbc_connect("mcet","","");
$type=$_POST["type"];
if($type=="dept"){
   $dept=$_POST["dept"];
   $batch=$_POST["batch"];
   $sql="select * from student where  dept='$dept' AND passin=$batch order by roll_no";
   $rs=odbc_exec($con,$sql);
   $cnt=0;
   $str='';
    while(odbc_fetch_row($rs)){
     $cnt=$cnt+1;    
     $str=$str."<tr>
     <td>$cnt</td>
     <td>".odbc_result($rs,"roll_no")."</td>
     <td>".odbc_result($rs,"name")."</td>
     </tr>";
    }
   echo $str;
}
if($type=="sec"){
    $dept=$_POST["dept"];
    $batch=$_POST["batch"];
    $sec=$_POST["sec"];
    if($sec=='A')
    $sql="select * from student where (deptno MOD 2)= 1 AND dept='$dept' AND passin=$batch order by roll_no";
    else
    $sql="select * from student where (deptno MOD 2)= 0 AND dept='$dept' AND passin=$batch order by roll_no";
    $rs=odbc_exec($con,$sql);
    $cnt=0;
    $str='';
    while(odbc_fetch_row($rs)){
     $cnt=$cnt+1;    
     $str=$str."<tr>
     <td>$cnt</td>
     <td>".odbc_result($rs,"roll_no")."</td>
     <td>".odbc_result($rs,"name")."</td>
     </tr>";
    }
    echo $str;
 }
 if($type=='fasttrackns'){
    $sql="select * from student where dept='$dept' AND passin=$batch order by roll_no";
    $rs=odbc_exec($con,$sql);
    $cnt=0;
    $str='';
    while(odbc_fetch_row($rs)){
     $cnt=$cnt+1;  
     $checked=odbc_result($rs,"fasttrack");
     $roll=odbc_result($rs,"roll_no");
     if($checked==1){
        $str=$str."<tr>
        <td>$cnt</td>
        <td>$roll</td>
        <td>".odbc_result($rs,"name")."</td>
        <td><input type='checkbox' id='cb$cnt' onclick=\"check(this.id,'$roll')\" checked></td>
        </tr>";
     }
    else{
        $str=$str."<tr>
        <td>$cnt</td>
        <td>$roll</td>
        <td>".odbc_result($rs,"name")."</td>
        <td><input type='checkbox' id='cb$cnt' onclick=\"check(this.id,'$roll')\"></td>
        </tr>";
    }
    
    }
    echo $str;
 }
 if($type=="fasttrack"){
    $dept=$_POST["dept"];
    $batch=$_POST["batch"];
    $sec=$_POST["sec"];
    if($sec=='A')
    $sql="select * from student where (deptno MOD 2)= 1 AND dept='$dept' AND passin=$batch order by roll_no";
    else
    $sql="select * from student where (deptno MOD 2)= 0 AND dept='$dept' AND passin=$batch order by roll_no";
    $rs=odbc_exec($con,$sql);
    $cnt=0;
    $str='';
    while(odbc_fetch_row($rs)){
     $cnt=$cnt+1;  
     $checked=odbc_result($rs,"fasttrack");
     $roll=odbc_result($rs,"roll_no");
     if($checked==1){
        $str=$str."<tr>
        <td>$cnt</td>
        <td>$roll</td>
        <td>".odbc_result($rs,"name")."</td>
        <td><input type='checkbox' id='cb$cnt' onclick=\"check(this.id,'$roll')\" checked></td>
        </tr>";
     }
    else{
        $str=$str."<tr>
        <td>$cnt</td>
        <td>$roll</td>
        <td>".odbc_result($rs,"name")."</td>
        <td><input type='checkbox' id='cb$cnt' onclick=\"check(this.id,'$roll')\"></td>
        </tr>";
    }
    
    }
    echo $str;
 }
 if($type=="check"){
    $roll=$_POST["roll"]; 
    //$sec=$_POST["sec"];
    $check=$_POST["check"];
    $sql="update student set fasttrack=$check where roll_no='$roll'";
    $rs=odbc_exec($con,$sql);
    if($rs && $check=="Yes"){
       echo "$roll is Added to Fasttrack Successfully!!!";
    }
    else if($rs && $check=="No"){
        echo "$roll is Removed from Fasttrack Successfully!!!";
    }   
    else
    echo "Failed!!!";
 }
 if($type=="elective"){
    $dept=$_POST["dept"];
    $batch=$_POST["batch"];
    $sec=$_POST["sec"];
    if($sec=="A")
    $sql="select * from student where (deptno MOD 2)= 1 AND dept='$dept' AND passin=$batch order by roll_no";
    else
    $sql="select * from student where (deptno MOD 2)= 0 AND dept='$dept' AND passin=$batch order by roll_no";
    $rs=odbc_exec($con,$sql);
    $cnt=0;
    $str='const ob={};';
    while(odbc_fetch_row($rs)){
     $cnt=$cnt+1;  
     if($cnt==1){
      $reg=odbc_result($rs,"regulation");
      $reg=$reg-2000;
     }
     $e1=odbc_result($rs,"Elective1");
     $e2=odbc_result($rs,"Elective2");
     $e3=odbc_result($rs,"Elective3");
     $e4=odbc_result($rs,"Elective4");
     $e5=odbc_result($rs,"Elective5");
     $e6=odbc_result($rs,"Elective6");
     $op=odbc_result($rs,"OpenElective");
     $roll=odbc_result($rs,"roll_no");
     $option='<option disabled selected>Select subject</option>';
     $sql1="select * from Open16";
    $rs1=odbc_exec($con,$sql1);
    $cin=0;
    $str=$str."ob.oop=[";
    $str=$str.'{value:"", in:"Select Subject"}';
    while($row=odbc_fetch_array($rs1)){
        // if($cin!=0)
         $str=$str.',{value:"'.$row["coursecode"].'", in:"'.$row["subject"].'"}';
        /* else
         $str=$str.'{value:"'.$row["coursecode"].'", in:"'.$row["subject"].'"}';
         $cin=$cin+1;*/
         //$option=$option.'<option value='.$row["coursecode"].'>'.$row["subject"].'</option>';
    }
    $str=$str."];";
    $str=$str."ob.eop=[";
    $str=$str.'{value:"", in:"Select Subject"}';
    $tb=$dept.$reg."elec"; 
    $sql2="select * from $tb";
    $rs2=odbc_exec($con,$sql2);
    while($row=odbc_fetch_array($rs2)){
      $str=$str.',{value:"'.$row["coursecode"].'", in:"'.$row["subject"].'"}';
      //$option1=$option1.'<option value='.$row["coursecode"].'>'.$row["subject"].'</option>';
    }
    $str=$str."];";
    $i=1;
    $e=array();
    while($i<7){ 
    $sql3="select subject from $tb where coursecode='".odbc_result($rs,"Elective$i")."'";
    $rs3=odbc_exec($con,$sql3);
    array_push($e,odbc_result($rs3,"subject"));
    $i++;
    }
    //if($checked==1){
        $nm=odbc_result($rs,"name");
        $str=$str."ob.roll$cnt='$roll';ob.name$cnt='$nm';ob.eone$cnt='$e1';ob.etwo$cnt='$e2';ob.ethree$cnt='$e3';ob.efour$cnt='$e4';ob.efive$cnt='$e5';ob.esix$cnt='$e6';ob.eopen$cnt='$op';";
    }
    $str=$str."ob.count='$cnt';";
    echo "$str";
 }
if($type=='eupdate'){
   $roll=$_POST['roll'];
   $cc=$_POST['cc'];
   $elec=$_POST['elec'];
   $sql="update student set $elec='$cc' where roll_no='$roll'";
   $rs=odbc_exec($con,$sql);
   if($rs)
   echo $elec." for ".$roll." is added as ".$cc." Successfully!!!";
}
if($type=='Marks'){
   $dept=$_POST["dept"];
   $batch=$_POST["batch"];
   $sec=$_POST["sec"];
   if($sec=='A')
   $sql="select * from student where (deptno MOD 2)= 1 AND dept='$dept' AND passin=$batch order by roll_no";
   else
   $sql="select * from student where (deptno MOD 2)= 0 AND dept='$dept' AND passin=$batch order by roll_no";
   $rs=odbc_exec($con,$sql);
   $str='';
   $cnt=1;
   while($row=odbc_fetch_array($rs)){
      $str=$str."<tr>
        <td>$cnt</td>
        <td>$row[roll_no]</td>
        <td>".odbc_result($rs,"name")."</td>
        <td>$row[sem1]</td>
        <td>$row[sem2]</td>
        <td>$row[sem3]</td>
        <td>$row[sem4]</td>
        <td>$row[sem5]</td>
        <td>$row[sem6]</td>
        <td>$row[sem7]</td>
        <td>$row[sem8]</td>
        <td>$row[cgpa]</td>
        </tr>";
        $cnt=$cnt+1;
   }
   echo $str;
}
 /*print"<tr>
        <td>$cnt</td>
        <td>$roll</td>
        <td>".odbc_result($rs,"name")."</td>
        <td><select class='eelect' id='eone$cnt' name='Elective1'  disabled>$option1</select><button class='eedit' onclick='eedit(\"eone$cnt\")'>Edit</button><button class='eupdate' onclick='eupdate(\"eone$cnt\",\"$roll\")'>Update</button><input type='hidden' id='hone$cnt' value='$e1' ></td>
        <td><select class='eelect' id='etwo$cnt' name='Elective2'  disabled>$option1</select><button class='eedit' onclick='eedit(\"etwo$cnt\")'>Edit</button><button class='eupdate' onclick='eupdate(\"etwo$cnt\",\"$roll\")'>Update</button><input type='hidden' id='htwo$cnt' value='$e2'></td>
        <td><select class='eelect' id='ethree$cnt' name='Elective3' disabled>$option1</select><button class='eedit' onclick='eedit(\"ethree$cnt\")'>Edit</button><button class='eupdate' onclick='eupdate(\"ethree$cnt\",\"$roll\")'>Update</button><input type='hidden' id='hthree$cnt' value='$e3'></td>
        <td><select class='eelect' id='efour$cnt' name='Elective4' disabled>$option1</select><button class='eedit' onclick='eedit(\"efour$cnt\")'>Edit</button><button class='eupdate' onclick='eupdate(\"efour$cnt\",\"$roll\")'>Update</button><input type='hidden' id='hfour$cnt' value='$e4'></td>
        <td><select class='eelect' id='efive$cnt' name='Elective5' disabled>$option1</select><button class='eedit' onclick='eedit(\"efive$cnt\")'>Edit</button><button class='eupdate' onclick='eupdate(\"efive$cnt\",\"$roll\")'>Update</button><input type='hidden' id='hfive$cnt' value='$e5'></td>
        <td><select class='eelect' id='esix$cnt' name='Elective6' disabled>$option1</select><button class='eedit' onclick='eedit(\"esix$cnt\")'>Edit</button><button class='eupdate' onclick='eupdate(\"esix$cnt\",\"$roll\")'>Update</button><input type='hidden' id='hsix$cnt' value='$e6'></td>
        <td><select class='eelect' id='eopen$cnt' name='OpenElective' disabled>$option</select><button class='eedit' onclick='eedit(\"eopen$cnt\")'>Edit</button><button class='eupdate' onclick='eupdate(\"eopen$cnt\",\"$roll\")'>Update</button><input type='hidden' id='hopen$cnt' value='$op'></td>
        </tr>
        <script>console.log($cnt)</script>";
        /*if($e[0]!='')
        print "<td><lable class='lelect'>$e[0]</lable><select class='eelect' id='eone$cnt' name='Elective1' value='$e1' style='visibility:hidden;'>$option1</select><button class='eedit' onclick='eedit(\"eone$cnt\")'>Edit</button><button class='eupdate' onclick='eupdate(\"eone$cnt\",\"$roll\")'>Update</button></td>";
        else
        print "<td><select class='eelect' id='eone$cnt' name='Elective1' value='$e1' >$option1</select><button class='eedit' onclick='eedit(\"eone$cnt\")'>Edit</button><button class='eupdate' onclick='eupdate(\"eone$cnt\",\"$roll\")'>Update</button></td>";
        if($e[1]!='')
        print"<td><lable class='lelect'>$e[1]</lable><select class='eelect' id='etwo$cnt' name='Elective2' value='$e2' style='visibility:hidden;' disabled>$option1</select><button class='eedit' onclick='eedit(\"etwo$cnt\")'>Edit</button><button class='eupdate' onclick='eupdate(\"etwo$cnt\",\"$roll\")'>Update</button></td>";
        else
        print"<td><select class='eelect' id='etwo$cnt' name='Elective2' value='$e2' disabled>$option1</select><button class='eedit' onclick='eedit(\"etwo$cnt\")'>Edit</button><button class='eupdate' onclick='eupdate(\"etwo$cnt\",\"$roll\")'>Update</button></td>";
        if($e[2]!='')
        print"<td><lable class='lelect'>$e[2]</lable><select class='eelect' id='ethree$cnt' name='Elective3' value='$e3' style='visibility:hidden;' disabled>$option1</select><button class='eedit' onclick='eedit(\"ethree$cnt\")'>Edit</button><button class='eupdate' onclick='eupdate(\"ethree$cnt\",\"$roll\")'>Update</button></td>";
        else
        print"<td><select class='eelect' id='ethree$cnt' name='Elective3' value='$e3'  disabled>$option1</select><button class='eedit' onclick='eedit(\"ethree$cnt\")'>Edit</button><button class='eupdate' onclick='eupdate(\"ethree$cnt\",\"$roll\")'>Update</button></td>";
        if($e[3]!='')
        print"<td><lable class='lelect'>$e[3]</lable><select class='eelect' id='efour$cnt' name='Elective4' value='$e4' style='visibility:hidden;' disabled>$option1</select><button class='eedit' onclick='eedit(\"efour$cnt\")'>Edit</button><button class='eupdate' onclick='eupdate(\"efour$cnt\",\"$roll\")'>Update</button></td>";
        else
        print"<td><select class='eelect' id='efour$cnt' name='Elective4' value='$e4' disabled>$option1</select><button class='eedit' onclick='eedit(\"efour$cnt\")'>Edit</button><button class='eupdate' onclick='eupdate(\"efour$cnt\",\"$roll\")'>Update</button></td>";
        if($e[4]!='')
        print"<td><lable class='lelect'>$e[4]</lable><select class='eelect' id='efive$cnt' name='Elective5' value='$e5' style='visibility:hidden;' disabled>$option1</select><button class='eedit' onclick='eedit(\"efive$cnt\")'>Edit</button><button class='eupdate' onclick='eupdate(\"efive$cnt\",\"$roll\")'>Update</button></td>";
        else
        print"<td><select class='eelect' id='efive$cnt' name='Elective5' value='$e5' disabled>$option1</select><button class='eedit' onclick='eedit(\"efive$cnt\")'>Edit</button><button class='eupdate' onclick='eupdate(\"efive$cnt\",\"$roll\")'>Update</button></td>";
        if($e[5]!='')
        print"<td><lable class='lelect'>$e[5]</lable><select class='eelect' id='esix$cnt' name='Elective6' value='$e6' style='visibility:hidden;' disabled>$option1</select><button class='eedit' onclick='eedit(\"esix$cnt\")'>Edit</button><button class='eupdate' onclick='eupdate(\"esix$cnt\",\"$roll\")'>Update</button></td>";
        else
        print"<td><select class='eelect' id='esix$cnt' name='Elective6' value='$e6' disabled>$option1</select><button class='eedit' onclick='eedit(\"esix$cnt\")'>Edit</button><button class='eupdate' onclick='eupdate(\"esix$cnt\",\"$roll\")'>Update</button></td>";
        if($op!='')
        print"<td><lable class='lelect'>$op</lable><select class='eelect' id='eopen$cnt' name='OpenElective'  value='$op' style='visibility:hidden;' disabled>$option</select><button class='eedit' onclick='eedit(\"eopen$cnt\")'>Edit</button><button class='eupdate' onclick='eupdate(\"eopen$cnt\",\"$roll\")'>Update</button></td>";
        else
        print"<td><select class='eelect' id='eopen$cnt' name='OpenElective'  value='$op' disabled>$option</select><button class='eedit' onclick='eedit(\"eopen$cnt\")'>Edit</button><button class='eupdate' onclick='eupdate(\"eopen$cnt\",\"$roll\")'>Update</button></td>";
        print"</tr>";
     /*}<lable id='lone$cnt'>$e[0]</lable>
     data('$e1','$e2','$e3','$e4','$e5','$e6','$op',$cnt)
     <td><input type='text' class='eelect' id='eopen$cnt' name='OpenElective' placeholder='Enter the Course Code' value='$op' disabled><button class='eedit' onclick='eedit(\"eopen$cnt\")'>Edit</button><button class='eupdate' onclick='eupdate(\"eopen$cnt\",\"$roll\")'>Update</button></td>
    else{
        $str=$str."<tr>
        <td>$cnt</td>
        <td>$roll</td>
        <td>".odbc_result($rs,"name")."</td>
        <td><input type='checkbox' id='cb$cnt' onclick=\"check(this.id,'$roll')\"></td>
        </tr>";
    }*/
?>