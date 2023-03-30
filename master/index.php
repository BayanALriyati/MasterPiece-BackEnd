<?php 
include_once('includes/header.php');
include_once('functions/userFunctions.php');



 ?>
  <!-- <div> 

    <div class="container">
        <div class="row">
            <div class="col-md-12">
      <?php
         if (isset($_SESSION ['message'])){
      ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
           <strong>Hallo</strong> <?= $_SESSION ['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
           <?php  
              unset($_SESSION ['message']);
              }
            ?>
          </div>
        </div>
     </div>
   </div> -->

<div class="heading-video">
    <div>
    <h1 class="head-h1">The Best GIFT</h1>
    <p class="head-p">Your gift is on us and the visit is on you.</p>
    <a href="./yourGift.html" class="btnCart" target="_blank">Discover More</a>
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
        <a href="gifts.php?category=<?= $item['slug']?>">
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
                          // header('Location: ../category.php');
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
       <a href="#" class="btn">Discover More</a>
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
           <span class="discount">-<?= $item['percent_discount']?>%</span>
           <div class="image">
               <img src="./uploads/<?= $item['imageMain']?>" alt="">
               <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="./yourCart.html" class="cart-btn">add to cart</a>
                    <a href="./view.html" class="fas fa-share"></a>
               </div>
           </div>
           <div class="content">
               <h3><?= $item['productName']?></h3>
               <?php if ($item['is_discount'] == 1){ ?>
               <div class="price"> JOD<?= $item['price_discount']?> <span>JOD<?= $item['price']?></span> </div>
               <?php } else { ?>
                  <div class="price"> JD<?= $item['price']?></div> 
               <?php } ?>
              </div>
       </div>
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
