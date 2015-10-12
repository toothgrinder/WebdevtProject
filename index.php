<!DOCTYPE html>
<?php
    include('session.php');
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">

    <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">-->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
   <!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>

            </button>
            <a class="navbar-brand" href="index.php">
                <img src="banner.png" alt="banner" height="32">

            </a>

        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php
            if(empty($login_session)){
            echo "<ul class=\"nav navbar-nav\">
                <li>
                    <a href=\"#\">Products</a>
                </li>

            </ul>";
            }
            else{
                echo "<ul class=\"nav navbar-nav\">
                <li>
                    <a href=\"buyproduct.php\">Buy Products</a>
                </li>
                </ul>";

            }
            if(empty($login_session)){
                echo "<ul class=\"nav navbar-nav navbar-right\">";
                echo "<li><a href=\"signup.php\"><span class=\"glyphicon glyphicon-user\"></span> Sign Up</a></li>";
                echo "<li><a href=\"login.php\"><span class=\"glyphicon glyphicon-log-in\"></span> Login</a></li>";
                echo "</ul>";
            }
            else{
                echo "<ul class=\"nav navbar-nav navbar-right\">";
                echo "<li><a href=\"logout.php\"><span class=\"glyphicon glyphicon-log-out\"></span>Logout</a></li>";
                echo "</ul>";

            }
            ?>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<br><br><br>
<!-- container-->
        <?php
        if(!empty($login_session)){
            echo    "
                    <div class=\"container\">
                    <div class=\"well well-lg\" >
                            <b class=\"alert-info\"><h1>WELCOME: 09$login_session!</h1></b>

                    </div>
                    </div>
                ";

        }
        ?>



<?php
/**
 * Created by PhpStorm.
 * User: Obi Kun
 * Date: 9/30/2015
 * Time: 10:43 AM
 */


?>
</body>
</html>
