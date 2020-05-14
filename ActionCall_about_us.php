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
        <link rel="stylesheet" href="css/about_us.css">
        <title>ActionCall About Us People</title>
    </head>

    <body>
        <?php navbar_gen();?>

        <div class="content">
            <div id="about_us" class = "table-container container">
                <h2>Ποιοι είναι οι δημιουργοί;</h2>
                <p>Ο ιστότοπος αυτός αναπτύχθηκε από τα τέσσερις φοιτητές, των οποίων το ενδιαφέρον για τον εθελοντισμό τους ώθησε στο να δημιουργήσουν μια σελίδα που θα βοηθήσει κάθε άτομο που ενδιαφέρεται για τέτοιες δράσεις να συμβάλλει ενεργά στη βελτίωση της ζωής στη κοινότητα που ζει.Παρακάτω παρατίθενται τα στοχεία τους:
                    <ul>
                        <li>Γεώργιος Ρωμανός: georgerom1999@gmail.com</li>
                        <li>Άγγελος Μοαβίνης: amoavinis@gmail.com</li>
                        <li>Γεώργιος Ραϊτσίδης: georgeraitsidis@gmail.com</li>
                        <li>Κωνσταντίνος Σταυράτης: kostauratis@gmail.com</li>
                    </ul>
                </p>
                <h2>Ποιοι είναι οι στόχοι της ιστοσελίδας;</h2>
                <p>
                    Σε αυτήν την ιστοσελίδα, ενθαρρύνουμε άτομα να συνεισφέρουν στην ευημερία της κοινότητας στην οποία ανήκουν, συμμετέχοντας σε εκδηλώσεις της αρεσκείας τους. Εκδηλωσεις
                    αναρτώνται στo φορουμ της ιστοσελίδας από τα εγγεγραμμένα μέλη και είναι ανοιχτά προς όλους. Παραδείγματα δράσεων περιλαμβάνουν τον περιβαλλοντικό καθαρισμό,
                    τη φροντίδα αδέσποτων ζώων, την αποκατάσταση υποδομών από βανδαλισμούς ή ελλειπή συντήρηση· δραστηριότητες με σκοπό να κάνουμε τον κόσμο ένα καλύτερο μέρος. <br>
                    Τελευταίο αλλά εξίσου σημαντικό, θέλουμε να ενημερώσουμε τον κόσμο για κάποιες διεθνείς εθελοντικές οργανώσεις και το έργο τους.
                </p>
            </div>
        </div>
        
        <!-- Footer -->
        <?php footer_gen(); ?> 
        <!-- ./Footer -->
    </body>
</html>