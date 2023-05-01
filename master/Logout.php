<?php
include_once ('./includes/header.php');
include_once  ('./config/connect.php');
// include_once('./includes/navbar.php') ;
include_once('functions/userFunctions.php');


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

// session_start();
// session_unset();
// session_destroy();

// redirect("./index.php","Logged Out Successfully");



?>

<?php
require('includes/footer.php')
?>