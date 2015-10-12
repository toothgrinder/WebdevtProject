<!DOCTYPE html>
<?php
    session_start();

    if(isset($_SESSION['login_user'])){
        header	("location:index.php");
    }
    if(isset($_POST['submit'])){
        include('config.php');
        $username = $_POST['inputUser'];
        $password = $_POST['inputPassword'];
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysqli_real_escape_string($con,$username);
        $password = mysqli_real_escape_string($con,$password);
        $query = mysqli_query($con,"SELECT * FROM user WHERE user_pass='$password' AND user_contact='$username'");
        $rows = $query->num_rows;
        if($rows == 1){
            $_SESSION['login_user'] = $username;
            header('location:index.php');
        }
        else{
            $errr = "Username or Password invalid.";
        }
        $con->close();
    }
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">

    <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">-->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
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
            <ul class="nav navbar-nav">
                <li>
                    <a href="#">Products</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<br><br>
<!-- container-->
<br><br>
    <div class="container">
        <div class="jumbotron">
            <form class="form-signin" method="post">
                <?php
                 if(!empty($errr)){
                     echo "<div class=\"alert alert-danger\">
                    <strong>$errr</strong>
                    </div>";
                 }
                ?>

                <h2 class="form-signin-heading">Please sign in</h2>
                <div class="input-group">
                    <span class="input-group-addon">+63 9</span>
                    <label for="inputUser" class="sr-only">Contact number</label>
                    <input type="text" id="inputUser" class="form-control" maxlength="9" placeholder="Contact number" name="inputUser"required autofocus>
                </div>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="inputPassword" required>

                <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
            </form>
        </div>
    </div> <!-- /container -->
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
