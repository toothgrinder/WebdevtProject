<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Obi Kun
 * Date: 10/7/2015
 * Time: 1:45 PM
 */
if(session_destroy()){
    header("Location: index.php");
}
?>