<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["loggedin"]);
unset($_SESSION["email"]);
session_unset();
session_destroy();
header("Location: index.php");
?>