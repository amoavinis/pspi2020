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
        <h1>Δείτε τις παρακάτω κατηγορίες από εθελοντικές ομάδες και οργανισμούς</h1>
        <div class="table-container" id="forum">
            <table class="topics-table">
                <tr>
                    <td style="text-align:center">
                    <i class="fa fa-paw" aria-hidden="true"></i> <a href="ActionCall_viewCategory.php?type=filozoiki">Φιλοζωικές</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center">
                    <i class="fa fa-medkit" aria-hidden="true"></i> <a href="ActionCall_viewCategory.php?type=farmakeio">Κοινωνικά φαρμακεία</a>
                    </td>
                </tr>
                <tr>    
                    <td style="text-align:center">
                    <i class="fa fa-cutlery" aria-hidden="true"></i> <a href="ActionCall_viewCategory.php?type=syssitio">Κοινωνικές κουζίνες/Συσσίτια</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center">
                    <i class="fa fa-heart" aria-hidden="true"></i> <a href="ActionCall_viewCategory.php?type=koinwfeleis+draseis">Κοινωφελείς οργανώσεις</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center">
                    <i class="fa fa-recycle" aria-hidden="true"></i> <a href="ActionCall_viewCategory.php?type=recycle">Ανακύκλωση</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <br>
    
    <!-- Footer -->
    <?php footer_gen();?>
        <!-- ./Footer -->
    </body>
</html>