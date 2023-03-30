<?php
include_once ('./includes/header.php');
include_once  ('./config/connect.php');
include_once('./includes/navbar.php') ;

// session_start();
if(isset ($_SESSION ['auth'])){

    unset( $_SESSION ['auth'] );
    unset($_SESSION ['auth_user']);
    // session_unset();
    // session_destroy();
    // (header("Location: index.php"));
    // exit;

}
$_SESSION ['message']="Logged Out Successfully";
header('location: index.php');
// exit;



?>

<?php
require('includes/footer.php')
?>