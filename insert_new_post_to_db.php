<?php 

session_start();


//$post_datetime = $_POST["evDate"] + $_POST["evTime"];


$post_date = date('d-m-Y', strtotime($_POST['evDate']));
$post_time = ' '.$_POST['time_hour'].':'.$_POST['time_min'].":00";
$post_datetime = date('Y-m-d H:i:s', strtotime($post_date.$post_time));
$insert_post_sql_query = 
"INSERT INTO `posts`(`poster_email`, `title`, `details`, `city`, `date_of_event`, `date_posted`,`langtitude`,`longtitude`) 
VALUES (\"".htmlentities($_SESSION["email"], ENT_QUOTES)."\",\"".htmlentities($_POST["title"], ENT_QUOTES)."\",\"".$_POST["content"]."\", \"".htmlentities($_POST["cityNames"], ENT_QUOTES)."\", \"".htmlentities($post_datetime, ENT_QUOTES)."\", \"".htmlentities($latitude)."\", \"".htmlentities($longtitude)."\", NOW())
"
;

$con = include "config.php";
mysqli_query($con, $insert_post_sql_query);

unset($_POST["title"]); unset($_POST["city"]); unset($_POST["evDate"]); unset($_POST["time_hour"]); unset($_POST["time_min"]); unset($_POST["content"]);
//unset($_POST["evDate"]); unset($_POST["evTime"]);
//unset($_POST["evDateTime"]);

echo("
    <script> alert(\"You have successfully created your post!\") </script>
    ");

header("Location: ActionCall_create_post.php");

?>