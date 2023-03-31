
<?php
include_once ('../config/connect.php');
include_once ('../functions/authCode.php');

 
if(isset($_POST['addTOcart'])){
    if(isset($_SESSION['auth']))
  {
//     if(isset($_SESSION['auth_user']))
// {
   $user_id = $_SESSION['auth_user']['user_id'];
   $productId = $_POST['product_id'];
   $product_name = $_POST['name'];
   $product_qty = $_POST['qty'];
   $product_price = $_POST['price'];
   $product_image = $_POST['image'];
   
 
   $sql = "INSERT INTO `carts`(`id`, `user_id`, `product_id`, `name`, `qty`, `price`, `image`) VALUES (NULL,'$user_id','$productId','$product_name','$product_qty','$product_price','$product_image');";
 
   $send_to_cart = mysqli_query($con , $sql) ;
   if($send_to_cart){
    // move_uploaded_file($image_tmp_name , $image_folder);
      $_SESSION ['message'] = "Product Added Successfully";
      header('Location: ../product_view.php');
 }
 else
 {
      $_SESSION ['message'] = "Something went wrong";
      header('Location: ../index.php');
 }
}
   else
   {
       $_SESSION ['message']="Don't found";
       header('Location: ../login.php');
    // echo 401 ;
    // http_response_code(401);

// }
}
}
else if(isset($_POST['addTOheart'])){
  if(isset($_SESSION['auth']))
{
//     if(isset($_SESSION['auth_user']))
// {
 $user_id = $_SESSION['auth_user']['user_id'];
 $productId = $_POST['product_id'];
 $product_name = $_POST['name'];
 $product_price = $_POST['price'];
//  $product_image = $_POST['image'];

 $product_image = $_FILES['image']['name'];
 $image_size = $_FILES['image']['size'];
 $image_tmp_name = $_FILES['image']['tmp_name'];
 $image_folder = '../Uploads/'.$product_image;

$sql = "INSERT INTO `wishlist`(`id`, `user_id`, `product_id`, `name`, `price`, `image`) VALUES (NULL,'$user_id', '$productId' , '$product_name' , '$product_price','$product_image');";
 $send_to_cart = mysqli_query($con , $sql) ;
 echo ($sql);
 if($send_to_cart){
  move_uploaded_file($image_tmp_name , $image_folder);
  redirect("../product_view.php","Product Added Successfully");

    // $_SESSION ['message'] = "Product Added Successfully";
    // header('Location: ../product_view.php');
}
else
{
  redirect("../index.php","Something went wrong");
    // $_SESSION ['message'] = "Something went wrong";
    // header('Location: ../index.php');
}
}
 else
 {
     $_SESSION ['message']="Don't found";
     header('Location: ../login.php');
}
}

?>


