<!doctype html>
<?php
require("config.php");
require("gen_elements.php");
session_start();
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script src="js/gen_elements.js"></script>
        <?php header_gen(); ?>
        <link rel="stylesheet" href="css/forum.css">
        <title>ActionCall User Profile</title> 
    </head>
    
    <body>
        <?php navbar_gen(); ?>
        <div class="container content">
            <h1> <?php echo($_SESSION["username"]); ?>'s profile  </h1>
        </div>

        <div class="container">
            <?php
            $find_posts_user_is_interested_in_sql_query = 
            "SELECT title
            FROM users JOIN interested ON user_email = \"".$_SESSION["email"]."\" JOIN posts ON post_id = id";

            $posts_user_is_interested_in = mysqli_query($con, $find_posts_user_is_interested_in_sql_query);

            if (mysqli_num_rows($posts_user_is_interested_in) > 0){
                // Output data of each row
                while($posts_interested_row = $posts_user_is_interested_in -> fetch_assoc()){
                    echo(" ".$posts_interested_row["title"]." ".$posts_interested_row["id"]." ") ;
                }
            }
            else{
                echo("You have not shown interest in any event.");
            }
            ?>

        </div>



        <?php footer_gen() ; ?>
    </body>

</html>

