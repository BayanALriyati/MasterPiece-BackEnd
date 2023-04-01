<?php
include_once ('../config/connect.php');
include_once ('../functions/authCode.php');

 
if(isset($_POST['addTOcart'])){
    if(isset($_SESSION['auth']))
  {
   $user_id = $_SESSION['auth_user']['user_id'];
   $productId = $_POST['product_id'];
  //  $product_name = $_POST['name'];
   $product_qty = $_POST['qty'];
  //  $product_price = $_POST['price'];
  //  $product_image = $_POST['image'];
   
   
   $sql = "SELECT * FROM `cart` WHERE product_id = '$productId' AND user_id = '$user_id';";
   $check_cart = mysqli_query($con , $sql) ;
   if(mysqli_num_rows($check_cart) > 0 )
   {      
    redirect("../yourGift.php" , "Your Product Added To Cart!");
}
else
{
      $sql = "INSERT INTO `cart`(`id`, `user_id`, `product_id`, `qty`) VALUES (NULL,'$user_id','$productId','$product_qty');";
 
       $send_to_cart = mysqli_query($con , $sql) ;
        if($send_to_cart){
         redirect("../yourGift.php","Product Added Successfully");
        }
          else
        {
           redirect("../index.php","Something went wrong");
        }
      }
    }
    else
    {
     redirect("../login.php","Login To Continue");
    }
}

else if(isset($_POST['addTOheart'])){
  if(isset($_SESSION['auth']))
{
   $user_id = $_SESSION['auth_user']['user_id'];
   $productId = $_POST['product_id'];
   $product_name = $_POST['name'];
   $product_price = $_POST['price'];
   $product_image = $_POST['image'];

   $sql = "SELECT * FROM `wishlist` WHERE product_id = '$productId' AND user_id = '$user_id';";
   $check_cart = mysqli_query($con , $sql) ;
   if(mysqli_num_rows($check_cart) > 0 )
   {      
    redirect("../yourGift.php" , "Your Product Added To Cart!");
}
else
{

     $sql = "INSERT INTO `wishlist`(`id`, `user_id`, `product_id`, `name`, `price`, `image`)  VALUES (NULL,'$user_id', '$productId' , '$product_name' , '$product_price', '$product_image');";
     $send_to_cart = mysqli_query($con , $sql) ;
     echo ($sql);
     if($send_to_cart){
     redirect("../yourGift.php.php","Product Added Successfully");
     }
     else
     {
        redirect("../index.php","Something went wrong");
     }
   }
} 
    else
    {
     redirect("../login.php","Login To Continue");
    }
}

?>
