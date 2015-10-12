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
if(isset($_POST['confirm'])){
    include('config.php');
    $id = $_POST['id'];
    $sql = "UPDATE ordertbl SET isfulfilled='1' WHERE order_id='$id'";
    $result = mysqli_query($con,$sql);
    include('chikka.php');
    $cp = $_POST['contact'];
    $deno = $_POST['value'];
    $network = $_POST['network'];
    $clientId = '66f1aabc1eb2ed13bd8e2164934396811a80fd0842e80c199a36df92c4fff3bf';
    $secretKey = '33aab86ba595f8acfb35fadf10a74612dfbdf66412b744f8929a51a337a0d6ca';
    $shortCode = '2929057032';
    $chikkaAPI = new ChikkaSMS($clientId,$secretKey,$shortCode);
    $response = $chikkaAPI->sendText('1234561', '639'+$cp, $deno+' Successfully Loaded to your '+$network);
    header("HTTP/1.1 " . $response->status . " " . $response->message);
    exit($response->description);

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
</nav>
<br><br><br>
<div class="container-fluid">
    <div class="jumbotron">
        <h1 class="page-header">Confirm orders</h1>
        <div class="table-responsive">
            <form method="post" action="confirm.php">
            <table align="center"  class="table table-bordered">

                <thead>
                <tr>
                    <th></th>
                    <th>Contact</th>
                    <th>Network</th>
                    <th>Denomination</th>
                    <th>Confirm?</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include('config.php');
                $result = mysqli_query($con,"SELECT * FROM ordertbl WHERE isfulfilled='0' ORDER BY order_id") or die(mysqli_error($con));
                while($row = $result->fetch_object()) {
                    echo "<tr>
                    <td name=$row->order_id>$row->order_id</td>
                    <td name=$row->user_contact>09$row->user_contact</td>
                    <td name=$row->product_network>$row->product_network</td>
                    <td name=$row->value>$row->value</td>
                    <td>
                    <input type=hidden name=id value=$row->order_id/>
                    <input type=hidden name=network value=$row->product_network/>
                    <input type=hidden name=value value=$row->value/>
                    <input type=hidden name=contact value=$row->user_contact/>
                    <input type=submit class=\"btn btn-info \" name=confirm value=confirm></td>
                    </tr>";
                }
                $con = null;
                ?>

                </tbody>
            </table>
            </form>
        </div>
    </div>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
