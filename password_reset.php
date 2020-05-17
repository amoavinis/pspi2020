<!doctype html>
<?php
require("config.php");
require("gen_elements.php");
session_start();
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    if(isset($_GET['key'])) 
    {
        // username and password sent from form 
        $key = mysqli_real_escape_string($con, $_GET['key']);

        $sql = "SELECT * FROM password_resets WHERE reset_key=\"".$key."\";";
        $result = mysqli_query($con, $sql);
        $n = mysqli_num_rows($result);
        if ($n!=1)
        {
            header("Location: error.php");
            die();
        }
    }
    else
    {
        header("Location: error.php");
        die();
    }
}
if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $key = mysqli_real_escape_string($con, $_GET['key']);

        $sql = "SELECT * FROM password_resets WHERE reset_key=\"".$key."\";";
        $result = mysqli_query($con, $sql);
        $n = mysqli_num_rows($result);
        if ($n!=1)
        {
            header("Location: error.php");
            die();
        }
        else
        {
            $email = mysqli_fetch_row($result)[0];
        }
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $password_confirmation = mysqli_real_escape_string($con, $_POST['password_confirmation']);
        if (strcmp($password, $password_confirmation)==0)
        {
            //register user
            $hashed_password = hash("sha256", $password);
            //'administrator' authority can only be given by the database user manually.
            $sql = "UPDATE users SET password = \"".$hashed_password."\" WHERE email=\"".$email."\"";
            $result = mysqli_query($con, $sql);
            $sql1 = "DELETE FROM password_resets WHERE reset_key=\"".$key."\";";
            $result1 = mysqli_query($con, $sql1);
            alert("Επιτυχής επαναφορά!");
            header("Location: ActionCall_login.php");
            die();
        }
        else
        {
            alert("Τα συνθηματικά δεν ταιριάζουν μεταξύ τους");
        }
    }
?>

<html>
    <head>
        <script src="js/gen_elements.js"></script>
        <?php header_gen();?>
        <title>ActionCall Password Reset</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>

    <body>
        <!--Navigation bar start-->
        <?php navbar_gen();?>
        <!--Navigation bar end-->
        <div class="container content">
        <h2> Επαναφορά κωδικού </h2>
            <form class="needs-validation" action="" method="post">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary center-block">Reset</button>
                </div>
            </form>
        </div>
        
        <!-- Footer -->
        <?php footer_gen();?>
        <!-- ./Footer -->
    </body>
</html>