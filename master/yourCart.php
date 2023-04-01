<?php 
include_once('includes/header.php');
include_once('functions/userFunctions.php');

?>
<!-- function getCartItems($table){
    global $con;
    $user_id = $_SESSION['auth_user']['user_id'];
    $sql = "SELECT * FROM `cart` INNER JOIN `product` ON cart.product_id = product.product_id AND cart.user_id = '$user_id' ORDER BY cart.id DESC";
    return $sql_run=mysqli_query($con,$sql);
} -->
<div class="heading-main">
    <h3>Your Cart</h3>
    <p><a href="index.php">home </a> <span> / Your Cart</span></p>

  </div>

<!-- Cart Items -->
<?php
if(isset($_SESSION['auth']))
{
?>
  <div class="container cart">
    <table>
      <tr>
        <th>Product</th>
        <th>Quantity</th>
        <th>Subtotal</th>
        <th>Remove</th>
      </tr>
<?php 
    $items = getCartItems();

    foreach($items as $item){
      // echo $item['productName'];
    
?>
      <tr>
        <td>
          <div class="cart-info">
            <img src="./uploads/<?= $item['imageMain']?>" alt="" />
            <div>
              <p><?= $item['productName']?></p>
              <?php if ($item['is_discount'] == 1){ ?>
                <span>JD <?= $item['price_discount']?></span>
               <?php } else { ?>
                <span>JD<?= $item['price']?></span> <?php } ?> 
                <br />
            </div>
          </div>
        </td>
        <td>
        <div class="input-group mb-3">
            <buton type="button" class="input-group-text decrement-btn">-</buton>
            <input type="text" class="form-control input-qty" name="qty" value=<?= $item['qty']?>>
            <buton type="button" class="input-group-text increment-btn">+</buton>
         </div>
          <!-- <input type="number" value="1" min="1" /> -->
        </td>
        <td>$50.00</td>
        <td><a href="#" class="btnCart"><i class="fa-sharp fa-solid fa-rectangle-xmark"></i></a></td>
         </tr>
       <!-- <tr>
           <td>
            <div class="cart-info">
             <img src="./images/card/card2.jpg" alt="" />
             <div>
              <p>Bambi Print Mini Backpack</p>
              <span>Price: $900.00</span>
              <br />
              <a href="#">remove</a>
            </div>
          </div>
          </td>
          <td><input type="number" value="1" min="1" /></td>
          <td>$90.00</td>
      </tr> -->
<?php 
    }
?>
      <!-- <tr>
        <td>
          <div class="cart-info">
            <img src="./images/gifts/gift2.jpg" alt="" />
            <div>
              <p>Bambi Print Mini Backpack</p>
              <t>Price: $700.00</t>
              <br />
              <a href="#">remove</a>
            </div>
          </div>
        </td>
        <td><input type="number" value="1" min="1" /></td>
        <td>$60.00</td>
      </tr>
      <tr>
        <td>
          <div class="cart-info">
            <img src="./images/Chocolate/Chocolate2.jpg" alt="" />
            <div>
              <p>Bambi Print Mini Backpack</p>
              <span>Price: $600.00</span>
              <br />
              <a href="#">remove</a>
            </div>
          </div>
        </td>
        <td><input type="number" value="1" min="1" /></td>
        <td>$60.00</td>
      </tr>
      <tr>
        <td>
          <div class="cart-info">
            <img src="./images/flower/flower1-remove.png" alt="" />
            <div>
              <p>Bambi Print Mini Backpack</p>
              <span>Price: $600.00</span>
              <br />
              <a href="#">remove</a>
            </div>
          </div>
        </td>
        <td><input type="number" value="1" min="1" /></td>
        <td class="price">$60.00</td>
      </tr> -->
    </table>      
    <a href="./yourGift.html" target="_blank" class="btnCart">CONTINUE SHOPPING</a>

    <div class="total-price">
        <div >
      <table class="table">
        <tr>
          <td>Subtotal</td>
          <td>$200</td>
        </tr>
        <tr>
          <td>Tax</td>
          <td>$50</td>
        </tr>
        <tr>
          <td>Total</td>
          <td>$250</td>
        </tr>
      </table>
        <a href="./Checkout.html" target="_blank" class="btnCart">Proceed To Checkout</a>
    </div>
  </div>
  </div>
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
