<?php

    session_start();

    $username = $_POST["username_profile"];
    $new_password = hash("sha256", $_POST["new_password"]);
    $new_password_repetition = hash("sha256", $_POST["new_password_repetition"]);

    // Database connection
    $con = include 'config.php';

    if ($new_password === "" ){
        $update_user_elements = 
        "
        UPDATE users
        SET username = \"".$username."\"
        WHERE email = \"".$_SESSION["email"]."\"
        ";

        echo ("<script>alert('You have successfully changed your username!');</script>");
        mysqli_query($con, $update_user_elements);

    }
    else{
        if($new_password === $new_password_repetition){
            $update_user_elements = 
            "
            UPDATE users
            SET username = \"".$username."\" , password = \"".$new_password."\"
            WHERE email = \"".$_SESSION["email"]."\"
            ";

            echo ("<script>alert('You have successfully changed your username and/or password!');</script>");
            mysqli_query($con, $update_user_elements);
        }
    }


    unset($_SESSION["username_profile"]);
    unset($_SESSION["new_password"]);
    unset($_SESSION["password_repetition"]);

    header("Location: ActionCall_profile.php");


?>