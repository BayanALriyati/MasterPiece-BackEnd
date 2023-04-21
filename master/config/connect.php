<?php

// define("DB_SERVER", "localhost");
// define("DB_USER", "root");
// define("DB_PASSWORD", "");
// define("DB_DATABASE", "master_piece");

if (!defined('DB_SERVER')) {
    define('DB_SERVER', 'localhost');
}
if (!defined('DB_USER')) {
    define('DB_USER', 'root');
}
if (!defined('DB_PASSWORD')) {
    define('DB_PASSWORD', '');
}
if (!defined('DB_DATABASE')) {
    define('DB_DATABASE', 'master_piece');
}
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