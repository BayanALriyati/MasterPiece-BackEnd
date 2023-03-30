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




   
<div class="heading-main">
    <h3>About Us</h3>
    <p><a href="./index.html">home </a> <span> / About Us</span></p>
 </div>

 <section class="about">

  <div class="flexAbout">

     <div class="image">
        <img src="./assets/images/gift-bg1.jpeg" alt="" width="10rem" height=""> 
     </div>

     <div class="contentAbout">
        <h3>Who Are We?</h3>
        <p> Your perfect choice for gifting, choose your ready-made gift or make it specially for you gifts for individuals and companies, 
          gifts for women and men, gifts for all occasions birthday, marriage, graduation, birthday and others, and you can deliver it to 
          the gift.</p>
        <a href="./contactUs.html" class="btn">contact us</a>
     </div>

  </div>

</section>

<section class="reviews">

  <h1 class="title">client's reviews</h1>

  <div class="box-reviews">

     <div class="boxReview">
        <img src="./assets/images/pic-1.png" alt="">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia. Ducimus repudiandae dolore placeat.</p>
        <div class="stars">
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star-half-alt"></i>
        </div>
        <h3>john deo</h3>
     </div>

     <div class="boxReview">
        <img src="./assets/images/pic-2.png" alt="">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia. Ducimus repudiandae dolore placeat.</p>
        <div class="stars">
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star-half-alt"></i>
        </div>
        <h3>john deo</h3>
     </div>

     <div class="boxReview">
        <img src="./assets/images/pic-3.png" alt="">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia. Ducimus repudiandae dolore placeat.</p>
        <div class="stars">
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star-half-alt"></i>
        </div>
        <h3>john deo</h3>
     </div>
 
  </div>

</section>

<section class="team">

  <h1 class="title">Our Team</h1>

  <div class="box-team">

     <div class="boxTeam">
        <img src="./assets/images/team-1.jpg" alt="">
        <div class="share">
           <a href="https://www.facebook.com/" target="blank"class="fab fa-facebook-f"></a>
           <a href="https://twitter.com/" target="blank" class="fab fa-twitter"></a>
           <a href="https://www.instagram.com/" target="blank"class="fab fa-instagram"></a>
           <a href="https://web.whatsapp.com/" target="_blank" class="fab fa-whatsapp"></a>
        </div>
        <h3>Ahmad</h3>
     </div>

     <div class="boxTeam">
        <img src="./assets/images/team-2.jpg" alt="">
        <div class="share">
           <a href="https://www.facebook.com/" target="blank" class="fab fa-facebook-f"></a>
           <a href="https://twitter.com/"      target="blank" class="fab fa-twitter"></a>
           <a href="https://www.instagram.com/" target="blank" class="fab fa-instagram"></a>
           <a href="https://web.whatsapp.com/" target="_blank" class="fab fa-whatsapp"></a>
        </div>
        <h3>Fatima</h3>
     </div>

     <div class="boxTeam">
        <img src="./assets/images/team-3.jpg" alt="">
        <div class="share">
           <a href="https://www.facebook.com/" target="blank" class="fab fa-facebook-f"></a>
           <a href="https://twitter.com/" target="blank" class="fab fa-twitter"></a>
           <a href="https://www.instagram.com/" target="blank" class="fab fa-instagram"></a>
           <a href="https://web.whatsapp.com/" target="_blank" class="fab fa-whatsapp"></a>
        </div>
        <h3>Nu`man</h3>
     </div>

  </div>

</section>

    <!-- icons section starts  -->

    <section class="icons-container">

        <div class="icons">
            <img src="./assets/images/icon-1.png" alt="">
            <div class="info">
                <h3>We deliver it to you and to those you love.</h3>
            </div>
        </div>
     
        <div class="icons">
            <img src="./assets/images/icon-2.png" alt="">
            <div class="info">
                <h3>Your gift is ready within the required time.</h3>
            </div>
        </div>
     
        <div class="icons">
            <img src="./assets/images/icon-3.png" alt="">
            <div class="info">
                <h3>Offers and discounts on most gifts
              </h3>
            </div>
        </div>
     
        <div class="icons">
            <img src="./assets/images/icon-4.png" alt="">
            <div class="info">
                <h3>Warranty We shoot the gift to you before and after packaging.</h3>
            </div>
        </div>
       
     </section>
     
     <!-- icons section ends -->

<!-- header section ends -->
<?php include('includes/footer.php') ?>
