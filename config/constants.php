<?php 
    //Start Session
    session_start();

    define('SITEURL', 'https://ohmyfood-restaurant.herokuapp.com/');
    define('LOCALHOST', 'sql10.freemysqlhosting.net');
    define('DB_USERNAME', 'sql10410060');
    define('DB_PASSWORD', 'X1Lb73nJfH');
    define('DB_NAME', 'sql10410060');

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error('error')); //Database connection
    $db_select = mysqli_select_db($conn, 'sql10410060') or die(mysqli_error('error')); //selecting database 

?>

