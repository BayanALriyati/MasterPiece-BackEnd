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
      <h3>Contact Us</h3>
      <p><a href="./index.html">home </a> <span> / Contact Us</span></p>
   </div>
    
    <!--Section: Contact v.2-->
<section class="my-5 border ">
  <!--Section description-->
  <p class="text-center w-responsive mx-auto mb-5 fs-3 text-danger-emphasis">Do you have any 
      questions? Please do not hesitate 
      to contact us directly. Our team will come back to you within
      a matter of hours to help you.</p>

  <div class="row">

       <!--Grid column-->
       <div class="col-md-3 text-center my-2">
        <ul class="list-unstyled mb-0">
            <li><i class="fas fa-map-marker-alt my-2 fa-4x"></i>
                <p class="fs-2">Aqaba-Jordan</p>
            </li>

            <li><i class="fas fa-phone my-2 fa-4x"></i>
                <p class="fs-2">0786324604</p>
            </li>

            <li><i class="fas fa-envelope my-2 fa-4x"></i>
                <p class="fs-2">Gift@gmil.com</p>
            </li>
        </ul>
    </div>
    <!--Grid column-->
      <!--Grid column-->
      <div class="col-md-9 mb-md-0 my-2">
          <form id="contact-form" name="contact-form" action="" method="POST">

              <!--Grid row-->
              <div class="row">

                  <!--Grid column-->
                  <div class="col-md-6">
                      <div class="md-form mb-5">
                          <input type="text" id="name" name="name" class="form-control">
                          <label for="name" class="fs-2">Your name</label>
                      </div>
                  </div>
                  <!--Grid column-->

                  <!--Grid column-->
                  <div class="col-md-6">
                      <div class="md-form mb-5">
                          <input type="text" id="email" name="email" class="form-control">
                          <label for="email" class="fs-2">Your email</label>
                      </div>
                  </div>
                  <!--Grid column-->

              </div>
              <!--Grid row-->

              <!--Grid row-->
              <div class="row">
                  <div class="col-md-12">
                      <div class="md-form mb-5">
                          <input type="text" id="subject" name="subject" class="form-control">
                          <label for="subject" class="fs-2">Subject</label>
                      </div>
                  </div>
              </div>
              <!--Grid row-->

              <!--Grid row-->
              <div class="row">

                  <!--Grid column-->
                  <div class="col-md-12">

                      <div class="md-form">
                          <textarea type="text" id="message" name="message" rows="3" class="form-control md-textarea"></textarea>
                          <label for="message" class="fs-2">Your message</label>
                      </div>

                  </div>
              </div>
              <!--Grid row-->

          </form>

          <div class="text-center text-md-left">
              <a class="btn btn-danger-subtle">Send</a>
          </div>
          <div class="status"></div>
      </div>
      <!--Grid column-->

     

  </div>

</section>
<!--Section: Contact v.2-->

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
