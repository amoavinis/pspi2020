<!doctype html>
<?php
require("config.php");
require("gen_elements.php");
session_start();
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
                        <form class="search-form">
                            <div class="input-group">
                                <input id="input-1" class="form-control" type="text" aria-describedby="search-btn">
                                <label for="input-1" class="sr-only">Search</label>
                                <div class="input-group-append">
                                    <button id="search-btn" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form> 
                        <!-- Forum-->
                        <div id="forum" class="table-container">

                            <?php
                            $all_posts_query =
                            "SELECT date_of_event, city, title, username
                            FROM posts JOIN users ON posts.poster_email = users.email
                            ORDER BY date_of_event DESC";

                            
                            $all_posts_result = mysqli_query($con, $all_posts_query);

                            if(mysqli_num_rows($all_posts_result) > 0){ ?>
                            <table class="topics-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Για ημερομηνία</th>
                                        <th scope="col">Πόλη</th>
                                        <th scope="col">Θέμα</th>
                                        <th scope="col">Από</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    while($post = $all_posts_result -> fetch_assoc()){ ?>
                                        <tr>
                                            <td><?php echo($post["date_of_event"]); ?></td>
                                            <td><?php echo($post["city"]); ?></td>
                                            <td><?php echo($post["title"]); ?></td>
                                            <td><?php echo($post["username"]); ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php } 
                            else{
                                echo("Currently, there are no posts.");
                            } ?>
                        </div>
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