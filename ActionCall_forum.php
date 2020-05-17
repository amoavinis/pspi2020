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
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script src="js/gen_elements.js"></script>
    <?php header_gen(); ?>
    <link rel="stylesheet" href="css/forum.css">
    <title>ActionCall Forum</title> 
  </head>

    <body>
        <?php navbar_gen();?>
        <div class="container content">
            <!--Search Bar info-->
            <h1 id="result">Όλα τα αποτελέσματα</h1>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action = "Actioncall_forum_search.php" method = "get" class="search-form">
                            <div class="input-group">
                                <input class="form-control" type="text" name="search" aria-describedby="search-btn" placeholder="Search posts...">
                                <input type = "submit" value = "Search">
                                
                            </div>
                        </form> 
                        <!-- Forum-->
                        <?php
                            $all_posts_query =
                            "SELECT id, email, date_of_event, city, title, username
                            FROM posts JOIN users ON posts.poster_email = users.email
                            ORDER BY date_of_event DESC";

                            
                            $all_posts_result = mysqli_query($con, $all_posts_query);

                            if(mysqli_num_rows($all_posts_result) > 0){ ?>
                            <div id="forum" class="table-container">
                                <table class="topics-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Για ημερομηνία</th>
                                            <th scope="col">Πόλη</th>
                                            <th scope="col">Θέμα</th>
                                            <th scope="col">Από</th>
                                        </tr>
                                        <?php
                                        while($post = $all_posts_result -> fetch_assoc()){ ?>
                                            <tr>
                                                <td><?php echo($post["date_of_event"]); ?></td>
                                                <td><a class="city" href = 'ActionCall_forum_search.php?search=<?php echo($post["city"]);?>'><?php echo($post["city"]); ?></td>
                                                <td><a class="post" href = 'ActionCall_event.php?postId=<?php echo($post["id"]);?>'><?php echo($post["title"]);?></a></td>
                                                <td><a class="user" href = 'ActionCall_forum_search.php?username=<?php echo($post["username"]); ?>'><?php echo($post["username"]); ?></a></td>
                                            </tr>
                                        <?php } ?>
                                    </thead>
                                </table>
                            </div>
                            <?php } 
                            else{
                                echo("No results detected");
                            } ?>
                        <!--./Forum-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php footer_gen();?>
        <!-- ./Footer -->
    </body>
</html>