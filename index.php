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
        <link rel="stylesheet" href="css/index.css">
    </head>

    <body>
        <?php navbar_gen();?>
        <div class="container">
            <p class="lead">Καλωσήρθατε στη σελίδα του Action Call! </p>
        </div>
        <div class="container content">
            <h3 style="text-align: center;">Προτεινόμενες δραστηριότητες κοντά σας</h3>
            <div class="container">
                <!--Search Bar info-->
                <h3>Θεσσαλονίκη</h3>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form class="search-form">
                                <div class="input-group">
                                    <input id="input-1" class="form-control" type="text" aria-describedby="search-btn">
                                    <label for="input-1" class="sr-only">Search</label>
                                    <div class="input-group-append">
                                        <button id="search-btn" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </form>
                            <!-- Forum-->
                            <script>forum_gen("Θεσσαλονίκη");</script>
                             <!--./Forum-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="application/javascript">
            
            window.addEventListener('DOMContentLoaded', function(e) {            
                // or, to resize all iframes:
                var iframes = document.querySelectorAll("iframe");
                for( var i = 0; i < iframes.length; i++) {
                    iframes[i].height=400;
                }
            } );
        </script>
        <br>
        <div class="container"> 
            <div id="index" class = "table-container container">
                <h5 style ="text-align: center">Για πληροφορίες άλλων εθελοντικών οργανισμών ή ομάδων, κάντε κλικ <a href = "ActionCall_volunteer_organizations.php">εδώ</a></h5>
            </div>
        </div>
        <br>
        <!--adding the images, doesn't work
        <div class = "imageset" style="width: 100%">
        <img class= "image" src="imageVolunteer1.jpg" style="width: 20%; margin:0px !important; padding: 0px !important; border:0 !important;">
        <img class= "image" src="imageVolunteer1.jpg" style="width: 20%; margin:0px !important; padding: 0px !important; border:0 !important;">
        <img class= "image" src="imageVolunteer1.jpg" style="width: 20%; margin:0px !important; padding: 0px !important; border:0 !important;">
        <img class= "image" src="imageVolunteer1.jpg" style="width: 20%; margin:0px !important; padding: 0px !important; border:0 !important;">
        <img class= "image" src="imageVolunteer1.jpg" style="width: 20%; margin:0px !important; padding: 0px !important; border:0 !important;">
        </div>
        -->
  
        <!--the 4 sites
        <div class="container">
            <div class="row">
              <div class="col">
                <iframe src="http://mkoapostoli.com/%CF%84%CE%B1-%CE%BD%CE%AD%CE%B1-%CE%BC%CE%B1%CF%82/" width=100% >
                    <p>Your browser does not support iframes.</p>
                  </iframe>
              </div>
              <div class="col">
                <iframe src="http://www.oloimaziboroume.gr/calendar/calendars/ugeia/" width=100% >
                    <p>Your browser does not support iframes.</p>
                </iframe>
              </div>
            </div>
            <div class="row">
                <div class="col">
                  <iframe src="https://www.herrco.gr/polites/what_to_recycle/" width=100% >
                      <p>Your browser does not support iframes.</p>
                    </iframe>
                </div>
                <div class="col">
                  <iframe src="https://imc.thessaloniki.gr/imc" width=100% >
                      <p>Your browser does not support iframes.</p>
                  </iframe>
                </div>
              </div>
        </div>
                  -->
        
        <!-- Footer -->
        <?php footer_gen();?>
        <!-- ./Footer -->
    </body>
</html>