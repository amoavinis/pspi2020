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
                        <script>forum_gen("");</script>
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