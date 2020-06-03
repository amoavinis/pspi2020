<!doctype html>
<?php
require("config.php");
include("config1.php");
require("gen_elements.php");
session_start();
if (isset($_COOKIE["ActionCallUser"]) && isset($_COOKIE["ActionCallUserEmail"]) && isset($_COOKIE["ActionCallUserState"]))
{
    $_SESSION["loggedin"] = true;
    $_SESSION["email"] = $_COOKIE["ActionCallUserEmail"];
    $_SESSION["username"] = $_COOKIE["ActionCallUser"];
}


?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script src="js/gen_elements.js"></script>
        <?php header_gen();?>
        <title>ActionCall Homepage</title>
        <link rel="stylesheet" href="css/forum.css">
    </head>

    <body>
    <?php navbar_gen();?>
    <div class = "container content">
        <h1>Δείτε τις παρακάτω εθελοντικές ομάδες και οργανισμούς</h1>
        <div id="forum" class="table-container">
        <?php
                $all_organizations_querry = "SELECT * FROM organizations";
                $results = mysqli_query($conn, $all_organizations_querry);
                if(mysqli_num_rows($results)>0){ ?>
                    <table class="topics-table">
                    <?php 
                        while($organization = mysqli_fetch_array($results)){ ?>
                            <tr>
                                <td style = "text-align: center;"><a href = <?php echo($organization["url"]);?>><?php echo($organization["name"]);?></a></td>
                            </tr>
                        <?php } ?>
                    </table>
                <?php } ?>
            </div>
    </div>
    <br>
    
    <!-- Footer -->
    <?php footer_gen();?>
        <!-- ./Footer -->
    </body>
</html>