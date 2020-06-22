<?php

function header_gen() { ?>
    <!-- Required meta tags -->
    <meta charset="utf-8" http-equiv="Content-Type" name="viewport" content="text/html, width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="fontawesome/fontawesome.all.css">
    <link rel="stylesheet" href="css/footer.css">

    <!--Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
	    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!--Favicon setup-->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

<?php }

function navbar_gen(){ ?>
    <nav class="navbar bg-light navbar-default navbar-expand-lg" >
    <a class="navbar-brand" href="index.php"> <img src="actioncallfinaldraft2.png" alt="ActionCall logo image"
    style="width: 120px; height: auto;" > </a>
    <ul class="navbar-nav mr-auto">
        <li class="active nav-item"> <a class="nav-link" href="index.php"> Home</a> </li>
        <li class="active nav-item"> <a class="nav-link" href="ActionCall_about_us.php"> About Us </a></li>
        <li class="active nav-item"> <a class="nav-link" href="ActionCall_forum.php"> Forum</a> </li>
        <li class="active nav-item"> <a class="nav-link" href="ActionCall_contact.php"> Contact</a> </li>

        <?php
        if (isset($_SESSION['email'])){
            require("config.php");

            $con = include "config.php";

            $is_user_administrator_query = 
            "SELECT authority
            FROM users
            WHERE email = \"".$_SESSION["email"]."\"
            "
            ;
            $is_user_administrator = mysqli_fetch_assoc(mysqli_query($con, $is_user_administrator_query));

            if($is_user_administrator['authority'] == 'administrator'){ ?>
        <li class="active nav-item"> <a class="nav-link" href="ActionCall_administrator_all_users_table.php"> Administrator</a> </li>
            <?php }
        }
        ?>
    </ul>
    <?php
    if (isset($_SESSION["username"])) { ?>
        <ul class="nav navbar-nav navbar-right">
        <li><a class="nav-link" href="ActionCall_profile.php"> <i class="fas fa-users"></i> <?php echo($_SESSION["username"]); ?> </a> </li>
        <li><a class="nav-link" href="logout.php"> <i class="fas fa-sign-out-alt"></i> Log out </a></li>
        </ul>
        </nav>
    <?php }
    else{ ?>
        <ul class="nav navbar-nav navbar-right">
        <li><a class="nav-link" href="ActionCall_sign_up.php"> <i class="fas fa-users"></i> Sign-Up </a> </li>
        <li><a class="nav-link" href="ActionCall_login.php"> <i class="fas fa-sign-in-alt"></i> Login </a></li>
        </ul>
        </nav>
    <?php }
}

function footer_gen() {
    echo "<footer class=\"footer\" style=\"background-color: darkslategray; margin-top: 10px;\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5\">
                <ul class=\"list-unstyled list-inline social text-center\">
                    <li class=\"list-inline-item\"><a href=\"javascript:void();\"><i class=\"fab fa-facebook\"></i></a></li>
                    <li class=\"list-inline-item\"><a href=\"javascript:void();\"><i class=\"fab fa-twitter\"></i></a></li>
                    <li class=\"list-inline-item\"><a href=\"javascript:void();\"><i class=\"fab fa-instagram\"></i></a></li>
                    <li class=\"list-inline-item\"><a href=\"mailto:info.actioncall@gmail.com\" target=\"_blank\"><i class=\"fa fa-envelope\"></i></a></li>
                </ul>
            </div>
            
        </div>	
        <div class=\"row\">
            <div class=\"col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white\">
                <p><i>ActionCall</i> is a work of Moavinis Angelos, Raitsidis Georgios-Anargyros, Romanos Georgios, Stavratis Konstantinos</p>
                <p class=\"h6\">&copy; All rights reserved.</p>
            </div>
            
        </div>	
    </div>
    </footer>";
}




