<?php 
    //include constant.php for SITEURL
    include('../config/constants.php');

    //1. Destroy the session
    session_destroy(); //unset $_SESSION
    //2.Redirect to login page
    header('location:'.SITEURL.'admin/login.php');
?>