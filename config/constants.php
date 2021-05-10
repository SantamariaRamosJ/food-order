<?php 
    //Start Session
    session_start();

    define('SITEURL', 'https://phpfoodorder.herokuapp.com/');
    define('LOCALHOST', 'sql10.freemysqlhosting.net');
    define('DB_USERNAME', 'sql10411613');
    define('DB_PASSWORD', 'D1LbDIdK8I');
    define('DB_NAME', 'sql10411613');

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error('error')); //Database connection
    $db_select = mysqli_select_db($conn, 'sql10411613') or die(mysqli_error('error')); //selecting database 



//Variables to run in localhost
// define('SITEURL', 'http://localhost/food-order/');
// define('LOCALHOST', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'food-order');

// $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error("error")); //Database connection
// $db_select = mysqli_select_db($conn, 'food-order') or die(mysqli_error("error")); //selecting database 


?>

