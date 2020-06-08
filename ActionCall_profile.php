<!doctype html>

<link rel="stylesheet" href="css/profile.css">
<?php
require("config.php");
require("gen_elements.php");
session_start();
if (isset($_COOKIE["ActionCallUser"]) && isset($_COOKIE["ActionCallUserEmail"]) && isset($_COOKIE["ActionCallUserState"]))
{
    $_SESSION["loggedin"] = true;
    $_SESSION["email"] = $_COOKIE["ActionCallUserEmail"];
    $sql = "SELECT username FROM users WHERE ";
    $_SESSION["username"] = $_COOKIE["ActionCallUser"];
}
if (!isset($_SESSION["username"]))
{
    header("Location: index.php");
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script src="js/gen_elements.js"></script>
        <script src="js/profile.js" defer></script>
        <?php header_gen(); ?>
        <link rel="stylesheet" href="css/forum.css">
        <title>ActionCall User Profile</title> 
    </head>
    
    <body>
        <?php navbar_gen(); ?>
        <div class="container">
            <h1> <?php echo($_SESSION["username"]); ?>'s profile  </h1>
        </div>


        <div class="container">
            <h2>Account Information</h2>

            <form action="save_changes_profile.php" method="POST">
                <div class="form-group row">
                    <div class="col-sm-10">
                        <label for="username_text_field" class="col-sm-2 col-form-label">Username</label>
                        <input class="form-control" id="username_text_field" type="text" minlength="5" maxlength="32" 
                            name="username_profile" value="<?php echo($_SESSION["username"]); ?>" oninput="button_enable_disable()">
                        <small class="form-text text-muted"> Your username must be 5-32 characters long.</small>
                    </div>             
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <label for="password_field" class="col-sm-2 col-form-label">Change Password</label>
                        <input class="form-control" id="password_field" type="password" minlength="5" 
                            name="new_password" value="" oninput="button_enable_disable()">
                        <small class="form-text text-muted"> Your password must be at least five (5) characters long. The longer, the better.</small>
                        <input type="checkbox" onclick="toggle_password_visibility()"> Show password
                    </div>             
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <label for="password_field" class="col-sm-2 col-form-label">Repeat New Password</label>
                        <input class="form-control" id="repeat_password_field" type="password" minlength="5" 
                            name="new_password_repetition" value="" oninput="button_enable_disable()">
                        <small class="form-text text-muted"> Passwords must agree.</small>
                        <input type="checkbox" onclick="toggle_repeat_password_visibility()"> Show password
                    </div>             
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <label for="email_text_field" class="col-sm-2 col-form-label">E-mail</label>
                        <input class="form-control" value="<?php echo($_SESSION["email"]); ?>" disabled>
                    </div>
                 </div>
                 <div class="col-sm-10">
                    <button id="save_changes_button" type="submit" class="btn btn-primary">Save Changes</button>
                 </div>

            </form>
        </div>



        <!--Red trash button for deleting an account.-->
        <!--//TODO Show button depending on whether users is an administrator or the shown page's owner.
        Should be completed in future expansions, in case we allow other users to view other users' profiles. -->
        <!-- <?php /*
        if($_SESSION["email"] === email_shown_in_page){ ?>
            <div class="container">
            <form action="delete_account.php">
                <i class="fas fa-trash-alt delete-account-trash-button"></i>       
            </div>
        <?php }
        else{
            $user_authority_query = 
            "
            SELECT authority
            FROM users
            WHERE email = \"".$_SESSION["email"]."\"
            "
            ;
    
            $user_authority = mysqli_query($con, $user_authority_query);

            if($user_authority === "administrator"){ ?>
                <div class="container">
                <form action="delete_account.php">
                    <i class="fas fa-trash-alt delete-account-trash-button"></i>       
                </div>
            <?php }
        } */ ?> -->

        <div class="container">
            <form action="delete_account_user.php">
                <button type="submit" style="background: transparent; border: 0" class="delete-account-trash-button">
                <i type="submit" class="fas fa-trash-alt"></i>  
                </button>
            </form>    
        </div>







        <div class="container content">
            <?php
            $find_posts_user_is_interested_in_sql_query = 
            "SELECT DISTINCT post_id , title, city, date_of_event, users2.username
            FROM users AS users1 JOIN interested ON user_email = \"".$_SESSION["email"]."\" 
            JOIN posts ON post_id = id 
            JOIN users AS users2 ON users2.email = posts.poster_email
            ORDER BY date_of_event ASC";

            $posts_user_is_interested_in = mysqli_query($con, $find_posts_user_is_interested_in_sql_query);
            
            if (mysqli_num_rows($posts_user_is_interested_in) > 0){ ?>
                <table class="table" style="margin-top: 80px;">
                    <thead>
                        <tr>
                            <th scope="col">Post ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">City/Area</th>
                            <th scope="col">Date</th>
                            <th scope="col">Poster</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php // Output data of each row
                        while($posts_interested_row = $posts_user_is_interested_in -> fetch_assoc()){ ?>
                            <tr>
                                <th scope="row"><a href="ActionCall_event.php?postId=<?php echo($posts_interested_row["post_id"]); ?>"> <?php echo($posts_interested_row["post_id"]) ; ?> </a> </th>
                                <td><a href="ActionCall_event.php?postId=<?php echo($posts_interested_row["post_id"]); ?>"> <?php echo($posts_interested_row["title"]) ; ?> </a></td>
                                <td><?php echo($posts_interested_row["city"]) ; ?></td>
                                <td><?php echo($posts_interested_row["date_of_event"]) ; ?></td>
                                <td><?php echo($posts_interested_row["username"]) ; ?></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>

             <?php }
            else{
                echo("You have not shown interest in any event.");
            } ?>

        </div>



        <?php footer_gen() ; ?>
    </body>

</html>