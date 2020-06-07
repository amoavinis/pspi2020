<!DOCTYPE html>

<link rel="stylesheet" href="css/profile.css">

<?php

require("config.php");
require("gen_elements.php");
session_start();

$account_information = [];

if(isset($_GET['userEmail'])){
    $account_information_query = 
    "SELECT *
    FROM users
    WHERE email = \"".$_GET["userEmail"]."\"
    "
    ;

    $con = include 'config.php';

    $account_information = mysqli_fetch_assoc(mysqli_query($con, $account_information_query));

    unset($account_information_query);
}


?>

<html>

    <head>
        <?php header_gen(); ?>
        <title> <?php echo("User" . $account_information['email']); ?></title>
    </head>


    <body>
        <?php navbar_gen(); ?>
        <div class="container">
            <h1>
                "<?php echo($account_information['email']) ; ?>" account's information 
            </h1>
        </div>

        <div class="container">
            <label for="user_email">E-mail/ID</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="user_email" aria-describedby="basic-addon3" value="<?php echo($account_information['email']); ?>" disabled>
            </div>
        </div>

        <div class="container">
            <label for="user_username">Username</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="user_username" aria-describedby="basic-addon3" value="<?php echo($account_information['username']); ?>" disabled>
            </div>
        </div>

        <div class="container" id="user_authority">
            <label for="user_authority">User Authority</label>
            <form action="change_user_authority.php" method="POST"> 
                <select class="custom-select" name="chosen_authority">
                    <option value="simple" <?php if($account_information['authority'] == 'simple'){echo("selected");} ?>>simple</option>
                    <option value="administrator" <?php if($account_information['authority'] == 'administrator'){echo("selected");}?>>administrator</option>
                </select>
                <input type="hidden" name="userEmail" value="<?php echo($_GET['userEmail']) ?>">
                <button type="submit" class="btn btn-primary">Change user's authority</button>
            </form>
        </div>

        <div class="container">
            <form action="delete_account.php" method="POST">
                <button type="submit" style="background: transparent; border: 0" class="delete-account-trash-button">
                <i type="submit" class="fas fa-trash-alt"></i>  
                </button>
                <input type="hidden" name="userEmail" value="<?php echo($account_information['email']); ?>">
            </form>    
        </div>

        <div class="container content">
            <?php
            $find_posts_user_is_interested_in_sql_query = 
            "SELECT DISTINCT post_id , title, city, date_of_event, users2.username
            FROM users AS users1 JOIN interested ON user_email = \"".$account_information['email']."\" 
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
                                <th scope="row"><a href="ActionCall_event.php?postId=<?php echo($posts_interested_row["post_id"]); ?>"><?php echo($posts_interested_row["post_id"]) ; ?> </a></th>
                                <td><a href="ActionCall_event.php?postId=<?php echo($posts_interested_row["post_id"]); ?>"><?php echo($posts_interested_row["title"]) ; ?> </a></td>
                                <td><?php echo($posts_interested_row["city"]) ; ?></td>
                                <td><?php echo($posts_interested_row["date_of_event"]) ; ?></td>
                                <td><?php echo($posts_interested_row["username"]) ; ?></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>

             <?php }
             else{ ?>
                <div class="container content" style="margin-top: 80px">
                    User "<?php echo($account_information['email']) ; ?>" has not shown interest in any event.
                </div>
            <?php } ?>

        </div>
        <?php footer_gen() ; ?>

    </body>

</html>