<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'Hulk@911');
    define('DB_NAME', 'lampdb');

    /* Attempt to connect to MySQL database */
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if($link === false){
        die("Error! Couldn't Connect." .mysqli_connect_error());
    }
?>
