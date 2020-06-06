<?php

require("config.php");
session_start();


$change_user_authority_query =
"UPDATE `users`
SET authority = \"".$_POST["chosen_authority"]."\"
WHERE email = \"".$_POST["userEmail"]."\"
"
;

$con = include "config.php";

mysqli_query($con, $change_user_authority_query);

//In case that the administrator changed their own authority.
if($_POST['userEmail'] == $_SESSION['email']){
    unset($_POST['userEmail']); unset($_POST['chosen_authority']);
    header("Location: index.php");
}
//"Expected behaviour: changing someone else's authority.
else{
    header("Location: ActionCall_administrator_user_page.php?userEmail=" . $_POST['userEmail']);
}

?>