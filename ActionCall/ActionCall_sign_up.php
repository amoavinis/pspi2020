<!doctype html>
<?php
require("config.php");
require("gen_elements.php");
session_start();
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
  
    $email_address = mysqli_real_escape_string($con,$_POST['new_account_email']);
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $password_confirmation = mysqli_real_escape_string($con,$_POST['password_confirmation']);  
  
    $sql = "SELECT * FROM users WHERE email = \"".$email_address."\"";
    
    $result = mysqli_query($con, $sql);
    
    $count = mysqli_num_rows($result);
    
    if ($count>=1)
    {
        alert("Ο χρήστης υπάρχει ήδη, δοκιμάστε με νέο email.");
    }
    else if (strcmp($password, $password_confirmation)==0)
    {
        //register user
        $hashed_password = hash("sha256", $password);
        $sql = "INSERT INTO users (email, username, password) VALUES (\"".$email_address."\", \"".$username."\", \"".$hashed_password."\")";
        $result = mysqli_query($con, $sql);
        alert("Επιτυχής εγγραφή!");
    }
    else
    {
        alert("Τα password δεν ταιριάζουν μεταξύ τους");
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
            <form class="needs-validation" action="" method="post">
                <div class="form-group">
                    <label for="new_account_email">E-mail Address</label>
                    <input type="email" placeholder="name@example.com" class="form-control" name="new_account_email">
                </div>
                <div class = "form-group">
                    <label for="account_username">Username</label>
                    <input type="text" class="form-control" name="username">
                </div>
                <div class="form-group">
                    <label for="account_password">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation">
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