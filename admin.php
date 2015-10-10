<?php
session_start();
if(isset($_POST['submit'])){
include('config.php');
$username = $_POST['inputUser'];
$password = $_POST['inputPassword'];
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($con,$username);
$password = mysqli_real_escape_string($con,$password);
$query = mysqli_query($con,"SELECT * FROM admin WHERE user_pass='$password' AND user_contact='$username'");
$rows = $query->num_rows;
if($rows == 1){
$_SESSION['admin_user'] = $username;
header("location:index2.php");

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
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<div class="container">
    <div class="jumbotron">
        <form class="form-signin" method="post">
            <h2 class="form-signin-heading">Admin</h2>
                <label for="inputUser" class="sr-only">Username</label>
                <input type="text" id="inputUser" class="form-control" placeholder="Username" name="inputUser"required autofocus>

            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="inputPassword" required>

            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
        </form>
    </div>
</div> <!-- /container -->
</body>
</html>
