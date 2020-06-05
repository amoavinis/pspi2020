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
    
    <body onload="getLocation()">
        <?php navbar_gen();?>
        <div class="container">
            <p class="lead">Καλωσήρθατε στη σελίδα του Action Call! </p>
        </div>
        <div class="container content">
            <h3 style="text-align: center;">Προτεινόμενες δραστηριότητες κοντά σας</h3>
            <div class="container">
                <!--Search Bar info-->
                <h3 id="geolocation" align="center">Όλη η Ελλάδα</h3>
                
                <script>
                    var getJSON = function(url, callback) {
                        var xhr = new XMLHttpRequest();
                        xhr.open('GET', url, true);
                        xhr.responseType = 'json';
                        xhr.onload = function() {
                            var status = xhr.status;
                            if (status === 200) {
                                callback(null, xhr.response);
                            } else {
                                callback(status, xhr.response);
                            }
                        };
                        xhr.send();
                    };
                    var x = document.getElementById("geolocation");
                    var y = document.getElementById("events");
                    function getLocation() {
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(showPosition, showDefault);
                        } else {
                            x.innerHTML = "Geolocation is not supported by this browser.";
                        }
                    }
                    
                    function showPosition(position) {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            var response = JSON.parse(this.responseText);
                            x.innerHTML = response["features"][0]["properties"]["address"]["city"];
                            getEvents(position);
                            return;
                        }
                        };
                        xmlhttp.open("GET", 
                                     'https://nominatim.openstreetmap.org/reverse?format=geojson&lat='.concat(position.coords.latitude,
                                                                                                              '&lon=',
                                                                                                              position.coords.longitude,
                                                                                                              "&zoom=18"), true);
                        xmlhttp.send();                        
                    }
                    function showDefault(error) {
                        switch(error.code) {
                            case error.PERMISSION_DENIED:
                                x.innerHTML = "Όλη η Ελλάδα";
                                break;
                            case error.POSITION_UNAVAILABLE:
                                x.innerHTML = "Όλη η Ελλάδα";
                                break;
                            case error.TIMEOUT:
                                x.innerHTML = "Όλη η Ελλάδα";
                                break;
                            case error.UNKNOWN_ERROR:
                                x.innerHTML = "Όλη η Ελλάδα";
                                break; 
                        }
                        showDefaultEvents();
                        return;
                    }
                    function getEvents(position)
                    {
                        var xmlhttp = new XMLHttpRequest();
                        if (this.readyState == 4 && this.status == 200){
                            document.getElementById("events").innerHTML = "waiting";
                            return;
                        }
                        else {
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                console.log(this.responseText);
                                document.getElementById("events").innerHTML = this.responseText;
                            }
                            };
                            xmlhttp.open("POST","get_nearest_events.php", true);
                            var data = new FormData();
                            data.append("latitude", position.coords.latitude);
                            data.append("longitude", position.coords.longitude);
                            xmlhttp.send(data);
                        }
                    }
                    function showDefaultEvents()
                    {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            console.log(this.responseText);
                            var response = JSON.parse(JSON.stringify(this.responseText));
                            document.getElementById("events").innerHTML = this.responseText;
                        }
                        };
                        
                        xmlhttp.open("POST", "get_nearest_events.php", true);
                        xmlhttp.send();        
                    }
                </script>
                <h4 id="here"></h4>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form action = "Actioncall_forum.php" method = "get" class="search-form">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="search" aria-describedby="search-btn" placeholder="Search posts...">
                                    <input class="btn btn-primary" type = "submit" value = "Search">
                                </div>
                                <div class = "radiogroup" style="text-align: center;">
                                    <label>Μελλοντικά Events</label>
                                    <input type="radio" name="order" value="orderOne" checked />
                                    <label>Πρόσφατες Αναρτήσεις</label>
                                    <input type="radio" name="order" value="orderTwo"/>
                                </div>
                            </form>
                            <!-- Forum-->
                            <div id="events">
                                <div id="forum" align="center" class="container table-container"> 
                                    Enable your geolocation to see the closest events to you
                                </div>
                            </div>
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