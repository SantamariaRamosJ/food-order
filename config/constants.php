<?php 
    //Start Session
    session_start();

    define('SITEURL', 'https://ohmyfood-app.herokuapp.com/');
    define('LOCALHOST', 'sql10.freemysqlhosting.net');
    define('DB_USERNAME', 'sql10408524');
    define('DB_PASSWORD', '51cFb5xmVR');
    define('DB_NAME', 'sql10408524');

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error("error")); //Database connection
    $db_select = mysqli_select_db($conn, 'sql10408524') or die(mysqli_error("error")); //selecting database 

?>