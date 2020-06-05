<?php 

    require("config.php");
    session_start();

    if(array_key_exists('postId', $_GET)){
        if(isset($_GET['postId'])){
            $add_user_to_interested_people_query =
            "INSERT INTO `interested` (`user_email`, `post_id`)
            VALUES (\"".$_SESSION["email"]."\" , \"".$_GET["postId"]."\")
            "
            ;

            $con = include "config.php";
            mysqli_query($con, $add_user_to_interested_people_query);
            echo("Location: ActionCall_event.php?postId=" . $_GET['postId']);
        }
        else{ ?>
            <script>alert("The $_GET[postId] element has no value.")</script>
            <?php //header("Location: ActionCall_forum.php");
        }
    }
    else{
        ?>
        <script>alert("There is no 'postId' index.")</script>
        <?php //header("Location: ActionCall_forum.php");
    }

?>