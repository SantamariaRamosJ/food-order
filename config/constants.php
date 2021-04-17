<?php 
    //Start Session
    session_start();



    //Create constants to store non repeating values
    define('SITEURL', 'https://testing-file.herokuapp.com/');
    define('LOCALHOST', 'sql10.freemysqlhosting.net');
    define('DB_USERNAME', 'sql10406117');
    define('DB_PASSWORD', 'JVKyKUPpfy');
    define('DB_NAME', 'food-order');

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error("error")); //Database connection
    $db_select = mysqli_select_db($conn, 'food-order') or die(mysqli_error("error")); //selecting database 



?>