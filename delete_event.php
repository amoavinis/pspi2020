<?php

require('config.php');

session_start();

$delete_post_query =
"DELETE
FROM posts
WHERE id = \"".$_POST['postId']."\"
"
;


// Database connection
$con = include 'config.php';

// Delete specified post
mysqli_query($con, $delete_post_query);

header("Location: ActionCall_forum.php");



?>