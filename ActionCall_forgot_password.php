<!doctype html>
<?php
require("config.php");
require("gen_elements.php");
session_start();

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("Location: index.php");
    die();
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include("phpMailer/vendor/autoload.php");
if($_SERVER["REQUEST_METHOD"] == "POST") 
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
    $mail->Username = "no.reply.actioncall@gmail.com";                 
    $mail->Password = "pspi20201337";                           
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "tls";                           
    //Set TCP port to connect to 
    $mail->Port = 587;                                   

    $mail->From = "no.reply.actioncall@gmail.com";
    $mail->FromName = "ActionCall no-reply";

    if (isset($_POST["email"]))
    {
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $sql = "SELECT * FROM users WHERE email=\"".$email."\";";
        $result = mysqli_query($con, $sql);
        $n = mysqli_num_rows($result);
        if ($n==1)
        {
            $mail->addAddress($email, "actioncall user");

            $mail->isHTML(true);

            $mail->Subject = "Password change requested";
            $key = hash('sha256', microtime().$email);
            $sql1 = "INSERT INTO password_resets (user_email, reset_key) VALUES (\"".$email."\", \"".$key."\");";
            $result1 = mysqli_query($con, $sql1);
            $mail->Body = "ActionCall password reset link: localhost/ActionCall/password_reset.php?key=".$key;
            //$mail->AltBody = "This is the plain text version of the email content";

            if(!$mail->send()) 
            {
                //echo "Mailer Error: " . $mail->ErrorInfo;
            } 
            else 
            {
                //echo "Message has been sent successfully";
            }
            header("Location: ActionCall_login.php");
            die();
        }
    }    
}

?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script src="js/gen_elements.js"></script>
        <?php header_gen();?>
        <title>ActionCall Forgot Password</title>  
    </head>

    <body>
        <?php navbar_gen();?>
        <div class="container content">
            <div class="d-flex justify-content-center">
                <div class="card">
                    <div class="card-header">
                        <h3>Forgot your password?</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="input-group form-group">
                                <label for="email"> Insert your registered email address for us to send you a message to reset your password</label>
                                <br>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-mail-bulk"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Your email" name="email">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Send message" class="btn float-right login_btn">
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php footer_gen();?>
	    <!-- ./Footer -->
    </body>
</html>