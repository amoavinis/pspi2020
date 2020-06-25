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

function setOrder($value) {
    $order = $value;
}

/*basic querry bodies*/
$querryB =  "SELECT id, email, date_of_event, city, title, username
             FROM posts JOIN users ON posts.poster_email = users.email";
$querryW = "";
$searchO = "Όλα τα αποτελέσματα";
$querryO = "";
$searchQ = "";

/*getting the order type*/
$order = "orderOne";
if(isset($_GET['order'])){
    $order = htmlentities($_GET['order'], ENT_QUOTES);
}

if($order==='orderOne'){
    $querryO = " ORDER BY date_of_event DESC";
}else if($order==='orderTwo'){
    $querryO = " ORDER BY date_posted DESC";
}

/*getting the search querries and search text based on the textfield*/
if(isset($_GET['search'])&&$_GET['search']!=""){
    $searchQ = htmlentities($_GET['search'], ENT_QUOTES);
    $querryW = " WHERE city LIKE '%$searchQ%' OR title LIKE '%$searchQ%'";
    $searchO = "Αποτελέσματα για: " . $searchQ;
}
/*getting the search querries and search text based on the username*/
else if(isset($_GET['username'])){
    $searchU = htmlentities($_GET['username'], ENT_QUOTES);
    $querryW = " WHERE username = '$searchU'";
    $searchO = "Εύρεση αναρτήσεων χρήστη: " . $searchU;
}

/*getting the page number*/
if (isset($_GET['pageno'])) {
    $pageno = htmlentities($_GET['pageno'], ENT_QUOTES);
} else {
    $pageno = 1;
}

/*making the querry per 10 posts*/
$no_of_records_per_page = 10;
$offset = ($pageno-1) * $no_of_records_per_page; 
$total_pages_sql = "SELECT COUNT(*) FROM posts JOIN users ON posts.poster_email = users.email" . $querryW;
$result = mysqli_query($con, $total_pages_sql);
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
                        <form action = "ActionCall_forum.php" method = "get" class="search-form">
                            <div class="input-group">
                                <input class="form-control" type="text" name="search" aria-describedby="search-btn" placeholder="Search posts...">
                                <input class="btn btn-primary" type = "submit" value = "Search">
                            </div>
                            <div class = "radiogroup" style="text-align: center;">
                                <label>Μελλοντικά Events</label>
                                <input type="radio" name="order" value="orderOne" onclick="setOrder(this.value)" <?php if($order === "orderOne"){echo(" checked");}?>/>
                                <label>Πρόσφατες Αναρτήσεις</label>
                                <input type="radio" name="order" value="orderTwo" onclick="setOrder(this.value)"<?php if($order === "orderTwo"){echo(" checked");}?>/>
                            </div>
                        </form>
                        <button class="btn btn-primary" style="float: right;" id = "make_post" onclick="location.href='ActionCall_create_post.php'" 
                        <?php
                        // Button is not clickable when the user is not logged in and an appropriate message is shown on the button.
                        // In case that a user is logged in, the button is clickable and the normal "create post" is written on the button.
                        $user_is_logged_in = true;
                        if((!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"]!=true)){
                            $user_is_logged_in = false;
                            }
                        if(!$user_is_logged_in){
                            echo("disabled");
                        }
                        ?>
                        >
                        <?php
                        if(!$user_is_logged_in){
                            echo("Απαιτείται να είστε συνδεδεμένος/η σε λογαριασμό για να δημιουργήσετε μία αγγελία");
                        }
                        else{
                            echo("Δημιουργία αγγελίας");
                        }
                        ?>
                        </button>
                        <!-- Forum-->
                        <?php  
                            if(mysqli_num_rows($all_posts_result) > 0){ ?>
                                <div id="forum" class="table-container">
                                    <table class="topics-table">
                                        <thead>
                                            <tr>
                                                <th scope="col" width = 20%>Για ημερομηνία</th>
                                                <th scope="col">Πόλη</th>
                                                <th scope="col">Θέμα</th>
                                                <th scope="col" width = 20%>Από</th>
                                            </tr>
                                            <?php
                                            while($post = mysqli_fetch_array($all_posts_result)){ ?>
                                                <tr>
                                                        <td><?php 
                                                        $datetime = date("F j, Y, H:i", strtotime($post['date_of_event']));
                                                        echo($datetime); ?></td>
                                                        <td><a class="city" href = 'ActionCall_forum.php?search=<?php echo($post["city"]);?>&order=<?php echo($order);?>&pageno=1'><?php echo($post["city"]); ?></td>
                                                        <td><a class="post" href = 'ActionCall_event.php?postId=<?php echo($post["id"]);?>'><?php echo($post["title"]);?></a></td>
                                                        <td><a class="user" href = 'ActionCall_forum.php?username=<?php echo($post["username"]); ?>&order=<?php echo($order);?>&pageno=1'><?php echo($post["username"]); ?></a></td>
                                                </tr>
                                            <?php } ?>
                                        </thead>
                                    </table>
                                </div>
                                <ul class="pagination">
                                    <li><button class="btn btn-primary" id = "navigation" onclick="location.href ='ActionCall_forum.php<?php if(isset($_GET['username'])){echo('?username=' . $searchU);} else {echo('?search=' . $searchQ);} ?>&order=<?php echo($order);?>&pageno=<?php echo(1); ?>'">First</button></li>
                                    <li><button class="btn btn-primary" id = "navigation" onclick="location.href ='ActionCall_forum.php<?php if(isset($_GET['username'])){echo('?username=' . $searchU);} else {echo('?search=' . $searchQ);} ?>&order=<?php echo($order);?>&pageno=<?php echo($pageno-1); ?>'" <?php if($pageno == 1){ echo("disabled"); } ?>>Prev</button></li>
                                    <li><button class="btn btn-primary" id = "navigation" onclick="location.href ='ActionCall_forum.php<?php if(isset($_GET['username'])){echo('?username=' . $searchU);} else {echo('?search=' . $searchQ);} ?>&order=<?php echo($order);?>&pageno=<?php echo($pageno+1); ?>'" <?php if($pageno >= $total_pages){ echo("disabled"); } ?>>Next</button></li>
                                    <li><button class="btn btn-primary" id = "navigation" onclick="location.href ='ActionCall_forum.php<?php if(isset($_GET['username'])){echo('?username=' . $searchU);} else {echo('?search=' . $searchQ);} ?>&order=<?php echo($order);?>&pageno=<?php echo($total_pages); ?>'">Last</button></li>
                                </ul>
                                <?php } ?>
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
