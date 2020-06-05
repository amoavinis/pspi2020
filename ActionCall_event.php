<!doctype html>
<?php
require("config.php");
require("gen_elements.php");
session_start();
if (isset($_COOKIE["ActionCallUser"]) && isset($_COOKIE["ActionCallUserEmail"]) && isset($_COOKIE["ActionCallUserState"]))
{
    $_SESSION["loggedin"] = true;
    $_SESSION["email"] = $_COOKIE["ActionCallUserEmail"];
    $_SESSION["username"] = $_COOKIE["ActionCallUser"];
}

$post_data = [];

if(isset($_GET['postId'])){
    $post_data_query = 
    "SELECT posts.*, users.username
    FROM posts INNER JOIN users ON posts.poster_email = users.email
    WHERE posts.id = \"".$_GET["postId"]."\"
    "
    ;

    $con = include "config.php";
    $post_data = (mysqli_query($con, $post_data_query))->fetch_assoc();
}

?>
<html>
  <head>
    <?php header_gen(); ?>
    <script src="js/interestedButton.js"></script>
    
    <title><?php echo($post_data["title"])?></title>
    <link rel="stylesheet" href="css/post.css">
  </head>

    <body>
        <?php navbar_gen(); ?>
        <h1><?php echo($post_data["title"]); ?></h1>
        <div id="post" class="table-container container">
            <p><b>
                Ημερομηνία διεξαγωγής:
                <?php
                $date_of_event = date_create($post_data["date_of_event"]);
                echo(date_format($date_of_event, 'm/d/Y, H:i:s')); 
                unset($date_of_event); ?>
                </b><br>
                <p1 id="postTitle">Από: <?php echo($post_data["username"]); ?><br>
                    Αναρτήθηκε:
                    <?php
                    $date_event_was_posted = date_create($post_data["date_posted"]);
                    echo(date_format($date_event_was_posted, 'm/d/Y, H:i:s')); 
                    unset($date_event_was_posted);?> </br>
                </p1></br>
            </p>

            <p> <?php echo($post_data["details"]); ?> </p>
            

            <iframe width="200" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=22.93956899646219%2C40.63176667532697%2C22.94225120547708%2C40.63318137194274&amp;layer=mapnik" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/#map=19/40.63247/22.94091">Προβολή Μεγαλύτερου Χάρτη</a></small>
            

            <div class="table-container">
                <table class="topics-table">
                    <thead>
                        <tr>
                            <?php 
                            //Button appears only when a user is logged in.
                            if(isset($_SESSION["loggedin"]) && isset($_SESSION["email"]) && $_SESSION["loggedin"]){

                                $check_whether_user_has_shown_interest_in_the_event_query =
                                "SELECT *
                                FROM interested
                                WHERE user_email = \"".$_SESSION["email"]."\" AND post_id = \"".$_GET["postId"]."\"
                                "
                                ;


                                $user_has_shown_interest_in_the_event_result = mysqli_query($con, $check_whether_user_has_shown_interest_in_the_event_query);
                                $user_has_shown_interest_in_the_event_data = $user_has_shown_interest_in_the_event_result->fetch_assoc();

                                if($user_has_shown_interest_in_the_event_data === NULL){ ?>
                                    <td><button class="btn btn-primary" type="button" onclick="UpdateClickCount();" id="like">Interested!</button></td>
                                <?php }
                                else{ ?>
                                    <td><button class="btn btn-primary" type="button" onclick="UpdateClickCount();" id="like">Not interested</button></td>
                                <?php }
                            }

                            ?>
                            <td href><span id="interested"><script>document.write("No");</script></span> people interested!</a></td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
                
        <!-- Footer -->
        <?php footer_gen(); ?>
        <!-- ./Footer -->
    </body>
</html>