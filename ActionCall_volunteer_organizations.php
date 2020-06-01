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
    <div class = "container">
    <h1>Δείτε τις παρακάτω εθελοντικές ομάδες και οργανισμούς</h1>
    <div id="forum" class="table-container">
            
            <table class="topics-table">
                <tr>
                    <td style = "text-align: center;"><a href = "#">link1</a></td>
                </tr>
                <tr>
                    <td style = "text-align: center;"><a href = "#">link2</a></td>
                </tr>
                <tr>
                    <td style = "text-align: center;"><a href = "#">link3</a></td>
                </tr>
                <tr>
                    <td style = "text-align: center;"><a href = "#">link4</a></td>
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