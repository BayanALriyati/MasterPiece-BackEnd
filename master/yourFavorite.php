<?php 
include_once('includes/header.php');
include_once('functions/userFunctions.php');

?>

<?php
if(isset($_SESSION['auth']))
{
?>

<section class="products-shop" id="products-shop">

    <h1 class="heading-shop"> <span>Choose Gifts</span> </h1>

    <a href="./yourGift.html" class="btnCart" target="_blank">View All</a>
    

    <div class="swiper products-slider">
    
        <div class="swiper-wrapper">
        
            <div class="swiper-slide box">
            <?php 

$items = getAllFavorite("favorite" , "id");
if(mysqli_num_rows($items)> 0 )
{
   foreach($items as $item){

?>
                <div class="box">
                
                    <span class="discount">-30%</span>
                    <div class="image">
                        <img src="./uploads/<?= $item['image']?>" alt="">
                        <div class="icons">
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="cart-btn">add to cart</a>
                            <a href="./view.html" class="fas fa-share"></a>
                        </div>
                    </div>
                    <div class="content">
                        <h3><?= $item['name']?></h3>
                        <div class="price"> JD<?= $item['price']; ?> </div>
                    </div>
                    
                </div>
                <?php 
       }
      }else{
        echo '<p class="empty">your cart is empty</p>';
     }
      ?>
            </div>

            <!-- <div class="swiper-slide box">
                <div class="box">
                    <span class="discount">-30%</span>
                    <div class="image">
                        <img src="images/gifts/gift2.jpg" alt="">
                        <div class="icons">
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="cart-btn">add to cart</a>
                            <a href="./view.html" class="fas fa-share"></a>
                        </div>
                    </div>
                    <div class="content">
                        <h3>gift Woman</h3>
                        <div class="price"> JOD21 <span>JOD30</span> </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="box">
                    <span class="discount">-30%</span>
                    <div class="image">
                        <img src="images/gifts/gift3.jpg" alt="">
                        <div class="icons">
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="cart-btn">add to cart</a>
                            <a href="./view.html" class="fas fa-share"></a>
                        </div>
                    </div>
                    <div class="content">
                        <h3>gift Woman</h3>
                        <div class="price"> JOD21 <span>JOD30</span> </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="box">
                    <span class="discount">-30%</span>
                    <div class="image">
                        <img src="images/gifts/gift4.jpg" alt="">
                        <div class="icons">
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="cart-btn">add to cart</a>
                            <a href="./view.html" class="fas fa-share"></a>
                        </div>
                    </div>
                    <div class="content">
                        <h3>gift Woman</h3>
                        <div class="price"> JOD21 <span>JOD30</span> </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="box-container ">
             
                    <div class="box">
                        
                        <div class="image">
                            <img src="images/gifts/gift5.jpg" alt="">
                            <div class="icons">
                                <a href="#" class="fas fa-heart"></a>
                                <a href="#" class="cart-btn">add to cart</a>
                                <a href="./view.html" class="fas fa-share"></a>
                            </div>
                        </div>
                        <div class="content">
                            <h3>Gift man</h3>
                            <div class="price"> JOD21 </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="box-container ">
             
                    <div class="box">
                        
                        <div class="image">
                            <img src="images/gifts/gift5.jpg" alt="">
                            <div class="icons">
                                <a href="#" class="fas fa-heart"></a>
                                <a href="#" class="cart-btn">add to cart</a>
                                <a href="./view.html" class="fas fa-share"></a>
                            </div>
                        </div>
                        <div class="content">
                            <h3>Gift man</h3>
                            <div class="price"> JOD21 </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="box">
                    
                    <div class="image">
                        <img src="images/gifts/gift7.jpg" alt="">
                        <div class="icons">
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="cart-btn">add to cart</a>
                            <a href="./view.html" class="fas fa-share"></a>
                        </div>
                    </div>
                    <div class="content">
                        <h3>Gift man</h3>
                        <div class="price"> JOD21 <span>JOD30</span> </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="box">
                
                    <div class="image">
                        <img src="images/gifts/gift8.jpg" alt="">
                        <div class="icons">
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="cart-btn">add to cart</a>
                            <a href="./view.html" class="fas fa-share"></a>
                        </div>
                    </div>
                    <div class="content">
                        <h3>gift Woman</h3>
                        <div class="price"> JOD21  </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="box">
                
                    <div class="image">
                        <img src="images/gifts/gift9.jpg" alt="">
                        <div class="icons">
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="cart-btn">add to cart</a>
                            <a href="./view.html" class="fas fa-share"></a>
                        </div>
                    </div>
                    <div class="content">
                        <h3>gift Woman</h3>
                        <div class="price"> JOD21 </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="box">
                
                    <div class="image">
                        <img src="images/gifts/gift10.jpg" alt="">
                        <div class="icons">
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="cart-btn">add to cart</a>
                            <a href="./view.html" class="fas fa-share"></a>
                        </div>
                    </div>
                    <div class="content">
                        <h3>Gift men</h3>
                        <div class="price"> JOD21 </div>
                    </div>
                </div>
            </div> -->

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        
    </div>
    
</section>
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
