<?php
include_once ('../config/connect.php');
include_once ('../functions/authCode.php');
if(isset($_SESSION['auth'])){
    $user_id = $_SESSION['auth_user']['user_id'];
 }else{
    $user_id = '';
    header('location:user_login.php');
 };
 
if(isset($_POST['placeOrder'])){
//     if(isset($_SESSION['auth']))
//   {
//    $user_id = $_SESSION['auth_user']['user_id'];
   $fullName = $_POST['firstName'] ." ". $_POST['lastName'];
   $fullName = filter_var($fullName, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $phone = $_POST['phone'];
   $phone = filter_var($phone, FILTER_SANITIZE_STRING);
   $location = 'flat no. '. $_POST['flat'] .','. $_POST['street'] .', '. $_POST['city'] .','. $_POST['country'];
   $location = filter_var($location, FILTER_SANITIZE_STRING);
   $delivery_time = $_POST['time'];
   $delivery_time = filter_var($delivery_time, FILTER_SANITIZE_STRING);
   $letter = $_POST['letter'];
   $letter = filter_var($letter, FILTER_SANITIZE_STRING);
   $pay_method = $_POST['method'];
   $total_products = $_POST['total_products'];
   $total_price = $_POST['total_price'];
   date_default_timezone_set("Asia/Amman");
   $order_time = date("Y:m:d h:i:sa"); 
   
   $sql = "SELECT * FROM `cart` WHERE user_id = '$user_id';";
   $check_cart = mysqli_query($con , $sql) ;
   if(mysqli_num_rows($check_cart) > 0 )
   {      
    $sql = "INSERT INTO `orders`(`order_id`, `user_id`, `fullName`, `email`, `phone`, `delivery_time`, `letter`, `location`, `pay_method`, `total_products`, `total_price`, `order_time`) VALUES (NULL,'$user_id','$fullName','$email','$phone','$delivery_time','$letter','$location','$pay_method','$total_products','$total_price','$order_time');";
    $check_cart = mysqli_query($con , $sql) ;
    redirect("../yourCart.php" , "Place Order Successfully");
}
else
{
    redirect("../index.php" , "Error");
    //   $sql = "INSERT INTO `cart`(`id`, `user_id`, `product_id`, `qty`) VALUES (NULL,'$user_id','$productId','$product_qty');";
 
    //    $send_to_cart = mysqli_query($con , $sql) ;
    //     if($send_to_cart){
    //      redirect("../yourGift.php" ,"Product Added Successfully");
    //     }
    //       else
    //     {
    //        redirect("../index.php" , "Something went wrong");
    //     }
      }
    // }
    // else
    // {
    //  redirect("../login.php" , "Login To Continue");
    // }
}