<?php

//Si están las 2 galletas te lleva al login
if(!isset($_COOKIE['type']) && $_COOKIE['type2']){
    
    header('location:login.php');
}

?>


<!DOCTYPE html>
<html>
 <head>
  <title>Main </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br/>
  <div>
   <br/>
   <div>
    <a href="logout.php">Salir</a>
   </div>
   <br/>
   
   <?php

    if(isset($_COOKIE["type"]) && $_COOKIE["type2"]){
        
        echo "<h2 align='center'>Welcome " . $_COOKIE['type']. "</h2>";
     }
     
     if(isset($_COOKIE["type3"])){
        
        echo "<h3 align='center'>Last login: " .$_COOKIE['type3']. "</h3>";
     }
   ?>
  </div>
 </body>
</html>
