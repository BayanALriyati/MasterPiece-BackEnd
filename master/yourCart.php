<?php 
include_once('includes/header.php');
include_once('functions/userFunctions.php');

?>

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
$total_price = 0;
$sub_total = 0;
$items = getCartItems();
if(mysqli_num_rows($items)> 0 )
{
   foreach($items as $item){

?>
      <tr>
      <form action="./functions/handleAdd.php" method="POST" enctype="multipart/form-data">  

        <td>
        <div class="cart-info">

            <input type="hidden" name="cart_id" value="<?= $item['id']; ?>">
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
        <form action="./functions/handleAdd.php" method="POST" enctype="multipart/form-data">  

          <div class="input-group mb-3">
            <input type="number" name="qty" class="qty" min="1" max="99" value="<?=$item['qty'];?>">
            <!-- <buton type="button" class="input-group-text decrement-btn">-</buton>
            <input type="text" class="form-control input-qty" name="qty" value="<?= $item['qty']?>">
            <buton type="button" class="input-group-text increment-btn">+</buton> -->
            <input type="hidden" name="cart_id" value="<?= $item['id']; ?>">
            <input type="hidden" name="user_id" value="<?= $item['user_id']; ?>">
            <div class="cart-btn">
            <button type="submit" class="input-group-text cart-btn" name="update_qty"><i class="fa-solid fa-pen"></i></button>
            </div>
          </div>
            <!-- <button type="submit" class="btnCart" name="delete" value="<?= $item['id']; ?>" onclick="return confirm('Delete This From Cart?');"><i class="fa-sharp fa-solid fa-rectangle-xmark"></i></button></td>  -->
        </form>
         <!-- <div class="cart-btn">
            <button type="submit" class="input-group-text cart-btn" name="update_qty"><i class="fa-solid fa-pen"></i></button>
           </div>
         </div> -->
        
        </td>
        <td>
         <div class="cart-sub">
           <?php if ($item['is_discount'] == 1){ ?>
                  <span>JD<?= $sub_total = ($item['price_discount'] * $item['qty']); ?></span>
               <?php } else { ?>
                  <span>JD<?= $sub_total = ($item['price'] * $item['qty']); ?></span>
                <?php } ?>   
           </div>          
        </td>
        
        <td>
        <form action="./functions/handleAdd.php" method="POST" enctype="multipart/form-data">  
            <input type="hidden" name="user_id" value="<?= $item['user_id']; ?>">
            <button type="submit" class="btnCart" name="delete" value="<?= $item['id']; ?>" onclick="return confirm('Delete This From Cart?');"><i class="fa-sharp fa-solid fa-rectangle-xmark"></i></button></td> 
        </form> 
          </tr>
          <?php 
       $total_price += $sub_total;
       }
      }else{
        echo '<p class="empty">your cart is empty</p>';
     }
      ?>
    </table>      
    
    <!-- <a href="./yourGift.html" target="_blank" class="btnCart">CONTINUE SHOPPING</a> -->

    <div class="total-price">
        <div >
      <table class="table">
        <tr>
          <td class="total1">Total</td>
          <td class="total">
            <?=
             $total_price
            ?>
            JD
          </td>
        </tr>
      </table>
      <div class="total_btn">
      <form action="./functions/handleAdd.php" method="POST" enctype="multipart/form-data">  
            <input type="hidden" name="user_id" value="<?= $item['user_id']; ?>">
            <a type="submit" class="btnCart" name="delete_all" onclick="return confirm('Delete This From Cart?');">Delete All Item</a></td> 
      </form> 
      <!-- <a href="./functions/handleAdd.php" name="delete_all"  class="btnCart <?= ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('delete all from cart?');">delete all item</a> -->

      <!-- <a href="yourGift.php" class="btnCart <?= ($total_price > 1)?'':'disabled'; ?>" target="_blank">Delete All Item</a> -->
        <!-- <a href="./yourGift.html" target="_blank" class="btnCart">Delete All Item</a> -->
        <a href="./yourGift.php" target="_blank" class="btnCart">Continue Shopping</a>
        <a href="checkout.php" target="_blank" class="btnCart">Proceed To Checkout</a>
      </div>
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
