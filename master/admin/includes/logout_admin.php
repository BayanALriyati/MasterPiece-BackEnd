<?php 
  include_once ('includes/header.php');
  include_once ('../middleware/adminMiddleware.php');
  include_once ('../config/connect.php') ;
?>
<?php


// if(isset ($_SESSION ['auth'])){

// unset( $_SESSION ['auth'] );
// unset($_SESSION ['auth_user']);
// // session_unset();
// // session_destroy();
// // (header("Location: index.php"));
// // exit;
// // $_SESSION ['message']="Logged Out Successfully";
// // header('location: admin/index.php');
// }

session_start();
session_unset();
session_destroy();

$_SESSION ['message']="Logged Out Successfully";
header('location: ../index.php');

?>
<?php
  include ('includes/footer.php');
?>

