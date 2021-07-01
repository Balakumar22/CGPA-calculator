<html>
<head>
<script src="\CGPA1\js\logout.js"></script>
</head>
<?php  
/** 
 * Created by PhpStorm. 
 * User: Ehtesham Mehmood 
 * Date: 11/21/2014 
 * Time: 2:46 AM 
 */  
//echo '<body onload="remove()">';
session_start();//session is a way to store information (in variables) to be used across multiple pages.  
session_destroy();
echo "<script>console.log('In '".$_SESSION["mail"].");</>";
header("Location: \CGPA1\html\index.html");//use for the redirection to some page  
?> 
</body>
</html>