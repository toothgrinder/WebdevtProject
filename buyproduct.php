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

<form class="form-horizontal" method="post" action="orderauth.php">
    <fieldset>

        <!-- Form Name -->
        <legend>Buy Load</legend>

        <!-- Multiple Radios -->
        <div class="form-group">
                <?php
                include('config.php');
                $inc = 0;
                $result = mysqli_query($con,"SELECT * FROM product ORDER BY product_id");
                echo "<label class=\"col-md-4 control-label\" for=selectbasic>Choose Network</label>
                         <div class=col-md-4>
                                 <select id=selectbasic name=network class=form-control>
                          ";
                while($row = $result->fetch_object()) {
                    $row1 = strtoupper($row->product_network);
                        echo "<option value=$row->product_network>$row1</option><br>";
                    $inc++;
                }
                echo "  </select>
                            </div>";
                ?>

         </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="selectbasic">Denomination</label>
            <div class="col-md-4">
                <select id="selectbasic" name="denomination" class="form-control">
                    <option value="20">20 PHP</option>
                    <option value="50">50 PHP</option>
                    <option value="100">100 PHP</option>
                    <option value="200">200 PHP</option>
                    <option value="500">500 PHP</option>
                </select>
            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton"></label>
            <div class="col-md-4">
                <button id="singlebutton" name="submit" class="btn btn-inverse">submit</button>
            </div>
        </div>

    </fieldset>
</form>
</div>
</div>
</body>
</html>
