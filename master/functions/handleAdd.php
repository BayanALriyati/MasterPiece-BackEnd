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
         redirect("../yourGift.php" ,"Product Added Successfully");
        }
          else
        {
           redirect("../index.php" , "Something went wrong");
        }
      }
    }
    else
    {
     redirect("../login.php" , "Login To Continue");
    }
}

else if(isset($_POST['delete'])){
  $cart_id = $_POST['cart_id'];
  $sql = "DELETE FROM `cart` WHERE id = $cart_id";
  $delete_item = mysqli_query($con , $sql) ;
  if($delete_item)
   {
      redirect("../yourCart.php" , "Item Deleted Successfully");
   }
   else{
      redirect("../index.php" , "Something went wrong");
   }
}

else if(isset($_POST['delete_all'])){
  $user_id = $_POST['user_id'];
  $sql = "DELETE FROM `cart` WHERE user_id = $user_id";
  $delete_item = mysqli_query($con , $sql) ;
  if($delete_item)
   {
      redirect("../yourCart.php" , "Items Deleted Successfully");
   }
   else{
      redirect("../index.php" , "Something went wrong");
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
      redirect("../yourCart.php" , "Item Update Successfully");
   }
   else{
      redirect("../yourCart.php" , "Something went wrong");
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
    redirect("../yourGift.php" , "Your Product Added To Favorite!");
}
else
{

     $sql = "INSERT INTO `favorite` (`id`, `user_id`, `product_id`, `name`, `description`, `price`, `image`)  VALUES (NULL,'$user_id', '$productId' , '$product_name' , '$description' , '$product_price', '$product_image');";
     $send_to_cart = mysqli_query($con , $sql) ;
     echo ($sql);
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

else if(isset($_POST['deleteFavorite'])){
   $favorite_id = $_POST['favorite_id'];
   $sql = "DELETE FROM `favorite` WHERE id = $favorite_id";
   $delete_item = mysqli_query($con , $sql) ;
   if($delete_item)
    {
       redirect("../yourFavorite.php" , "Item Deleted Successfully");
    }
    else{
       redirect("../index.php" , "Something went wrong");
    }
 }


else if(isset($_POST['addcartFavorite'])){
   if(isset($_SESSION['auth']))
 {
  $user_id = $_SESSION['auth_user']['user_id'];
  $productId = $_POST['product_id'];
  $product_qty = $_POST['qty'];
  
  
  $sql = "SELECT * FROM `cart` WHERE product_id = '$productId' AND user_id = '$user_id';";
  $check_cart = mysqli_query($con , $sql) ;
  if(mysqli_num_rows($check_cart) > 0 )
  {      
   redirect("../yourFavorite.php" , "Your Product Added To Cart!");
}
else
{
     $sql = "INSERT INTO `cart`(`id`, `user_id`, `product_id`, `qty`) VALUES (NULL,'$user_id','$productId','$product_qty');";

      $send_to_cart = mysqli_query($con , $sql) ;
       if($send_to_cart){
        redirect("../yourFavorite.php" ,"Product Added Successfully");
       }
         else
       {
          redirect("../index.php" , "Something went wrong");
       }
     }
   }
   else
   {
    redirect("../login.php" , "Login To Continue");
   }
}

else if(isset($_POST['addheartFavorite'])){
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
   redirect("../yourFavorite.php" , "Your Product Added To Favorite!");
}
else
{

    $sql = "INSERT INTO `favorite` (`id`, `user_id`, `product_id`, `name`, `description`, `price`, `image`)  VALUES (NULL,'$user_id', '$productId' , '$product_name' , '$description' , '$product_price', '$product_image');";
    $send_to_cart = mysqli_query($con , $sql) ;
    echo ($sql);
    if($send_to_cart){
       redirect("../yourFavorite.php","Product Added Successfully");
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

else if(isset($_POST['addcartIndrex'])){
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
   redirect("../index.php" , "Your Product Added To Cart!");
}
else
{
     $sql = "INSERT INTO `cart`(`id`, `user_id`, `product_id`, `qty`) VALUES (NULL,'$user_id','$productId','$product_qty');";

      $send_to_cart = mysqli_query($con , $sql) ;
       if($send_to_cart){
        redirect("../index.php" ,"Product Added Successfully");
       }
         else
       {
          redirect("../index.php" , "Something went wrong");
       }
     }
   }
   else
   {
    redirect("../login.php" , "Login To Continue");
   }
}

else if(isset($_POST['addheartIndrex'])){
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
   redirect("../index.php" , "Your Product Added To Favorite!");
}
else
{

    $sql = "INSERT INTO `favorite` (`id`, `user_id`, `product_id`, `name`, `description`, `price`, `image`)  VALUES (NULL,'$user_id', '$productId' , '$product_name' , '$description' , '$product_price', '$product_image');";
    $send_to_cart = mysqli_query($con , $sql) ;
    echo ($sql);
    if($send_to_cart){
       redirect("../index.php","Product Added Successfully");
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

else if(isset($_POST['addcartSearch'])){
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
   redirect("../search.php" , "Your Product Added To Cart!");
}
else
{
     $sql = "INSERT INTO `cart`(`id`, `user_id`, `product_id`, `qty`) VALUES (NULL,'$user_id','$productId','$product_qty');";

      $send_to_cart = mysqli_query($con , $sql) ;
       if($send_to_cart){
        redirect("../search.php" ,"Product Added Successfully");
       }
         else
       {
          redirect("../index.php" , "Something went wrong");
       }
     }
   }
   else
   {
    redirect("../login.php" , "Login To Continue");
   }
}

else if(isset($_POST['addheartSearch'])){
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
   redirect("../search.php" , "Your Product Added To Favorite!");
}
else
{

    $sql = "INSERT INTO `favorite` (`id`, `user_id`, `product_id`, `name`, `description`, `price`, `image`)  VALUES (NULL,'$user_id', '$productId' , '$product_name' , '$description' , '$product_price', '$product_image');";
    $send_to_cart = mysqli_query($con , $sql) ;
    echo ($sql);
    if($send_to_cart){
       redirect("../search.php","Product Added Successfully");
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
        redirect("../yourGift.php","Product Review Added Successfully");
      //   redirect("../product_view.php","Product Review Added Successfully");
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
//   }
?>
