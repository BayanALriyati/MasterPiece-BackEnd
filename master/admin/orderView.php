<?php 
//  session_start();
include_once ('includes/header.php');
include_once ('../middleware/adminMiddleware.php');
include_once ('../config/connect.php') ;
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

<section class="orders">

 <h1 class="heading">placed orders</h1>

<div class="box-container">

   <div class="box">
      <p> placed on : <span><?= $order['order_time']; ?></span> </p>
      <p> Name : <span><?= $order['fullName']; ?></span> </p>
      <p> Number : <span><?= $order['phone']; ?></span> </p>
      <p> Location : <span><?= $order['location']; ?></span> </p>
      <p> Letter : <span><?= $order['letter']; ?></span> </p>
      <p> Gift Delivery Time : <span><?= $order['delivery_time']; ?></span> </p>
      <p> Total Products : <span><?= $order['total_products']; ?></span> </p>
      <p> Total Price : <span><?= $order['total_price']; ?> JOD</span> </p>
      <p> Payment Method : <span><?= $order['pay_method']; ?></span> </p>
      <?php 
            if ($order['pay_method'] == "Credit card"){
               ?>
                 <p>credit information :<span><?= $order['credit_information']; ?></span></p>
               <?php
            } else {
               ?>
               <input type="hidden" name="credit_information" value="<?= $order['credit_information'];?>">
               <?php
            }
            ?>
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

</section>


        

<?php
  include ('includes/footer.php');
?>