<?php 
include_once('includes/header.php');
include_once('functions/userFunctions.php');



 ?>
  

<div class="heading-video">
    <div>
    <h1 class="head-h1">The Best GIFT</h1>
    <p class="head-p">Your gift is on us and the visit is on you.</p>
    <a href="./yourGift.php" class="btnCart" target="_blank">Discover More</a>
    </div>
 
    <video class="video-bg" autoplay muted loop>
    <source src="./assets/images/videos.mp4" type="video/mp4">
    </video>

</div>

<!-- category section starts  -->

<section class="category" id="category">
              
   <h1 class="heading">Our Category</h1>

   <div class="box-container">
   <?php
                    
                    $category = getAllActive("category");
                    // $sql="SELECT *FROM category";
                    // $category=mysqli_query($con,$sql);
                    if(mysqli_num_rows($category)> 0 )
                    {
                      foreach($category as $item)
                    {
                ?>

      <div class="box">
        <a href="gifts.php?category=<?= $item['slug']?>" target="_blank">
         <img src="./uploads/<?= $item['image']?>" alt="">
         <div class="content">
        <h3>Choose <?= $item['categoryName']?></h3>
      </div>
    </a>
    </div>
     
     <?php
                          }
                        }
                        else
                        {
                          redirect("index.php","Don't found");
                          // $_SESSION ['message']="Don't found";
                          // header('Location: ../index.php');
                        }
                    ?>
   </div>
  
</section>

<!-- category section ends  -->

<!-- newsletter section starts -->

<section class="Offers">

   <div class="Offers-container">
       <h3>Deal Of The Day</h3>
       <p>Upto 50% Off</p>
       <a href="#" class="btn" target="_blank">Discover More</a>
   </div>

</section>

<!-- newsletter section ends -->

<!-- prodcuts section starts  -->

<section class="products" id="product">

   <h1 class="heading"> ON SALE </h1>
 
   <div class="box-container">
   <?php
   $sql="SELECT *FROM product WHERE is_discount	='1' AND status='0'";
                    $product=mysqli_query($con,$sql);
                    if(mysqli_num_rows($product)> 0 )
                    {
                        foreach($product as $item)
                    {
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
           <span class="discount">-<?= $item['percent_discount']?>%</span>
           <div class="image">
               <img src="./uploads/<?= $item['imageMain']?>" alt="">
               <div class="icons">
                  <button name="addheartIndrex" class="cart-btn"><i class="fas fa-heart"></i></button>
                  <button name="addcartIndrex" class="cart-btn">Add Cart</button>
                  <a href="product_view.php?product=<?= $item['slug']?>" target="_blank"><i class="fas fa-eye"></i></a>
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
                        }
                        else
                        {
                            echo "Don't found" ;
                        //   redirect("login.php","Don't found");
                        //   $_SESSION ['message']="Don't found";
                        //   header('Location: ../category.php');
                        }
                    
                
                    ?>
       </div>
  
</section>

<!-- prodcuts section ends -->

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

<!-- header section ends -->
<?php include('includes/footer.php') ?>
