<?php
/**
 * Created by PhpStorm.
 * User: Obi Kun
 * Date: 10/3/2015
 * Time: 1:40 AM
 */
/*
$servername = "fdb12.biz.nf";
$username = "1950364_steam";
$password = "k9n6pgm2v1";
$db = "1950364_steam";-->*/
$servername = "localhost";
$username = "root";
$password = "";
$db = "";
$con = mysqli_connect($servername,$username,$password,$db);
if($con->connect_error){
    die("Connection Failed: " . $con->connect_error);
}
?>