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
        <title>ActionCall-Σχετικές Οργανώσεις</title>
        <link rel="stylesheet" href="css/forum.css">
    </head>

    <body>
    <?php navbar_gen();?>
    <div class = "container content">
        <h1>Δείτε τις παρακάτω εθελοντικές ομάδες και οργανισμούς</h1>
        <div id="forum" class="table-container">
        <?php
                $type = mysqli_real_escape_string($con, htmlentities($_GET['type'], ENT_QUOTES));
                $long_type = "";
                if (strcmp($type, "filozoiki")==0)
                {
                    $long_type="Φιλοζωικές";
                }
                elseif (strcmp($type, "syssitio")==0)
                {
                    $long_type="Κοινωνικές κουζίνες/Συσσίτια";
                }
                elseif (strcmp($type, "recycle")==0)
                {
                    $long_type="Ανακύκλωση";
                }
                elseif (strcmp($type, "farmakeio")==0)
                {
                    $long_type="Κοινωνικά φαρμακεία";
                }
                elseif (strcmp($type, "koinwfeleis draseis")==0)
                {
                    $long_type="Κοινωφελείς δράσεις και οργανισμοί";
                }
                $all_organizations_querry = "SELECT * FROM organizations WHERE type=\"".$type."\"";
                $results = mysqli_query($conn, $all_organizations_querry);
                if(mysqli_num_rows($results)>0){ ?>
                    <table class="topics-table">
                    <tr>
                        <th style="text-align:center" width=100%><?php echo $long_type; ?></th>
                    <tr>
                    <?php
                        while($organization = mysqli_fetch_array($results)){ ?>
                            <tr>
                                <td style = "text-align: center;"><a href = <?php echo($organization["url"]);?>><?php echo($organization["name"]);?></a></td>
                                <!--<td style = "text-align: center;"><?php /**echo($organization["type"]);*/?></td>-->
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