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
  
    $login_id = mysqli_real_escape_string($con,$_POST['login_id']);
    $password = mysqli_real_escape_string($con,$_POST['password']); 
  
    $sql1 = "SELECT * FROM users WHERE email = \"".$login_id."\"";
    $sql2 = "SELECT * FROM users WHERE username = \"".$login_id."\"";

    $result1 = mysqli_query($con, $sql1);
    $result2 = mysqli_query($con, $sql2);
    
    $count1 = mysqli_num_rows($result1);
    $count2 = mysqli_num_rows($result2);
    
    if ($count1==1)
    {
        $row = mysqli_fetch_assoc($result1);
        if ($row["password"]==hash("sha256", $password))
        {
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["email"] = $row["email"];
            $_SESSION["username"] = $row["username"];
            $_SESSION['authority'] = $row['authority'];
            if (isset($_POST['actioncall_remember_me']))
            {
                setcookie("ActionCallUser", $row["username"], strtotime( '+ 1000 days' ));
                setcookie("ActionCallUserEmail", $row["email"], strtotime( '+ 1000 days' ));
                setcookie("ActionCallUserState", true, strtotime( '+ 1000 days' ));
            }
            alert("Επιτυχής σύνδεση!");
            header("Location: index.php");
        }
        else
        {
            alert("Λάθος email/username/password...");
        }
    }
    else if ($count2==1)
    {
        $row = mysqli_fetch_assoc($result2);
        if ($row["password"]==hash("sha256", $password))
        {
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["email"] = $row["email"];
            $_SESSION["username"] = $row["username"];
            $_SESSION['authority'] = $row['authority'];
            alert("Επιτυχής σύνδεση!");
            header("Location: index.php");
        }
        else
        {
            alert("Λάθος email/username/password...");
        }
    }
    else
    {
        alert("Λάθος email/username/password...");
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
                                <input type="text" class="form-control" placeholder="Όνομα χρήστη / email" name="login_id">
                                
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" placeholder="Κωδικός πρόσβασης" name="password">
                            </div>
                            <div class="row align-items-center remember">
                                <input type="checkbox" name="actioncall_remember_me">Remember Me
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Σύνδεση" class="btn float-right login_btn">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center links">
                            Don't have an account? &nbsp;<a href="ActionCall_sign_up.php"> Sign Up</a>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="ActionCall_forgot_password.php">Forgot your password?</a>
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