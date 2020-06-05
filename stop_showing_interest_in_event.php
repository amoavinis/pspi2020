<?php 
    require("config.php");
    session_start();

    if(array_key_exists('postId', $_GET)){
        if(isset($_GET['postId'])){
            $delete_user_from_interested_people_query =
            "DELETE FROM `interested`
            WHERE user_email = \"".$_POST["email"]."\" AND post_id =  \"".$_GET['postId']."\"
            "
            ;

            $con = include "config.php";
            mysqli_query($con, $delete_user_from_interested_people_query);
            header("Location: Action_Call_event.php?postId=" .$_GET['postId']);
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
