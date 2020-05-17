<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["loggedin"]);
unset($_SESSION["email"]);
setcookie("ActionCallUser", $row["username"], strtotime( '- 1 days' ));
setcookie("ActionCallUserEmail", $row["email"], strtotime( ' -1 days' ));
setcookie("ActionCallUserState", true, strtotime( '+ 1000 days' ));
session_unset();
session_destroy();
header("Location: index.php");
?>