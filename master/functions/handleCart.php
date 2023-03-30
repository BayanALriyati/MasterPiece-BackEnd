

<?php
include_once ('../config/connect.php');
include_once ('../functions/authCode.php');
 
if(isset($_POST['addTOcart'])) {
    $user_id = $_SESSION['auth_user']['user_id'];
    $productId = $_POST['product_id'];
    $product_name = $_POST['name'];
    $product_price = $_POST['price'];
    
    $product_image = $_POST['image'];
    $product_qty = 2 ;
    $sql = 
    $sql = "INSERT INTO cart (user_id, product_id, product_name, product_price, product_image, product_qty)
            VALUES ('$user_id', '$productId', '$product_name', '$product_price', '$product_image', '$product_qty')";
    $result = mysqli_query($con, $sql);
    echo mysqli_error($result);

   //  if(mysqli_query($con, $sql)) {
   //      $_SESSION['message'] = "Product added successfully";
   //      header('Location: ../product_view.php');
   //  } else {
   //      $_SESSION['message'] = "Something went wrong";
   //      header('Location: ../index.php');
   //  }
}
?>

<?php 
include_once ('../includes/footer.php');

?>
