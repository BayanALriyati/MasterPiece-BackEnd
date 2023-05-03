<?php 
include_once('includes/header.php');
include_once('functions/userFunctions.php');

?>

<?php
if(isset($_SESSION['auth']))
{
?>

<div class="heading-main">
    <h3>Your Favorite</h3>
    <p><a href="index.php" target="_blank">home </a> <span> / Your Favorite</span></p>

</div>

<!-- prodcuts section starts  -->

<section class="products" id="product">

   <div class="box-container">
   <?php 

$items = getHeartItems();
if(mysqli_num_rows($items)> 0 )
{
   foreach($items as $item){

?>

       <div class="box">
       <form class="form-view" action="./functions/handleAdd.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="description" value="<?= $item['description']; ?>">
            <input type="hidden" name="product_id" value="<?= $item['product_id']; ?>">
            <input type="hidden" name="name" value="<?= $item['productName']; ?>">
            <?php 
            if ($item['is_discount'] == 1){
               ?>
               <input type="hidden" name="price" value="<?=$item['price_discount'];?>">
               <?php
            } else {
               ?>
               <input type="hidden" name="price" value="<?=$item['price'];?>">
               <?php
            }
            ?>     
            <input type="hidden" name="image" value="<?= $item['imageMain']; ?>">
            <div class="flexCard">
            <?php 
                 if ($item['is_discount'] == 1){
                    ?>
                       <div class="discount">-<?= $item['percent_discount']?>%</div>
                    <?php
                 } else {
                    ?>
                    <input type="hidden" name="price" value="<?=$item['percent_discount'];?>">
                    <?php
                 }

                 ?>
                 <form action="./functions/handleAdd.php" method="POST" enctype="multipart/       form-data">  
                     <input type="hidden" name="user_id" value="<?= $item['user_id']; ?>">
                     <input type="hidden" name="favorite_id" value="<?= $item['id']; ?>">
                     <button type="submit" name="deleteFavorite" value="<?= $item['id']; ?>" onclick="return confirm('Delete This From Cart?');"><i class="fa-sharp fa-solid fa-rectangle-xmark"></i></button></td> 
                 </form> 
        </div>
           <div class="image">
               <img src="./uploads/<?= $item['imageMain']?>" alt="Image">
               <div class="icons">
                  <button name="addHeartFavorite" class="cart-btn"><i class="fas fa-heart"></i></button>
                  <button name="addCartFavorite" class="cart-btn">Add Cart</button>
                  <a href="product_view.php?product=<?= $item['slug']?>" target="_blank"><i class="fas fa-share"></i></a>
               </div>
           </div>
           <div class="content">
              <div class="itemProduct">
                  <h3><?= $item['productName']?></h3>
                  <input type="number" name="qty" class="qtyMain" min="1" max="99"  value="1">
                </div>
               <?php if ($item['is_discount'] == 1){ ?>
               <div class="price"> JOD<?= $item['price_discount']?> <span>JOD<?= $item['price']?></span> </div>
                <?php } else { ?>
                  <div class="price"> JD<?= $item['price']?></div> 
               <?php } ?>           
           </div>
       </div>
       </form>
       <?php 
       }
      }else{
        echo '<p class="empty">your cart is empty</p>';
     }
      ?>
   </div>

</section>

<?php
     }
        else
        {
         // redirect("./login.php","Login To Continue");
          $_SESSION ['message']="Login To Continue";
          header('Location: login.php');
        }
       
     ?> 

<!-- prodcuts section ends -->



    
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
