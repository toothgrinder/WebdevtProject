<?php
/**
 * Created by PhpStorm.
 * User: Obi Kun
 * Date: 10/12/2015
 * Time: 6:43 PM
 */
include('config.php');
include('session.php');
if(!isset($_SESSION['login_user'])){
    header("Location:login.php");
}
if(isset($_POST['submit'])){
    $user_contact = $login_session;
    $network = $_POST['network'];
    $denomination = $_POST['denomination'];
    $isfulfilled = 0;
    include('config.php');
    $sql = mysqli_query($con,"INSERT INTO ordertbl (user_contact,product_network,value,isfulfilled) VALUES ('$user_contact','$network','$denomination','$isfulfilled')");
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
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
                    <a href="buyproduct.php">Buy Products</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<br><br><br>
<div class="container">
    <div class="well well-lg">
    <div class="well well-lg">

        <div class="alert alert-info"><span class="glyphicon glyphicon-alert"></span>  Waiting for Confirmation</div>
    </div>
    </div>
</div>
</body>
</html>
