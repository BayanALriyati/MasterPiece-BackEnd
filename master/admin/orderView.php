<?php 
//  session_start();
include_once ('includes/header.php');
include_once ('../middleware/adminMiddleware.php');
include_once ('../config/connect.php') ;
?>
<?php
                   if (isset($_SESSION ['message'])){
                  ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                       <strong>Hallo</strong> <?= $_SESSION ['message']; ?>
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                    <?php  
                        unset($_SESSION ['message']);
                       }
                     ?>
<?php 

if (isset($_GET['order'])){
    $order_id = $_GET['order'];
    $order_data = getByIdOrder("orders" , $order_id);
    $order = mysqli_fetch_array($order_data);
    if($order){
      
        $order_id = $order['order_id'];
        $_SESSION['order_id']= $order_id;
        ?> 

<div class="card mx-auto mt-4 shadow-lg rounded" style="width: 50rem;">
  <!-- <img src="..." class="card-img-top" alt="..."> -->
  <div class="card-body">
    <h5 class="card-title text-center">Order</h5>
      <p class="card-text text-dark fs-3"> placed on : <span class="card-text text-primary fs-4"><?= $order['order_time']; ?></span> </p>
      <p class="card-text text-dark fs-3"> Name : <span class="card-text text-primary fs-4"><?= $order['fullName']; ?></span> </p>
      <p class="card-text text-dark fs-3"> Number : <span class="card-text text-primary fs-4"><?= $order['phone']; ?></span> </p>
      <p class="card-text text-dark fs-3"> Location : <span class="card-text text-primary fs-4"><?= $order['location']; ?></span> </p>
      <p class="card-text text-dark fs-3"> Letter : <span class="card-text text-primary fs-4"><?= $order['letter']; ?></span> </p>
      <p class="card-text text-dark fs-3"> Gift Delivery Time : <span class="card-text text-primary fs-4"><?= $order['delivery_time']; ?></span> </p>
      <p class="card-text text-dark fs-3"> Total Products : <span class="card-text text-primary fs-4"><?= $order['total_products']; ?></span> </p>
      <p class="card-text text-dark fs-3"> Total Price : <span class="card-text text-primary fs-4"><?= $order['total_price']; ?> JOD</span> </p>
      <p class="card-text text-dark fs-3"> Payment Method : <span class="card-text text-primary fs-4"><?= $order['pay_method']; ?></span> </p>
      <?php 
            if ($order['pay_method'] == "Credit card"){
               ?>
                 <p class="card-text text-dark fs-3">credit information :<span class="card-text text-primary fs-4"><?= $order['credit_information']; ?></span></p>
               <?php
            } else {
               ?>
               <input type="hidden" name="credit_information" value="<?= $order['credit_information'];?>">
               <?php
            }
            ?>   
            <div class="text-center">
             <a href="orders.php" class="btn btn-primary">Go Back</a>
            </div>
  </div>
</div>
<?php
    //     }
    // }
    //     else
    //     {
    //         echo "Don't found" ;

    //     }
}

// else
// {
//     echo "Don't found" ;

// }
}
else{
echo "Something Went Wrong";

}

?>       

<?php
  include ('includes/footer.php');
?>