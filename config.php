<?php
/**
 * Created by PhpStorm.
 * User: Obi Kun
 * Date: 10/3/2015
 * Time: 1:40 AM
 */
$servername = "localhost";
$username = "root";
$password = "";
$db = "steam";
$con = mysqli_connect($servername,$username,$password,$db);
if($con->connect_error){
    die("Connection Failed: " . $con->connect_error);
}
?>