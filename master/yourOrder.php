<?php 
include_once('includes/header.php');
include_once('functions/userFunctions.php');
include_once('config/connect.php');

?>

<?php
   $sql = "SELECT * FROM `orders` ORDER BY order_id DESC LIMIT 1;";
   $check_order = mysqli_query($con , $sql);
   if(mysqli_num_rows($check_order)> 0){                                                             
     while($fetch_order_to_details = mysqli_fetch_array($check_order)){
       $last_id = $fetch_order_to_details['order_id'];
       $_SESSION['last_order']= $last_id;
       echo $last_id ;
      } }
      $_SESSION['last_order'] = $last_id;
      $sql = "SELECT * FROM `users` WHERE user_id= $user_id ;";
      $check_user = mysqli_query($con , $sql) ;
      $data_user = mysqli_fetch_array($check_user);
      $sql="SELECT 
      order_details.NameProduct,order_details.price,order_details.quantity,
      orders.fullName,orders.phone,orders.email,orders.location,orders.total_price,orders.location,orders.order_time,orders.delivery_time,orders.phone,orders.email
      FROM order_details INNER JOIN orders
      ON order_details.order_id=orders.order_id
      WHERE order_details.order_id ='$last_id'";
      $check_order = mysqli_query($con , $sql);
      $data = mysqli_fetch_array($check_order);
    // while($product = mysqli_fetch_array($check_order)){ 

      // _________________________________      ____-
      
      ?>
         <div class="col-md-12">   
    <div class="row">   
		
        <div class="order-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="orderFlex">
            <div class="row">
				<div class="order-header order-header-mid">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="order-right">
                            <h5>THE Best Gift</h5>
							<p><b>Mobile :</b>+962 796781246</p>
							<p><b>Email :</b>Gift@Gmail.Com</p>
							<p><b>Address :</b> Aqaba.Jordan</p>
						</div>
					
					</div>
				</div>
            </div>
           
			
			<div class="row">
				<div class="order-header order-header-mid">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="order-right">
                     
							<h5><?= $data['fullName']; ?> </h5>
							<p><b>Mobile :</b> <?= $data['phone']; ?></p>
							<p><b>Email :</b> <?= $data['email']; ?></p>
							<p><b>Address :</b> <?= $data['location']; ?></p>
         
						</div>
					
					</div>
				</div>
            </div>
    </div>
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Your GIFT</th>
							<th>Quantity</th>
                            <th>Price </th>
							
                        </tr>
                    </thead>
                    <tbody>
				
                        <tr>
                        <?php	
                    //   $data = mysqli_fetch_array($check_order);

                while($product = mysqli_fetch_array($check_order)){ 
                    $i=0 ;               
                    // foreach ($data as $product) {
                    ?>
                            <td class="col-md-9"><?= $product['NameProduct']; ?></td>
							<td class="col-md-3"> <?= $product['quantity']; ?></td>  
							<td class="col-md-3"> <?= " JD".$product['price']; ?></td>
                    <?php	}?>
                        </tr>
                        
                        <tr>
                           
                            <td class="text-right"><h2><strong>Total Price: </strong></h2></td>
                            <td class="text-left text-danger" colspan="2"><h2><strong> JD<?= $data['total_price']; ?></strong></h2></td>
                        </tr>

                    </tbody>
                </table>
            </div>
		<div class="orderFlex">
			<div class="row">
				<div class="order-header order-header-mid order-footer">
					<div class="col-xs-8 col-sm-8 col-md-8 text-right">
						<div class="order-footer">
							<p><b>Date :</b><?= $data['delivery_time']; ?></p>
							<!-- <h5 style="color: rgb(140, 140, 140);">Thanks for shopping.!</h5>
                            <a href="yourGift.php" class="option-btn">Continue Shopping</a> -->
						</div>
					</div>
				</div>
            </div>
            <div class="row">
				<div class="order-header order-header-mid order-footer">
					<div class="col-xs-8 col-sm-8 col-md-8 text-right">
						<div class="order-footer">
							<!-- <p><b>Date :</b><?= $data['delivery_time']; ?></p> -->
							<h5 style="color: rgb(140, 140, 140);">Thanks for shopping.!</h5>
                            <a href="yourGift.php" class="option-btn" >Continue Shopping</a>
						</div>
					</div>
				</div>
            </div>
		</div>
        </div>    
	</div>
</div>

    <!-- icons section starts  -->

    <section class="icons-container">

      <div class="icons">
          <img src="images/icon-1.png" alt="">
          <div class="info">
              <h3>We deliver it to you and to those you love.</h3>
          </div>
      </div>
   
      <div class="icons">
          <img src="images/icon-2.png" alt="">
          <div class="info">
              <h3>Your gift is ready within the required time.</h3>
          </div>
      </div>
   
      <div class="icons">
          <img src="images/icon-3.png" alt="">
          <div class="info">
              <h3>Offers and discounts on most gifts
            </h3>
          </div>
      </div>
   
      <div class="icons">
          <img src="images/icon-4.png" alt="">
          <div class="info">
              <h3>Warranty We shoot the gift to you before and after packaging.</h3>
          </div>
      </div>
     
   </section>
   
   <!-- icons section ends -->

<?php include('./includes/footer.php') ?>