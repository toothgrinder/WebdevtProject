<?php
session_start();
include('config.php');
$admin_check ="";
$user_check = "";
if(isset($_SESSION['login_user']))
$user_check = $_SESSION['login_user'];
if(isset($_SESSION['admin_user']))
$admin_check = $_SESSION['admin_user'];

$ses_sql = mysqli_query($con,"SELECT user_contact from user WHERE user_contact='$user_check'");
$row = $ses_sql->fetch_assoc();
$login_session = $row['user_contact'];
if(!isset($login_session)){
    $con->close();
//    header("Location:index.php");
}
/**
 * Created by PhpStorm.
 * User: Obi Kun
 * Date: 10/7/2015
 * Time: 2:47 PM
 */
?>
