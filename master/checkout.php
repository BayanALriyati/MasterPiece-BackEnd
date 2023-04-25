<?php 
include_once('includes/header.php');
include_once('functions/userFunctions.php');

?>

<div class="heading-main">
    <h3>Checkout</h3>
    <p><a href="home.html">Home </a> <span> / Checkout</span></p>
 </div>
 <?php
if(isset($_SESSION['auth']))
{
?>

<section class="w-100 vh-150 mt-5" style="background:url(assets/images/heading-bg.jpg);">
     <div class="container">
  <div class="py-5">
  
  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted fs-1">Your cart</span>
        <span class="badge badge-secondary badge-pill">3</span>
      </h4>
      <ul class="list-group mb-3">
      <?php 
  $total_price = 0;
  $sub_total = 0;
  $cart_items[] = '';
  $items = getCartItems();
  if(mysqli_num_rows($items)> 0 )
{
  while($fetch_cart = mysqli_fetch_array($items)){
        $cart_items[] = ($fetch_cart['productName'].' ('.$fetch_cart['price'].' x '. $fetch_cart['qty'].') - ');
        $total_products = implode($cart_items);
//   if(mysqli_num_rows($items)> 0 )
// {
//    foreach($items as $item){

?>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
        <img src="./uploads/<?= $fetch_cart['imageMain']?>" alt="image" width="50" height="50"/>
          <div>
            <h6 class="my-5 ms-1 fs-2"><?= $fetch_cart['productName']?></h6>
            <!-- <small class="text-muted fs-4">Brief description</small> -->
          </div>
          <?php if ($fetch_cart['is_discount'] == 1){ ?>
                <span class="text-center my-5 fs-2">JD <?= $fetch_cart['price_discount']?></span>
               <?php } else { ?>
                <span class="text-center my-5 fs-2">JD<?= $fetch_cart['price']?></span> 
          <?php } ?>
          <span class="text-center my-5 fs-2"><span class="text-center my-5 fs-0" >x</span><?=$fetch_cart['qty'];?></span>

          <?php if ($fetch_cart['is_discount'] == 1){ ?>
               <input type="hidden" value="<?= $sub_total = ($fetch_cart['price_discount'] * $fetch_cart['qty']); ?>">
            <?php } else { ?>
                <input type="hidden" value="<?= $sub_total = ($fetch_cart['price'] * $fetch_cart['qty']); ?>">
          <?php } ?>
          <!-- <span class="text-muted my-3 fs-2">JD12</span> -->
        </li>
        
        <?php 
       $total_price += $sub_total;
       $total_products;
       }
      
      }else{
        echo '<p class="empty">your cart is empty</p>';
     }
      ?>
      <li class="list-group-item d-flex justify-content-between">
          <span class="my-3 fs-2">Total (JOD)</span>
          <strong class="my-3 fs-2"><?=
             $total_price
            ?></strong>
        </li>
      </ul>


        
      <form action="./functions/placeOrder.php" class="needs-validation" method="POST" enctype="multipart/form-data">  

      <!-- <form class="card p-3 my-3"> -->
        <div class="input-group">
          <div class="input-group-append card">
            <button type="submit" class="btn btn-secondary my-3 fs-2" name="placeOrder">place order</button>
          </div>
        </div>
      <!-- </form> -->
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
<!-- <form class="needs-validation" novalidate> -->

      <input type="hidden" name="total_products" value="<?= $total_products; ?>">
      <input type="hidden" name="total_price" value="<?= $total_price; ?>" >

        <div class="row">
          <div class="col-md-6 mb-5">
            <label for="firstName" class="fs-4">First name</label>
            <input type="text"  class="card form-control vh-10" name="firstName" placeholder="" value="" required>
          </div>
          <div class="col-md-6 mb-5">
            <label for="lastName" class="fs-4">Last name</label>
            <input type="text" class="card form-control vh-10" name="lastName" placeholder="" value="" required>
          </div>
        </div>

        <div class="mb-5">
          <label for="email" class="fs-4">Email</label>
          <input type="email" class="card form-control hvh-10" name="email" placeholder="you@example.com">
        </div>

        <div class="mb-5">
          <label for="username" class="fs-4">Phone</label>
          <div class="input-group">
            <input type="text" class="card form-control vh-10" name="phone" placeholder="0786324604" required>
          </div>
        </div>
      <div class="row">
      <div class="col-md-3 mb-5">
          <label for="address" class="fs-4">Flat Number</label>
          <input type="text" class="card form-control vh-10" name="flat" placeholder="12" required>
        </div>

        <div class="col-md-3 mb-5">
          <label for="address" class="fs-4">Street Name</label>
          <input type="text" class="card form-control vh-10" name="street" placeholder="Main Street" required>
        </div>

        <div class="col-md-3 mb-5">
          <label for="address2" class="fs-4">City</label>
          <input type="text" class="card form-control vh-10" name="city" placeholder="Aqaba">
        </div>  

        <div class="col-md-3 mb-5">
          <label for="address2" class="fs-4">Country</label>
          <input type="text" class="card form-control vh-10" name="country" placeholder="Jordan">
        </div> 
    </div>      
        <hr class="mb-4">
        <div class="mb-1">
          <label for="address" class="fs-4">Gift Delivery Time</label>
          <input type="datetime-local" class="card form-control vh-15 fs-3" name="time" id="datetime" placeholder="10-22-1995" required>
        </div>
        <div class="mb-5">
          <label for="address2" class="fs-4">Letter With Gift</label>
          <textarea id="letter" class="card form-control vh-10" name="letter" rows="4" cols="50">Write the letter here</textarea>
        </div> 

        <hr class="mb-4"> 
        <!-- <div class="col-md-4">
            <label for="" class="label">Select Method</label>
             <select name="category" class="form-select">
              <option selected>Select Method</option>
                        <option value="methodCredit">Credit card</option>
                        <option value="methodCash">Pay Cash</option>
            </select>
           </div>
        <div> -->
        <h4 class="mb-5">Payment</h4>
        <div class="row">
        <div class="col-md-6 d-block my-5">
        <!-- <label for="" class="label">Select Method</label> -->
             <select name="method" class="form-select method" id="mySelect" onchange="showInputBox()">
              <option selected>Select Method</option>
                        <option value="Credit card">Credit card</option>
                        <option value="Pay Cash">Pay Cash</option>
            </select>
          <!-- <div class="custom-control custom-radio" id="credit_card">
            <input id="credit_card" name="methodCredit" type="radio" checked class="custom-control-input" required>
            <label id="credit_card" class="custom-control-label h-100 fs-4" for="credit">Credit card</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="debit" name="methodCash" type="radio" class="custom-control-input" required>
            <label class="custom-control-label h-100 fs-4" for="debit">Pay Cash</label>
          </div> -->
          <!-- class="credit"  -->

          <div id="inputName"></div>
          <div id="inputCardNumber"></div>
          <div id="inputExpirationDate"></div>
          <div id="inputCVV"></div>
        </div>
       </div>
        <hr class="mb-4">
        </div>
    </form>
    </div>
  </div>
</div>
</section>
</main>
<?php
}
   else
   {
    redirect("./login.php","Login To Continue");
   }
  
?>
    <!-- icons section starts  -->

    <section class="icons-container">

      <div class="icons">
          <img src="assets/images/icon-1.png" alt="">
          <div class="info">
              <h3>We deliver it to you and to those you love.</h3>
          </div>
      </div>
   
      <div class="icons">
          <img src="assets/images/icon-2.png" alt="">
          <div class="info">
              <h3>Your gift is ready within the required time.</h3>
          </div>
      </div>
   
      <div class="icons">
          <img src="assets/images/icon-3.png" alt="">
          <div class="info">
              <h3>Offers and discounts on most gifts
            </h3>
          </div>
      </div>
   
      <div class="icons">
          <img src="assets/images/icon-4.png" alt="">
          <div class="info">
              <h3>Warranty We shoot the gift to you before and after packaging.</h3>
          </div>
      </div>
     
   </section>
   
   <!-- icons section ends -->

   <?php include('./includes/footer.php') ?>