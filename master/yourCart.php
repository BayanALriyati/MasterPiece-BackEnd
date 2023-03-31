<?php 
include_once('includes/header.php');
include_once('functions/userFunctions.php');

?>

<div class="heading-main">
    <h3>Your Cart</h3>
    <p><a href="home.html">home </a> <span> / Your Cart</span></p>
 </div>

<!-- Cart Items -->
  <div class="container cart">
    <table>
      <tr>
        <th>Product</th>
        <th>Quantity</th>
        <th>Subtotal</th>
      </tr>
      <tr>
        <td>
          <div class="cart-info">
            <img src="./images/box/Packaging2.jpg" alt="" />
            <div>
              <p>Bambi Print Mini Backpack</p>
              <span>Price: $500.00</span>
              <br />
              <a href="#">remove</a>
            </div>
          </div>
        </td>
        <td><input type="number" value="1" min="1" /></td>
        <td>$50.00</td>
      </tr>
      <tr>
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
      </tr>
      <tr>
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
      </tr>
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
