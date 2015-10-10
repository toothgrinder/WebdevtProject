
<!DOCTYPE html>
<?php
/**
 * Created by PhpStorm.
 * User: Obi Kun
 * Date: 9/30/2015
 * Time: 10:43 AM
 */
include('config.php');
include('session.php');
if(isset($_SESSION['login_user'])){
    header("Location:index.php");
}
$err = '';
$success = '';
if(isset($_POST['submit'])){
    $contact = $_POST['InputContact'];
    $pass = $_POST['InputPass'];
    $passc = $_POST['ConfirmPass'];
    $email = $_POST['InputEmail'];
    $emailc = $_POST['ConfirmEmail'];
    $contact = mysqli_real_escape_string($con,$_POST['InputContact']);
    $result = mysqli_query($con,"SELECT * FROM user WHERE user_contact='".$contact."'");
    if($result->num_rows){
        $err = "Contact number is already taken.";

    }
    else {
        if($pass == $passc){
            if($email == $emailc){
                $sql = mysqli_query($con,"INSERT INTO user (user_contact,user_pass,user_email) VALUES ('$contact','$pass','$email')");
                $success = "Successfully Registered.";
            }
            $err = $err + "\nEmail mismatch";
        }
        $err = $err + "\nPassword mismatch.";

    }

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
<!--    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"> n</span>
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
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Products</a>
                </li>
                <li>
                    <a href="#">Contact</a>
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
<br><br><br><br>
<!-- container-->
<div class="container">
    <div class="row">
        <form role="form" action="signup.php" method="post">
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">

                    <label for="InputName">Contact Number: +639 ** *** ****</label>
                    <div class="input-group">
                        <span class="input-group-addon">+63 9</span>
                        <input maxlength="9" type="text" class="form-control" name="InputContact" id="InputContact" placeholder="+63 9**-***-****" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputPassword">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="InputPass" id="InputPass" placeholder="Password" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputPassword">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="ConfirmPass" id="InputPass" placeholder="Password" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Enter Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="InputEmailFirst" name="InputEmail" placeholder="Enter Email" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Confirm Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="InputEmailSecond" name="ConfirmEmail" placeholder="Confirm Email" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>

                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
            </div>
        </form>
        <div class="col-lg-5 col-md-push-1">
            <div class="col-md-12">
                <?php
                if(!empty($success)) {

                echo "<div class=\"alert alert-success\" >";
                echo "<strong ><span class=\"glyphicon glyphicon-ok\" ></span >$success</strong >";
                echo "</div >";
                }
                if(!empty($err)){
                    echo "<div class=\"alert alert-danger\">";
                    echo "<span class=\"glyphicon glyphicon-remove\"></span><strong>$err</strong>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<?php
$con->close();
?>