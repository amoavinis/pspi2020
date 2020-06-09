<?php
require("config.php");
if ($_SERVER["REQUEST_METHOD"]=="GET")
{
    if (isset($_GET['key']))
    {
        $key = htmlentities($_GET['key'], ENT_QUOTES);
        $sql = "SELECT * FROM signup_confirms WHERE signup_key=\"".$key."\";";
        $result = mysqli_query($con, $sql);
        $n = mysqli_num_rows($result);
        if ($n!=1)
        {
            header("Location: error.php");
            die();
        }
        $email = mysqli_fetch_row($result)[0];

        $sql = "SELECT * FROM users_waiting WHERE email=\"".$email."\";";
        $result = mysqli_query($con, $sql);
        $n = mysqli_num_rows($result);
        if ($n!=1)
        {
            header("Location: error.php");
            die();
        }
        $row = mysqli_fetch_row($result);

        $sql = "INSERT INTO users (email, username, password, authority)
                VALUES (\"".$row[0]."\", \"".$row[1]."\", \"".$row[2]."\",'simple')";
        $result = mysqli_query($con, $sql);

        $sql = "DELETE FROM signup_confirms WHERE signup_key=\"".$key."\";";
        $result = mysqli_query($con, $sql);

        $sql = "DELETE FROM users_waiting WHERE email=\"".$email."\";";
        $result = mysqli_query($con, $sql);

        header("Location: index.php");
        die();
    }
    else
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


?>