<?php

require('config.php');

session_start();

$delete_interested_query = "DELETE FROM interested WHERE post_id=\"".$_POST['postId']."\"";

$delete_post_query =
"DELETE
FROM posts
WHERE id = \"".$_POST['postId']."\"
";


// Database connection
$con = include 'config.php';

//Delete interested
mysqli_query($con, $delete_interested_query);

// Delete specified post
mysqli_query($con, $delete_post_query);

header("Location: ActionCall_forum.php");



?>