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
    exit;
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
  
    $email_address = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']); 
  
    $sql = "SELECT * FROM users WHERE email = \"".$email_address."\"";
    
    $result = mysqli_query($con, $sql);
    
    $count = mysqli_num_rows($result);
    
    if ($count==1)
    {
        $row = mysqli_fetch_assoc($result);
        if ($row["password"]==hash("sha256", $password))
        {
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["email"] = $email_address;
            $_SESSION["username"] = $row["username"];
            alert("Επιτυχής σύνδεση!");
            header("Location: index.php");
        }
        else
        {
            alert("Λάθος email/password...");
        }
    }
    else
    {
        alert("Λάθος email/password...");
    }
}

?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script src="js/gen_elements.js"></script>
        <?php header_gen();?>
        <title>ActionCall Login</title>  
    </head>

    <body>
        <?php navbar_gen();?>
        <div class="container content">
            <div class="d-flex justify-content-center">
                <div class="card">
                    <div class="card-header">
                        <h3>Sign In</h3>
                        <div class="d-flex justify-content-end social_icon">
                            <span><i class="fab fa-facebook-square"></i></span>
                            <span><i class="fab fa-google-plus-square"></i></span>
                            <span><i class="fab fa-twitter-square"></i></span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Όνομα χρήστη / email" name="email">
                                
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" placeholder="Κωδικός πρόσβασης" name="password">
                            </div>
                            <div class="row align-items-center remember">
                                <input type="checkbox">Remember Me
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Σύνδεση" class="btn float-right login_btn">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center links">
                            Don't have an account? &nbsp;<a href="#"> Sign Up</a>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="#">Forgot your password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php footer_gen();?>
	    <!-- ./Footer -->
    </body>
</html>