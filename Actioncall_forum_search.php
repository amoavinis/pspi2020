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



$querryB =  "SELECT id, email, date_of_event, city, title, username
             FROM posts JOIN users ON posts.poster_email = users.email";
$querryW = "";
$searchO = "Όλα τα αποτελέσματα";
$querryO = "";

if(isset($_GET['order'])){
    if($_GET['order']==='searchOne'){
        $querryO = " ORDER BY date_of_event DESC";
    }else if($_GET['order']==='searchTwo'){
        $querryO = " ORDER BY date_posted DESC";
    }
}
echo($querryO);
if(isset($_GET['search'])&&$_GET['search']!=""){
    $searchQ = $_GET['search'];
    $querryW = " WHERE city LIKE '%$searchQ%' OR title LIKE '%$searchQ%'";
    $searchO = "Αποτελέσματα για: " . $searchQ;
}else if(isset($_GET['username'])){
    $searchU = $_GET['username'];
    $querryW = " WHERE city LIKE '%$searchQ%' OR title LIKE '%$searchU%'";
    $searchO = "Εύρεση αναρτήσεων χρήστη: " . $searchU;
}

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}

$no_of_records_per_page = 10;
$offset = ($pageno-1) * $no_of_records_per_page; 
$total_pages_sql = "SELECT COUNT(*) FROM posts" . $querryW;
$result = mysqli_query($con,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
$all_posts_query = $querryB . $querryW . $querryO . " LIMIT $offset, $no_of_records_per_page";
$all_posts_result = mysqli_query($con, $all_posts_query);


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
            <h1 id="result"><?php print($searchO);?></h1>
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
                                            while($post = mysqli_fetch_array($all_posts_result)){ ?>
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
                                    echo("No results");
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