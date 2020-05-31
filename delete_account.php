<?php

    session_start();
    
    $delete_account_query =
    "
    DELETE
    FROM users
    WHERE email = \"".$_SESSION["email"]."\"
    "
    ;

    // Database connection
    $con = include 'config.php';

    // Delete specified account
    mysqli_query($con, $delete_account_query);

    session_unset();
    header("Location: index.php");
?>