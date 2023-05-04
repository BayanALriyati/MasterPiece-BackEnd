<?php
include_once ('../config/connect.php');
include_once ('../functions/authCode.php');

 
if(isset($_POST['addTOcart'])){
    if(isset($_SESSION['auth']))
  {
   $user_id = $_SESSION['auth_user']['user_id'];
   $productId = $_POST['product_id'];
   $product_qty = $_POST['qty'];
     
   $sql = "SELECT * FROM `cart` WHERE product_id = '$productId' AND user_id = '$user_id';";
   $check_cart = mysqli_query($con , $sql) ;
   if(mysqli_num_rows($check_cart) > 0 )
   {      
   //  redirect("../yourGift.php" , "Your Product Added To Cart!");
    $_SESSION ['message']="Your Product Added To Cart!";
    header('Location: ../yourGift.php');
}
else
{
      $sql = "INSERT INTO `cart`(`id`, `user_id`, `product_id`, `qty`) VALUES (NULL,'$user_id','$productId','$product_qty');";
 
       $send_to_cart = mysqli_query($con , $sql) ;
        if($send_to_cart){
         // redirect("../yourGift.php" ,"Product Added Successfully");
         $_SESSION ['message']="Product Added To Cart Successfully";
         header('Location: ../yourGift.php');     
        }
          else
        {
         //   redirect("../index.php" , "Something went wrong");
           $_SESSION ['message']="Something went wrong";
           header('Location: ../index.php');   
        }
      }
    }
    else
    {
   //   redirect("../login.php" , "Login To Continue");
     $_SESSION ['message']="Login To Continue";
     header('Location: ../login.php');
    }
}

else if(isset($_POST['btnDelete'])){
  $cart_id = $_POST['deleteCart_id'];
  $sql = "DELETE FROM `cart` WHERE id = $cart_id";
  $delete_item = mysqli_query($con , $sql) ;
  if($delete_item)
   {
      // redirect("../yourCart.php" , "Item Deleted Successfully");
      // $_SESSION ['message']="Item Deleted Successfully";
      // header('Location: ../yourCart.phpp');.
      echo 200 ;
   }
   else{
      // redirect("../index.php" , "Something went wrong");
      // $_SESSION ['message']="Something went wrong";
      // header('Location: ../index.php');
      echo 500 ;
   }
}

else if(isset($_POST['btnCartDelete'])){
  $user_id = $_POST['delete_all'];
  $sql = "DELETE FROM `cart` WHERE user_id = $user_id";
  $delete_item = mysqli_query($con , $sql) ;
  if($delete_item)
   {
      echo 200 ;
   }
   else{
      echo 500 ;
   }
}

else if(isset($_POST['update_qty'])){
  $cart_id = $_POST['cart_id'];
  $user_id = $_POST['user_id'];
  $product_qty = $_POST['qty'];
  $sql = "UPDATE `cart` SET `qty` = $product_qty WHERE id = $cart_id AND user_id= $user_id ;";
  $update_item = mysqli_query($con , $sql) ;
  if($update_item)
   {
      // redirect("../yourCart.php" , "Item Update Successfully");
      $_SESSION ['message']="Item Update Successfully";
      header('Location: ../yourCart.php');
   }
   else{
      // redirect("../yourCart.php" , "Something went wrong");
      $_SESSION ['message']="Something went wrong";
      header('Location: ../yourCart.php');
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
   $description   = $_POST['description']; 
   $sql = "SELECT * FROM `favorite` WHERE product_id = '$productId' AND user_id = '$user_id';";
   $check_cart = mysqli_query($con , $sql) ;
   if(mysqli_num_rows($check_cart) > 0 )
   {      
   //  redirect("../yourGift.php" , "Your Product Added To Favorite!");
    $_SESSION ['message']="Your Product Added To Favorite!";
    header('Location: ../yourGift.php');
}
else
{

     $sql = "INSERT INTO `favorite` (`id`, `user_id`, `product_id`, `name`, `description`, `price`, `image`)  VALUES (NULL,'$user_id', '$productId' , '$product_name' , '$description' , '$product_price', '$product_image');";
     $send_to_cart = mysqli_query($con , $sql) ;
     echo ($sql);
     if($send_to_cart){
      //   redirect("../yourGift.php","Product Added Successfully");
        $_SESSION ['message']="Product Added To Favorite Successfully";
        header('Location: ../yourGift.php');
     }
     else
     {
      //   redirect("../index.php","Something went wrong");
        $_SESSION ['message']="Something went wrong";
        header('Location: ../index.php');
     }
   }
} 
    else
    {
   //   redirect("../login.php","Login To Continue");
     $_SESSION ['message']="Login To Continue";
     header('Location: ../login.php');
    }
}

else if(isset($_POST['deleteFavorite'])){
   $favorite_id = $_POST['deleteFavorite_id'];
   $sql = "DELETE FROM `favorite` WHERE id = $favorite_id";
   $delete_item = mysqli_query($con , $sql) ;
   if($delete_item)
    {
      //  redirect("../yourFavorite.php" , "Item Deleted Successfully");
      //  $_SESSION ['message']="Item Deleted Successfully";
      //  header('Location: ../yourFavorite.php');
      echo 200 ;
    }
    else{
      //  redirect("../index.php" , "Something went wrong");
      //  $_SESSION ['message']="Something went wrong";
      //  header('Location: ../index.php');
      echo 500 ;
    }
 }


else if(isset($_POST['addCartFavorite'])){
   if(isset($_SESSION['auth']))
 {
  $user_id = $_SESSION['auth_user']['user_id'];
  $productId = $_POST['product_id'];
  $product_qty = $_POST['qty'];
  
  
  $sql = "SELECT * FROM `cart` WHERE product_id = '$productId' AND user_id = '$user_id';";
  $check_cart = mysqli_query($con , $sql) ;
  if(mysqli_num_rows($check_cart) > 0 )
  {      
   // redirect("../yourFavorite.php" , "Your Product Added To Cart!");
   $_SESSION ['message']="Your Product Added To Cart!";
   header('Location: ../yourFavorite.php');
}
else
{
     $sql = "INSERT INTO `cart`(`id`, `user_id`, `product_id`, `qty`) VALUES (NULL,'$user_id','$productId','$product_qty');";

      $send_to_cart = mysqli_query($con , $sql) ;
       if($send_to_cart){
      //   redirect("../yourFavorite.php" ,"Product Added Successfully");
        $_SESSION ['message']="Product Added To cart Successfully";
        header('Location: ../yourFavorite.php');
       }
         else
       {
         //  redirect("../index.php" , "Something went wrong");
          $_SESSION ['message']="Something went wrong";
          header('Location: ../index.php');
       }
     }
   }
   else
   {
   //  redirect("../login.php" , "Login To Continue");
    $_SESSION ['message']="Login To Continue";
    header('Location: ../login.php');
   }
}

else if(isset($_POST['addHeartFavorite'])){
 if(isset($_SESSION['auth']))
{
  $user_id = $_SESSION['auth_user']['user_id'];
  $productId = $_POST['product_id'];
  $product_name = $_POST['name'];
  $product_price = $_POST['price'];
  $product_image = $_POST['image'];
  $description   = $_POST['description']; 
  $sql = "SELECT * FROM `favorite` WHERE product_id = '$productId' AND user_id = '$user_id';";
  $check_cart = mysqli_query($con , $sql) ;
  if(mysqli_num_rows($check_cart) > 0 )
  {      
   // redirect("../yourFavorite.php" , "Your Product Added To Favorite!");
   $_SESSION ['message']="Your Product Added To Favorite!";
    header('Location: ../yourFavorit.php');
}
else
{

    $sql = "INSERT INTO `favorite` (`id`, `user_id`, `product_id`, `name`, `description`, `price`, `image`)  VALUES (NULL,'$user_id', '$productId' , '$product_name' , '$description' , '$product_price', '$product_image');";
    $send_to_cart = mysqli_query($con , $sql) ;
    echo ($sql);
    if($send_to_cart){
      //  redirect("../yourFavorite.php","Product Added To Favorite Successfully");
       $_SESSION ['message']="Product Added To Favorite Successfully";
       header('Location: ../yourFavorite.php');
    }
    else
    {
      //  redirect("../index.php","Something went wrong");
       $_SESSION ['message']="Something went wrong";
       header('Location: ../index.php');
    }
  }
} 
   else
   {
   //  redirect("../login.php","Login To Continue");
    $_SESSION ['message']="Login To Continue";
    header('Location: ../login.php');
   }
}

else if(isset($_POST['addCartIndrex'])){
   if(isset($_SESSION['auth']))
 {
  $user_id = $_SESSION['auth_user']['user_id'];
  $productId = $_POST['product_id'];
  $product_qty = $_POST['qty'];
  
  $sql = "SELECT * FROM `cart` WHERE product_id = '$productId' AND user_id = '$user_id';";
  $check_cart = mysqli_query($con , $sql) ;
  if(mysqli_num_rows($check_cart) > 0 )
  {      
   // redirect("../index.php" , "Your Product Added To Cart!");
   $_SESSION ['message']="Your Product Added To Cart!";
    header('Location: ../index.php');
}
else
{
     $sql = "INSERT INTO `cart`(`id`, `user_id`, `product_id`, `qty`) VALUES (NULL,'$user_id','$productId','$product_qty');";

      $send_to_cart = mysqli_query($con , $sql) ;
       if($send_to_cart){
      //   redirect("../index.php" ,"Product Added To Cart Successfully");
        $_SESSION ['message']="Product Added To Cart Successfully";
        header('Location: ../index.php');
       }
         else
       {
         //  redirect("../index.php" , "Something went wrong");
          $_SESSION ['message']="Something went wrong";
          header('Location: ../index.php');
       }
     }
   }
   else
   {
   //  redirect("../login.php" , "Login To Continue");
    $_SESSION ['message']="Login To Continue";
    header('Location: ../login.php');
   }
}

else if(isset($_POST['addHeartIndrex'])){
 if(isset($_SESSION['auth']))
{
  $user_id = $_SESSION['auth_user']['user_id'];
  $productId = $_POST['product_id'];
  $product_name = $_POST['name'];
  $product_price = $_POST['price'];
  $product_image = $_POST['image'];
  $description   = $_POST['description']; 
  $sql = "SELECT * FROM `favorite` WHERE product_id = '$productId' AND user_id = '$user_id';";
  $check_cart = mysqli_query($con , $sql) ;
  if(mysqli_num_rows($check_cart) > 0 )
  {      
   // redirect("../index.php" , "Your Product Added To Favorite!");
   $_SESSION ['message']="Your Product Added To Favorite!";
    header('Location: ../index.php');
}
else
{

    $sql = "INSERT INTO `favorite` (`id`, `user_id`, `product_id`, `name`, `description`, `price`, `image`)  VALUES (NULL,'$user_id', '$productId' , '$product_name' , '$description' , '$product_price', '$product_image');";
    $send_to_cart = mysqli_query($con , $sql) ;
    echo ($sql);
    if($send_to_cart){
      //  redirect("../index.php","Product Added Successfully");
       $_SESSION ['message']="Product Added To favorite Successfully";
       header('Location: ../index.php');
    }
    else
    {
      //  redirect("../index.php","Something went wrong");
       $_SESSION ['message']="Something went wrong";
       header('Location: ../index.php');
    }
  }
} 
   else
   {
   //  redirect("../login.php","Login To Continue");
    $_SESSION ['message']="Login To Continue";
    header('Location: ../login.php');
   }
}

else if(isset($_POST['addCartSearch'])){
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
   // redirect("../search.php" , "Your Product Added To Cart!");
   $_SESSION ['message']="Your Product Added To Cart!";
    header('Location: ../search.php');
}
else
{
     $sql = "INSERT INTO `cart`(`id`, `user_id`, `product_id`, `qty`) VALUES (NULL,'$user_id','$productId','$product_qty');";

      $send_to_cart = mysqli_query($con , $sql) ;
       if($send_to_cart){
      //   redirect("../search.php" ,"Product Added Successfully");
        $_SESSION ['message']="Product Added to cart Successfully";
        header('Location: ../search.php');
       }
         else
       {
         //  redirect("../index.php" , "Something went wrong");
          $_SESSION ['message']="Something went wrong";
        header('Location: ../index.php');
       }
     }
   }
   else
   {
   //  redirect("../login.php" , "Login To Continue");
    $_SESSION ['message']="Login To Continue";
    header('Location: ../login.php');
   }
}

else if(isset($_POST['addHeartSearch'])){
 if(isset($_SESSION['auth']))
{
  $user_id = $_SESSION['auth_user']['user_id'];
  $productId = $_POST['product_id'];
  $product_name = $_POST['name'];
  $product_price = $_POST['price'];
  $product_image = $_POST['image'];
  $description   = $_POST['description']; 
  $sql = "SELECT * FROM `favorite` WHERE product_id = '$productId' AND user_id = '$user_id';";
  $check_cart = mysqli_query($con , $sql) ;
  if(mysqli_num_rows($check_cart) > 0 )
  {      
   // redirect("../search.php" , "Your Product Added To Favorite!");
   $_SESSION ['message']="Your Product Added To Favorite!";
    header('Location: ../search.php');
}
else
{

    $sql = "INSERT INTO `favorite` (`id`, `user_id`, `product_id`, `name`, `description`, `price`, `image`)  VALUES (NULL,'$user_id', '$productId' , '$product_name' , '$description' , '$product_price', '$product_image');";
    $send_to_cart = mysqli_query($con , $sql) ;
    echo ($sql);
    if($send_to_cart){
      //  redirect("../search.php","Product Added Successfully");
       $_SESSION ['message']="Product Added To Favorite Successfully";
       header('Location: ../search.php');
    }
    else
    {
      //  redirect("../index.php","Something went wrong");
       $_SESSION ['message']="Something went wrong";
    header('Location: ../index.php');
    }
  }
} 
   else
   {
   //  redirect("../login.php","Login To Continue");
    $_SESSION ['message']="Login To Continue";
    header('Location: ../login.php');
   }
}


else if(isset($_POST['addReview'])){
   if(isset($_SESSION['auth']))
  {
    $user_id = $_SESSION['auth_user']['user_id'];
    $review_text = $_POST['review_text'];
    $product_id = $_POST['product_id'];
      // $sql = "INSERT INTO review (user_id,product_id,review_text,review_date) 
      // VALUES ('$user_id','$product_id','$review_text',NOW())";
      $sql = "INSERT INTO `reviews`(`review_id`, `user_id`, `product_id`, `review_text`, `review_date`) VALUES ('NULL','$user_id','$product_id','$review_text',NOW())";
      $send_to_review = mysqli_query($con , $sql) ;
      echo ($sql);
      if($send_to_review){
      //   redirect("../yourGift.php","Product Review Added Successfully");
        $_SESSION ['message']="Product Review Added Successfully";
        header('Location: ../product_view.php');
      }
      else
      {
         // redirect("../index.php","Something went wrong");
         $_SESSION ['message']="Something went wrong";
         header('Location: ../index.php');
      }
    }
  } 
     else
     {
      // redirect("../login.php","Login To Continue");
      $_SESSION ['message']="Login To Continue";
      header('Location: ../login.php');
     }
//   }
?>
