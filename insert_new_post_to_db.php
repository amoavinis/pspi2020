<?php 

session_start();


//$post_datetime = $_POST["evDate"] + $_POST["evTime"];

$insert_post_sql_query = 
"INSERT INTO `posts`(`poster_email`, `title`, `details`, `city`, `date_of_event`, `date_posted`) 
VALUES (\"".htmlentities($_SESSION["email"], ENT_QUOTES)."\",\"".htmlentities($_POST["title"], ENT_QUOTES)."\",\"".htmlentities($_POST["content"], ENT_QUOTES)."\", \"".htmlentities($_POST["cityNames"], ENT_QUOTES)."\", \"".htmlentities($_POST["evDateTime"], ENT_QUOTES)."\", NOW())
"
;

$con = include "config.php";
mysqli_query($con, $insert_post_sql_query);

unset($_POST["title"]); unset($_POST["city"]); unset($_POST["evDate"]); unset($_POST["evTime"]); unset($_POST["content"]);
//unset($_POST["evDate"]); unset($_POST["evTime"]);
unset($_POST["evDateTime"]);

echo("
    <script> alert(\"You have successfully created your post!\") </script>
    ");

header("Location: ActionCall_create_post.php");

?>