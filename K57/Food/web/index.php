<?php 
   require_once("../lib/db.php");
    include '../lib/auth.php';

	session_start();
	echo  $_SESSION["username"];
 	 
	echo  $_SESSION["idrole"];

	 $conn = db_connect();
        
      
        $isMember = isMember($conn,'admin', '20eabe5d64b0e216796e834f52d61fd0b70332fc');
        $result=  $isMember['idrole'];

        echo "<br> ".$result;
        if('2'==$result){
        	echo 'cho mya';
        }

        db_close($conn);

 ?>