<!doctype html>
<?php
require("config.php");
require("gen_elements.php");
session_start();
?>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script src="js/gen_elements.js"></script>
    <?php header_gen();?>
    <title>ActionCall Contact</title>

  </head>

    <body>
    <?php navbar_gen();?>
        <div class="container content">
            <div class="container">
                <h1>Contact Us</h1>
                <p>
                   Επικοινωνήστε μαζί μας είτε μεσω της φόρμας επικοινωνίας είτε με μια επίσκεψη στους λογαριασμούς μας στα social media
                </p>
            </div>
            <div class="container" >
                <form action="mailto:actioncallcontact@exampleemail.com" method="post" enctype="text/plain" class="needs-validation">  <!--TODO Create a real email address-->
                    <div class="form-group">
                        <label for="name">Όνομα</label>
                        <input type="text"  class="form-control" id="exampleName" placeholder="Όνομα">
                    </div>
                    <div class="form-group">
                        <label for="contact-email">Διεύθυνση e-mail </label>
                        <input type="email"  class="form-control" id="exampleEmail" placeholder="Διεύθυνση ηλεκτρονικού ταχυδρομείου" required>
                    </div>
                    <div class="form-group">
                        <label for="inputText">Το μήνυμα σας </label>
                        <textarea class="form-control" placeholder="Συμπληρώστε το μήνυμα σας εδώ..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary center-block">Αποστολή μηνύματος</button>
                </form>
            </div>
        </div>
	
        <!-- Footer -->
        <?php footer_gen();?>
        <!-- ./Footer -->
    </body>
</html>