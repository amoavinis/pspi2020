<?php

    session_start();
    // Database connection
    $con = include('config.php');
    if ($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $username = htmlspecialchars($_POST["username_profile"]);
        $new_password = hash("sha256", htmlspecialchars($_POST["new_password"]));
        $new_password_repetition = hash("sha256", htmlspecialchars($_POST["new_password_repetition"]));
        if ($new_password === "e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855" ){
            $update_user_elements = 
            "
            UPDATE users
            SET username = \"".$username."\"
            WHERE email = \"".$_SESSION["email"]."\"
            ";

            mysqli_query($con, $update_user_elements);
            $_SESSION["username"] = $username;
            $_COOKIE["ActionCallUser"] = $username;
            ?>

            <script>alert("You have successfully changed your username!")</script>

            <?php

        }
        else{
            if($new_password === $new_password_repetition){
                $update_user_elements = 
                "
                UPDATE users
                SET username = \"".$username."\" , password = \"".$new_password."\"
                WHERE email = \"".$_SESSION["email"]."\"
                ";

                mysqli_query($con, $update_user_elements);
                $_SESSION["username"] = $username;
                $_COOKIE["ActionCallUser"] = $username;

                ?>
                <script>alert('You have successfully changed your username and/or password!');</script>

                <?php
            }
        }


        unset($_SESSION["username_profile"]);
        unset($_SESSION["new_password"]);
        unset($_SESSION["password_repetition"]);
    }
    header("Location: ActionCall_profile.php");
?>