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

if(isset($_GET['postId'])){
    //add query and retrieve data
}

?>
<html>
  <head>
    <script src="js/gen_elements.js"></script>
    <?php header_gen(); ?>
    <script src="js/interestedButton.js"></script>
    
    <title>Καθαρισμός Σκουπιδιών στη Πλατεία Αριστοτέλους</title>
    <link rel="stylesheet" href="css/post.css">
  </head>

    <body>
        <?php navbar_gen(); ?>
        <h1>Καθαρισμός Σκουπιδιών στη Πλατεία Αριστοτέλους</h1>
        <div id="post" class="table-container container">
            <p><b>Κυριακή 26 Απριλίου στις 14:00</b><br>
                <p1 id="postTitle">Από:Ορέστης<br>Αναρτήθηκε:10/4/2020</br></p1></br>
            </p>

            <p>Η συνεχιζόμενη απεργία των υπαλλήλων καθαριότητας,έχουν μετατρέψει την Πλατεία Αριστοτέλους σε μια απέραντη χωματερή.
            <br> Τόσο ο μη καθαρισμός της όσο και η αδιάκοπη προσπάθεια κάποιων συμπολιτών μας να συνεχίζουν να τη βρωμίζουν, έχουν κάνει την Πλατεία αγνώριστη.</br>
            Γι’αυτό την Κυριακή 26 Απριλίου και ώρα 14:00 το μεσημέρι,
            <br><b> Ανοικτό κάλεσμα για τον καθαρισμό της Πλατείας Αριστοτέλους</b></br>
            <br>Απαραίτητος εξοπλισμός: Πλαστικά γάντια μιας χρήσης, Σακούλες Σκουπιδιών</br>
            </p>
            

            <iframe width="200" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=22.93956899646219%2C40.63176667532697%2C22.94225120547708%2C40.63318137194274&amp;layer=mapnik" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/#map=19/40.63247/22.94091">Προβολή Μεγαλύτερου Χάρτη</a></small>
            

            <div class="table-container">
                <table class="topics-table">
                    <thead>
                        <tr>
                            <td><button type="button" onclick="UpdateClickCount();" id="like">Interested!</button></td>
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