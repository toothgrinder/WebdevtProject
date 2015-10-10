<?php
/**
 * Created by PhpStorm.
 * User: Obi Kun
 * Date: 10/3/2015
 * Time: 1:40 AM
 */
$servername = "127.9.170.130";
$username = "adminyvpCWuH";
$password = "_x2kI2jPkCEN";
$db = "steam";
$con = mysqli_connect($servername,$username,$password,$db);
if($con->connect_error){
    die("Connection Failed: " . $con->connect_error);
}
?>