<!DOCTYPE html>
<?php
/**
 * Created by PhpStorm.
 * User: Obi Kun
 * Date: 10/7/2015
 * Time: 4:23 PM
 */
session_start();
if(!isset($_SESSION['admin_user'])){
    header("Location:admin.php");
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">-->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="banner.png" alt="banner" height="32">
            </a>

        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index2.php">Home</a></li>
                <li><a href="viewmembers.php">View Members</a></li>
                <li><a href="confirm.php">Confirm Orders</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>

    </div>
    </div>
</nav>
<br><br><br>
        <div class="container-fluid">
        <div class="jumbotron">
        <h1 class="page-header">View Members</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th></th>
                    <th>Contact</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include('config.php');
                $result = mysqli_query($con,"SELECT * FROM user ORDER BY id");
                while($row = $result->fetch_object()) {
                    echo "<tr>
                    <td>$row->id</td>
                    <td>09$row->user_contact</td>
                    <td>$row->user_email</td>
                    </tr>";
                }
                ?>

                </tbody>
            </table>
    </div>
</div>
        </div>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
