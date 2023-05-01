<?php 
include_once ('includes/header.php');
include_once ('../middleware/adminMiddleware.php');
include_once ('../config/connect.php') ;
//  include('../functions/myfunctions.php');

?>
<?php


if(isset ($_SESSION ['auth'])){

unset( $_SESSION ['auth'] );
unset($_SESSION ['auth_user']);
// session_unset();
// session_destroy();
// (header("Location: index.php"));
// exit;
// $_SESSION ['message']="Logged Out Successfully";
// header('location: admin/index.php');
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
  include ('includes/footer.php');
?>

