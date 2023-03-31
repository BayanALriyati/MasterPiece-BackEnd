
<?php
include_once ('../config/connect.php');
include_once ('../functions/authCode.php');

 
if(isset($_POST['addTOcart'])){
        if(isset($_SESSION['auth']))
      {
       $user_id = $_SESSION['auth_user']['user_id'];
       $productId = $_POST['product_id'];
       $product_name = $_POST['name'];
       $product_price = $_POST['price'];
       $product_image = $_POST['image'];
       $product_qty = $_POST['qty'];
       $sql = "INSERT INTO cart (user_id , product_id , product_name , product_price , product_image , product_qty)
       VALUES ('$user_id', '$productId' , '$product_name' , '$product_price','$product_image' , '$product_qty');";
    
//        $send_to_cart = mysqli_query($con , $sql) ;
//        echo mysqli_error($send_to_cart);
       if ($con->query($sql) === TRUE) {
        $_SESSION ['message'] = "Product Added Successfully";
        header('Location: ../product_view.php');
} else {
	echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
header("Location: ../index.php", TRUE, 301);
exit();
//        if($send_to_cart){
//         // move_uploaded_file($image_tmp_name , $image_folder);
//           $_SESSION ['message'] = "Product Added Successfully";
//           header('Location: ../product_view.php');
//      }
//      else
//      {
//           $_SESSION ['message'] = "Something went wrong";
//           header('Location: ../index.php');
//      }
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
?>


