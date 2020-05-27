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
/*if (!isset($_SESSION["username"]))
{
    header("Location: index.php");
}*/
?>
<html>
  <head>
    <link rel="stylesheet" href="css/autocomplete.css"> 
    <script src="js/editor.js"></script>
    <script src="js/gen_elements.js"></script>
    <script src="js/autocomplete.js"></script>
    <?php header_gen();?>
    <title>ActionCall - Create Post</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>
  </head>

    <body>
    <?php navbar_gen();?>
        <div class="container content">
            <div class="container">
                <h1>Κάντε μία ανάρτηση</h1>
            </div>
            <div class="container" >
                <form autocomplete ="off" class="needs-validation">
                <div class="form-group">
                        <label for="title">Τίτλος δράσης</label>
                        <input type="text" class="form-control" id="postTitle" placeholder="e.g. Καθαρισμός της Πλατείας Αριστοτέλους" required>
                    </div>
                    <div class="autocomplete">
                        <label for="city">Πόλη/Μέρος</label>
                        <input type="text"  class="form-control" id="cityName" placeholder="e.g. Thessaloniki" required>
                    </div>
                    <div class="form-group">
                    <label for="place">Διεύθυνση</label>
                    <input type="text" class="form-control" id="addressName" placeholder="e.g. Πλατεία Αριστοτέλους" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Ημερομηνία</label>
                        <input type="date" class="form-control" id="eventDate" required>
                        <label for="hour">Ώρα</label>
                        <input type="time" class="form-control" id="eventTime" min="1:00" max ="24:00" required>
                        <label for="repeat">Επαναλαμβανόμενο</label>
                        <input type="checkbox" id="rep" name="repeated_event" value="isRepeated">
                    </div>
                    <div class="form-group">
                    <textarea name="content" id="editor" required></textarea>
                    </div>
                </form>
                <button style="margin:10px;" type="submit" class="btn btn-primary center-block">Αποστολή</button>


            </div>
        </div>

        <!-- Footer -->
        <script>footer_gen();</script>
        <!-- ./Footer -->
    </body>
</html>