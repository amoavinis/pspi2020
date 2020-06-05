<?php
   $dbserver = "localhost:3306";
   $dbusername = "root";
   $dbpass = "";
   $db = "actioncalldb";
   
   $conn = mysqli_connect($dbserver, $dbusername, $dbpass, $db) or die("Connect failed: %s\n". $conn -> error);
   
   return $conn;
?>