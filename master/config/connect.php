<?php

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "gifts");

// // Creating database connection
$con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

// Check database connection
try {
    // echo 'You Are Connected Welcome To Database';
}catch (Exception $e){
    $error = $e->getMessage();
    echo $error;
}


?>