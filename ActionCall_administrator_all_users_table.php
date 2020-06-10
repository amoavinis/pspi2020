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

function setAdmin($value) {
    $order = $value;
}

/*basic querry bodies*/
$querryB =  "SELECT email, username, authority
             FROM users";
$querryW1 = "";
$querryW2 = "";
$querryW = "";
$querryO = " ORDER BY username";
$searchO = "Όλα τα αποτελέσματα";
$searchQ = "";

/*getting the search querries and search text based on the textfield and radiogroup selection*/
if(isset($_GET['search'])&&$_GET['search']!=""){
    $searchQ = htmlentities($_GET['search'], ENT_QUOTES);
    $querryW1 = " (username LIKE '%$searchQ%' OR email LIKE '%$searchQ%')";
    $searchO = "Αποτελέσματα για: " . $searchQ;
    $querryW = " WHERE";
}

$authority ="all";
if(isset($_GET['authority'])){
    $authority = $_GET['authority'];
}
if($authority==="all"){
    //DO NOTHING. IMPORTANT: DO NOT ADD CODE IN THIS LINE UNLESS UNLESS A POTENTIAL EXTENTION NEEDS THIS LINE!!!!!!!
}else if($authority==="admin"){
    $querryW2 = " authority = \"administrator\"";
    $querryW = " WHERE";
}else if($authority==="noAdmin"){
    $querryW2 = " authority = \"simple\"";
    $querryW = " WHERE";
}

if(($querryW1 != "") && ($querryW2 != "")){
    $querryW = $querryW . $querryW1 . " AND" . $querryW2;
}else{
    $querryW = $querryW . $querryW1 . $querryW2;
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
$total_pages_sql = "SELECT COUNT(*) FROM users" . $querryW;
$result = mysqli_query($con, $total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
$all_users_query = $querryB . $querryW . $querryO . " LIMIT $offset, $no_of_records_per_page";
$all_users_result = mysqli_query($con, $all_users_query);


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
                        <form action = "ActionCall_administrator_all_users_table.php" method = "get" class="search-form">
                            <div class="input-group">
                                <input class="form-control" type="text" name="search" aria-describedby="search-btn" placeholder="Search users...">
                                <input class="btn btn-primary" type = "submit" value = "Search">
                            </div>
                            <div class = "radiogroup" style="text-align: center;">
                                <label>Όλοι οι χρήστες</label>
                                <input type="radio" name="authority" value="all" onclick="setAdmin(this.value)" <?php if($authority === "all"){echo(" checked");}?>/>
                                <label>Διαχειριστές</label>
                                <input type="radio" name="authority" value="admin" onclick="setAdmin(this.value)"<?php if($authority === "admin"){echo(" checked");}?>>
                                <label>Μη Διαχειριστές</label>
                                <input type="radio" name="authority" value="noAdmin" onclick="setAdmin(this.value)"<?php if($authority === "noAdmin"){echo(" checked");}?>/>
                            </div>
                        </form>
                        <!-- List of users-->
                        <?php  
                            if(mysqli_num_rows($all_users_result) > 0){ ?>
                                <div id="forum" class="table-container">
                                    <table class="topics-table">
                                        <thead>
                                            <tr>
                                                <th scope="col" width = 30%>Όνομα</th>
                                                <th scope="col" width = 45%>Email/Id</th>
                                                <th scope="col" width = 25%>Αρμοδιότητες</th>
                                            </tr>
                                            <?php
                                            while($user = mysqli_fetch_array($all_users_result)){ ?>
                                                <tr>
                                                    <td><a class="name" href = 'ActionCall_administrator_user_page.php?userEmail=<?php echo($user["email"]);?>'><?php echo($user["username"]); ?></td>
                                                    <td><a class="email" href = 'ActionCall_administrator_user_page.php?userEmail=<?php echo($user["email"]);?>'><?php echo($user["email"]);?></a></td>
                                                    <td class="authority"><?php echo($user["authority"]); ?></td>
                                                </tr>
                                            <?php } ?>
                                        </thead>
                                    </table>
                                </div>
                                <ul class="pagination">
                                    <li><button class="btn btn-primary" id = "navigation" onclick="location.href ='ActionCall_administrator_all_users_table.php?search=<?php echo($searchQ); ?>&authority=<?php echo($authority);?>&pageno=<?php echo(1); ?>'">First</button></li>
                                    <li><button class="btn btn-primary" id = "navigation" onclick="location.href ='ActionCall_administrator_all_users_table.php?search=<?php echo($searchQ); ?>&authority=<?php echo($authority);?>&pageno=<?php echo($pageno-1); ?>'" <?php if($pageno == 1){ echo("disabled"); } ?>>Prev</button></li>
                                    <li><button class="btn btn-primary" id = "navigation" onclick="location.href ='ActionCall_administrator_all_users_table.php?search=<?php echo($searchQ); ?>&authority=<?php echo($authority);?>&pageno=<?php echo($pageno+1); ?>'" <?php if($pageno >= $total_pages){ echo("disabled"); } ?>>Next</button></li>
                                    <li><button class="btn btn-primary" id = "navigation" onclick="location.href ='ActionCall_administrator_all_users_table.php?search=<?php echo($searchQ); ?>&authority=<?php echo($authority);?>&pageno=<?php echo($total_pages); ?>'">Last</button></li>
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