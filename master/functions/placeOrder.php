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
  //  $card_Number = $_POST['card_Number'];, `card_Number` '$card_Number',
   $total_products = $_POST['total_products'];
   $total_price = $_POST['total_price'];
   date_default_timezone_set("Asia/Amman");
   $order_time = date("Y:m:d h:i:sa"); 

   $sql ="SELECT * FROM `users` WHERE User_id  = '$user_id'";
   $check_user = mysqli_query($con , $sql) ;
   if(mysqli_num_rows($check_user) > 0 ){
    while($fetch_users = mysqli_fetch_array($check_user)){
         $NameUser=$fetch_users['name'];
      }}
    
   
   $sql = "SELECT * FROM `cart` WHERE user_id = '$user_id';";
   $check_cart = mysqli_query($con , $sql) ;
   if(mysqli_num_rows($check_cart) > 0 )
   {      
    $sql = "INSERT INTO `orders`(`order_id`, `user_id`, `fullName`, `email`, `phone`, `delivery_time`, `letter`, `location`, `pay_method`,`total_products`, `total_price`, `order_time`) VALUES (NULL,'$user_id','$fullName','$email','$phone','$delivery_time','$letter','$location','$pay_method','$total_products','$total_price','$order_time');";
    $check_cart = mysqli_query($con , $sql) ;
   //  redirect("../yourCart.php" , "Place Order Successfully");
    $sql = "SELECT * FROM `orders` ORDER BY order_id DESC LIMIT 1;";
    $check_order = mysqli_query($con , $sql);
    if(mysqli_num_rows($check_order)> 0){                                                             
      while($fetch_order_to_details = mysqli_fetch_array($check_order)){
        $last_id = $fetch_order_to_details['order_id'];
        $_SESSION['last_order']= $last_id;

      // echo  $_SESSION['last_order'] ;
      } }
      $sql="SELECT product.product_id,product.productName,product.price,product.is_discount,product.price_discount,cart.qty FROM product INNER JOIN cart ON product.product_id=cart.product_id WHERE cart.user_id=$user_id";
      $check_orderDetails = mysqli_query($con , $sql) ;
      if(mysqli_num_rows($check_orderDetails) > 0)
        {
         while($value = mysqli_fetch_array($check_orderDetails)){
            print_r ($value);
            $product_id = $value["product_id"];
            if($value["is_discount"]==1){
               $price = $value["price_discount"];
            } else{
               $price = $value["price"];
            }
            $quantity = $value["qty"];
            $nameProduct = $value["productName"];

         $sql = "INSERT INTO order_details (order_id, product_id, quantity, price,NameProduct,NameUser) 
         VALUES ('$last_id', '$product_id', '$quantity', '$price','$nameProduct','$fullName')";
         $insert_orderDetails = mysqli_query($con , $sql) ;

         $sql = "DELETE FROM `cart` WHERE user_id = $user_id";
         $delate_cart = mysqli_query($con , $sql) ;
         // redirect("../yourOrder.php" , "Place Order Successfully");
          }
        }
      //   redirect("../yourCart.php" , "Place Order Successfully");
      redirect("../yourOrder.php" , "Place Order Successfully");

    }
    else
    {
    redirect("../index.php" , "Something went wrong");
    }
    
}