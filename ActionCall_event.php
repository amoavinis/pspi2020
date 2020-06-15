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
    WHERE posts.id = \"".htmlentities($_GET["postId"], ENT_QUOTES)."\"
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
    <link rel="stylesheet" href="css/profile.css">
    
    <title><?php echo($post_data["title"])?></title>
    <link rel="stylesheet" href="css/post.css">
  </head>

    <body>
        <?php navbar_gen(); ?>
        <div class="container">
            <h1><?php echo($post_data["title"]); ?></h1>
            <?php
            if (isset($_SESSION['email'])&&isset($_SESSION['authority'])){
                if($_SESSION['email'] === $post_data['poster_email'] || $_SESSION['authority'] === 'administrator'){ ?>
                    <form action="delete_event.php" method="POST">
                        <button type="submit" style="background: transparent; border: 0" class="delete-account-trash-button">
                            <i type="submit" class="fas fa-trash-alt"></i>  
                        </button>
                        <input type="hidden" name="postId" value="<?php echo($post_data['id']); ?>">
                    </form>
                <?php }
            } ?>
        </div>

    

        <div id="post" class="table-container container">
            <p><b>
                Ημερομηνία διεξαγωγής:
                <?php
                $date_of_event = date_create($post_data["date_of_event"]);
                echo(date_format($date_of_event, 'F j, Y, H:i')); 
                unset($date_of_event); ?>
                </b><br>
                <p1 id="postTitle">Από: <?php echo($post_data["username"]); ?><br>
                    Αναρτήθηκε:
                    <?php
                    $date_event_was_posted = date_create($post_data["date_posted"]);
                    echo(date_format($date_event_was_posted, 'F j, Y, H:i')); 
                    unset($date_event_was_posted);?> </br>
                </p1></br>
            </p>


            <p> <?php echo($post_data["details"]); ?> </p>
            
            <div class="map-frame">
            <iframe id="map" width="200" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=22.93956899646219%2C40.63176667532697%2C22.94225120547708%2C40.63318137194274&amp;layer=mapnik" style="border: 1px solid black"></iframe><br/><small><a target="_blank" href="https://www.openstreetmap.org/#map=19/40.63247/22.94091">Προβολή Μεγαλύτερου Χάρτη</a></small>
            </div>

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
                                WHERE user_email = \"".$_SESSION['email']."\" AND post_id = \"".htmlentities($_GET['postId'], ENT_QUOTES)."\"
                                "
                                ;


                                $user_has_shown_interest_in_the_event_result = mysqli_query($con, $check_whether_user_has_shown_interest_in_the_event_query);
                                $user_has_shown_interest_in_the_event_data = $user_has_shown_interest_in_the_event_result->fetch_assoc();

                                if($user_has_shown_interest_in_the_event_data === NULL){ ?>
                                    <td>
                                        <form action="show_interest_in_event.php", method="GET">
                                            <button class="btn btn-primary" type="submit"  id="like">Interested!</button>
                                            <input type="hidden" name="postId" value="<?php echo(htmlentities($_GET['postId'], ENT_QUOTES)) ?>">
                                        </form>
                                    </td>
                                <?php }
                                else{ ?>
                                    <td>
                                        <form action="stop_showing_interest_in_event.php", method="GET">
                                            <button class="btn btn-primary" type="submit" id="like">Not interested</button>
                                            <input type="hidden" name="postId" value="<?php echo(htmlentities($_GET['postId'], ENT_QUOTES)) ?>">
                                        </form>
                                    </td>
                                <?php }
                            }

                            ?>
                                    <td href>
                                        <span id="interested">
                                        <?php

                                        $people_interested_in_event_query = 
                                        "SELECT COUNT(*) AS number_of_people_interested
                                        FROM `interested`
                                        WHERE post_id = \"".htmlentities($_GET["postId"], ENT_QUOTES)."\"
                                        "
                                        ;
                                        echo(mysqli_fetch_assoc(mysqli_query($con, $people_interested_in_event_query))['number_of_people_interested']);
                                        ?>
                                
                                        </span> people interested!</a>
                                    </td>
                                </tr>
                    </thead>
                </table>
            </div>
        </div>

        <script>
        var lat=0;
        var long=0;
        var bbox0=0;
        var bbox1=0;
        var bbox2=0;
        var bbox3=0;
        $.ajax({
			url:'https://nominatim.openstreetmap.org/reverse?format=geojson&'.concat("lat=",lat,"&lon=",long)
			dataType:'json',
			success:function(data){
                console.log(data);
                bbox0=data.features.bbox[0];
                bbox1=data.features.bbox[1];
                bbox2=data.features.bbox[2];
                bbox3=data.features.bbox[3];
                getMap(bbox0,bbox1,bbox2,bbox3);
			},
            error:function(text){
                console.log("There was an error");
            }
		});
        function getMap(bbox0,bbox1,bbox2,bbox3){
        var map=document.getElementById("map");
        map.src="https://www.openstreetmap.org/export/embed.html?bbox=".concat(bbox0,"%2C",bbox1,"%2C",bbox2,"%2C",bbox3,"&amp;layer=mapnik");
        }
        </script>
                
        <!-- Footer -->
        <?php footer_gen(); ?>
        <!-- ./Footer -->
    </body>
</html>