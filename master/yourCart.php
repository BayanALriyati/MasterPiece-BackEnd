<?php 
include_once('includes/header.php');
include_once('functions/userFunctions.php');

?>
<?php  
                     if (isset($_SESSION ['message'])){
                  ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                         <?= $_SESSION ['message']; ?>
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                    <?php  
                        unset($_SESSION ['message']);
                       }
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


  <div class="container cart" id="delete_all">
  
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
            <input type="hidden" name="cart_id" value="<?= $item['id']; ?>">
            <input type="hidden" name="user_id" value="<?= $item['user_id']; ?>">
            <div class="cart-btn">
            <button type="submit" class="input-group-text cart-btn" name="update_qty"><i class="fa-solid fa-pen"></i></button>
            </div>
          </div>
        </form>        
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
            <input type="hidden" name="cart_id" value="<?= $item['id']; ?>">
            <button type="submit" class="btnDelete" name="btnDelete" value="<?= $item['id']; ?>"><i class="fa-sharp fa-solid fa-rectangle-xmark"></i></button></td> 
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
            <input type="hidden" name="cart_id" value="<?= $item['id']; ?>">
            <input type="hidden" name="user_id" value="<?= $item['user_id']; ?>">
            <button type="submit" class="btnCartDelete" name="btnCartDelete" value="<?= $item['user_id'];?>">Delete All Item</button>
      </form> 
      <!-- onclick="return confirm('Delete All From Cart?');" -->
        <a href="./yourGift.php" target="_blank" class="btnCartDelete">Continue Shopping</a>
        <a href="checkout.php" target="_blank" class="btnCartDelete">Proceed To Checkout</a>
      </div>
      
    </div>
  </div>
  </div>
  <?php
}
   else
   {
    // redirect("./login.php","Login To Continue");
    $_SESSION ['message']="Login To Continue";
    header('Location: login.php');
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
