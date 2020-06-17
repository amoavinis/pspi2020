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
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include("phpMailer/vendor/autoload.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
  
    $email_address = mysqli_real_escape_string($con,htmlentities($_POST['new_account_email'], ENT_QUOTES));
    $username = mysqli_real_escape_string($con,htmlentities($_POST['username'], ENT_QUOTES));
    $password = mysqli_real_escape_string($con,htmlentities($_POST['password'], ENT_QUOTES));
    $password_confirmation = mysqli_real_escape_string($con,htmlentities($_POST['password_confirmation'], ENT_QUOTES));  
    
    $flag = 1;

    if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Άκυρη διεύθυνση email.";
        alert($emailErr);
        $flag = 0;
    }
    if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $usernameErr = "Το username δεν μπορεί να είναι στη μορφή email.";
        alert($usernameErr);
        $flag = 0;
    }

    if ($flag==1)
    {
        $sql1 = "SELECT * FROM users WHERE email = \"".$email_address."\"";
        $sql2 = "SELECT * FROM users WHERE username = \"".$username."\"";
        
        $result1 = mysqli_query($con, $sql1);
        $result2 = mysqli_query($con, $sql2);
        
        $count1 = mysqli_num_rows($result1);
        $count2 = mysqli_num_rows($result2);
        
        if ($count1>=1)
        {
            alert("Το email που προσπαθείς να δηλώσεις έχει ήδη δηλωθεί από άλλο χρήστη, δοκίμασε με νέο email.");
        }
        else if ($count2>=1)
        {
            alert("Το username είναι κατειλημμένο, δοκίμασε κάποιο άλλο.");
        }
        else if (strcmp($password, $password_confirmation)==0)
        {
            //register user
            $hashed_password = hash("sha256", $password);

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
            
            if (isset($email_address))
            {
                $email = $email_address;
                $sql = "SELECT * FROM users WHERE email=\"".$email."\";";
                $result = mysqli_query($con, $sql);
                $n = mysqli_num_rows($result);
                if ($n==0)
                {
                    $mail->addAddress($email, "actioncall user");

                    $mail->isHTML(true);

                    $mail->Subject = "Confirm ActionCall Membership";
                    $key = hash('sha256', microtime().$email);
                    $sql1 = "INSERT INTO signup_confirms (user_email, signup_key) VALUES (\"".$email."\", \"".$key."\");";
                    $result1 = mysqli_query($con, $sql1);
                    $sql = "INSERT INTO users_waiting (email, username, password, authority)
                    VALUES (\"".$email_address."\", \"".$username."\", \"".$hashed_password."\",'simple')";
                    $result = mysqli_query($con, $sql);
                    
                    $mail->Body = "ActionCall membership confirmation link: <a href=\"localhost/ActionCall/confirm_signup.php?key=".$key."\">Click here to confirm signup</a><br>
                                   or copy and paste this if the link is broken: localhost/ActionCall/confirm_signup.php?key=".$key;
                    //$mail->AltBody = "This is the plain text version of the email content";
                    
                    if(!$mail->send()) 
                    {
                        //echo "Mailer Error: " . $mail->ErrorInfo;
                    } 
                    else 
                    {
                        //echo "Message has been sent successfully";
                    }
                    alert("Επιτυχής εγγραφή! Θα σας έρθει μήνυμα επιβεβαίωσης στο email που δηλώσατε.");
                    header("Location: ActionCall_login.php");
                    die();
                }
            }
            //'administrator' authority can only be given by the database user manually.
        }
        else
        {
            alert("Τα συνθηματικά δεν ταιριάζουν μεταξύ τους");
        }
    }
}

?>

<html>
    <head>
        <script src="js/gen_elements.js"></script>
        <?php header_gen();?>
        <title>ActionCall Sign Up</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>

    <body>
        <!--Navigation bar start-->
        <?php navbar_gen();?>
        <!--Navigation bar end-->
        <div class="container content">
        <h2> Φόρμα εγγραφής </h2>
            <form class="needs-validation" action="" method="post">
                <div class="form-group">
                    <label for="new_account_email">E-mail Address</label>
                    <input type="email" placeholder="name@example.com" class="form-control" name="new_account_email">
                </div>
                <div class = "form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" minlength="5" maxlength="32">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" minlength="5">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" minlength="5">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary center-block">Sign Up</button>
                </div>
            </form>
        </div>
        
        <!-- Footer -->
        <?php footer_gen();?>
        <!-- ./Footer -->
    </body>
</html>