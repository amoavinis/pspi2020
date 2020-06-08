<?php

session_start();
    
$delete_account_query =
"
DELETE
FROM users
WHERE email = \"".$_POST['email']."\"
"
;

// Database connection
$con = include 'config.php';

// Delete specified account
mysqli_query($con, $delete_account_query);


// Unexpected behaviour: administrator deleted his own account.
if($_POST['email'] == $_SESSION['email']){
    session_unset();
    header("Location: index.php"); 
}
// Expected behaviour: administrator created an account other than theirs.
else{
    header("Location: ActionCall_administrator_all_users_table");
}

?>