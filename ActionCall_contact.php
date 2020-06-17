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
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include("phpMailer/vendor/autoload.php");
if (($_SERVER["REQUEST_METHOD"] == "POST"))
{
    $mail = new PHPMailer(true);
    //Disable SMTP debugging. 
    $mail->SMTPDebug = 0;                               
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();            
    //Set SMTP host name                          
    $mail->Host = "smtp.gmail.com";
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;                          
    //Provide username and password     
    $mail->Username = "info.actioncall@gmail.com";                 
    $mail->Password = "4ct10nburr1t0";                           
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "tls";                           
    //Set TCP port to connect to 
    $mail->Port = 587;                                   

    $mail->From = "info.actioncall@gmail.com";
    $mail->FromName = "ActionCall Contact Form";

    $mail->addAddress("info.actioncall@gmail.com", "ActionCall Info");

    $mail->isHTML(true);

    $mail->Subject = "Contact form message";
    if (isset($_POST["name"]))
    {
        $username = htmlentities($_POST["name"], ENT_QUOTES);
    }
    else
    {
        $username = "";
    }
    if (isset($_POST["email"]))
    {
        $email = htmlentities($_POST["email"], ENT_QUOTES);
    }
    else
    {
        $email = "";
    }
    $mail->Body = "Message from: <br>Name: ".$username."<br>Email: ".$email."<br><br>Message: <br>".htmlentities($_POST["message"], ENT_QUOTES);
    //$mail->AltBody = "This is the plain text version of the email content";

    if(!$mail->send()) 
    {
        //echo "Mailer Error: " . $mail->ErrorInfo;
    } 
    else 
    {
        //echo "Message has been sent successfully";
    }
    header("Location: ActionCall_contact.php");
    die();
}

?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script src="js/gen_elements.js"></script>
    <?php header_gen();?>
    <title>ActionCall - Contact</title>

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
                <form action="" method="POST" class="needs-validation">
                    <div class="form-group">
                        <label for="name">Όνομα</label>
                        <input type="text"  class="form-control" name="name" id="name" placeholder="Όνομα">
                    </div>
                    <div class="form-group">
                        <label for="email">Διεύθυνση e-mail </label>
                        <input type="text"  class="form-control" name="email" id="email" placeholder="Διεύθυνση ηλεκτρονικού ταχυδρομείου">
                    </div>
                    <div class="form-group">
                        <label for="message">Το μήνυμα σας </label>
                        <textarea class="form-control" name="message" id="message" placeholder="Συμπληρώστε το μήνυμα σας εδώ..." required></textarea>
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