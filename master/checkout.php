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
  $items = getCartItems();
  if(mysqli_num_rows($items)> 0 )
{
   foreach($items as $item){

?>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
        <img src="./uploads/<?= $item['imageMain']?>" alt="image" width="50" height="50"/>
          <div>
            <h6 class="my-5 ms-1 fs-2"><?= $item['productName']?></h6>
            <!-- <small class="text-muted fs-4">Brief description</small> -->
          </div>
          <?php if ($item['is_discount'] == 1){ ?>
                <span class="text-center my-5 fs-2">JD <?= $item['price_discount']?></span>
               <?php } else { ?>
                <span class="text-center my-5 fs-2">JD<?= $item['price']?></span> 
          <?php } ?>
          <span class="text-center my-5 fs-2"><span class="text-center my-5 fs-0" >x</span><?=$item['qty'];?></span>

          <?php if ($item['is_discount'] == 1){ ?>
               <input type="hidden" value="<?= $sub_total = ($item['price_discount'] * $item['qty']); ?>">
            <?php } else { ?>
                <input type="hidden" value="<?= $sub_total = ($item['price'] * $item['qty']); ?>">
          <?php } ?> 
          <!-- <span class="text-muted my-3 fs-2">JD12</span> -->
        </li>
        
        <?php 
       $total_price += $sub_total;
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


        
      
      <!-- <form class="card p-3 my-3"> -->
        <div class="input-group">
          <div class="input-group-append card">
            <button type="submit" class="btn btn-secondary my-3 fs-2">place order</button>
          </div>
        </div>
      <!-- </form> -->
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
      <form class="needs-validation" novalidate>
        <div class="row">
          <div class="col-md-6 mb-5">
            <label for="firstName" class="fs-4">First name</label>
            <input type="text"  class="card form-control vh-10" id="firstName" placeholder="" value="" required>
            <!-- <div class="invalid-feedback">
              Valid first name is required.
            </div> -->
          </div>
          <div class="col-md-6 mb-5">
            <label for="lastName" class="fs-4">Last name</label>
            <input type="text" class="card form-control vh-10" id="lastName" placeholder="" value="" required>
            <!-- <div class="invalid-feedback">
              Valid last name is required.
            </div> -->
          </div>
        </div>

        <!-- <div class="mb-5">
          <label for="username" class="fs-4">Username</label>
          <div class="input-group">
            <input type="text" class="card form-control vh-10" id="username" placeholder="Username" required>
            <div class="invalid-feedback" style="width: 100%;">
              Your username is required.
            </div>
          </div>
        </div> -->

        <div class="mb-5">
          <label for="email" class="fs-4">Email</label>
          <input type="email" class="card form-control hvh-10" id="email" placeholder="you@example.com">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>

        <div class="mb-5">
          <label for="address" class="fs-4">Address</label>
          <input type="text" class="card form-control vh-10" id="address" placeholder="1234 Main St" required>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

        <div class="mb-5">
          <label for="address2" class="fs-4">Address 2 <span class="text-muted">(Optional)</span></label>
          <input type="text" class="card form-control vh-10" id="address2" placeholder="Apartment or suite">
        </div>        
        <hr class="mb-4">

        <h4 class="mb-5">Payment</h4>

        <div class="d-block my-5">
          <div class="custom-control custom-radio">
            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
            <label class="custom-control-label h-100 fs-4" for="credit">Credit card</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label h-100 fs-4" for="debit">pay cash</label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-5">
            <label for="cc-name" class="fs-4">Name on card</label>
            <input type="text" class="card form-control vh-10" id="cc-name" placeholder="" required>
            <small class="text-muted fs-5">Full name as displayed on card</small>
            <div class="invalid-feedback">
              Name on card is required
            </div>
          </div>
          <div class="col-md-6 mb-5">
            <label for="cc-number" class="fs-4">Credit card number</label>
            <input type="text" class="card form-control vh-10" id="cc-number" placeholder="" required>
            <div class="invalid-feedback">
              Credit card number is required
            </div>
          </div>
        </div>
        <hr class="mb-4">
        <div class="mb-1">
          <label for="address" class="fs-4">Date & Time</label>
          <input type="datetime-local" class="card form-control vh-15 fs-4" id="datetime" placeholder="10-22-1995" required>
          <div class="invalid-feedback">

            Please enter your gift delivery time.
          </div>
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