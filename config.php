<?php
   $dbserver = "localhost:3306";
   $dbusername = "actioncalltopadministrator";
   $dbpass = "actioncalltopadministratorpassword";
   $db = "actioncalldb";
   
   $con = mysqli_connect($dbserver, $dbusername, $dbpass, $db) or die("Connect failed: %s\n". $con -> error);
   
   return $con;
?>