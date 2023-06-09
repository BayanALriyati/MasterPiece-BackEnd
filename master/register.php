<?php 
// session_start();
if(isset($_SESSION['auth'])){

      $_SESSION ['message'] = "You are already Logged In";
      header('Location: index.php');
      exit();
}
include('includes/header.php') ;
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

<!-- <div class="heading-main">
    <h3>Register</h3>
    <p><a href="index.php" target="_blank">home </a> <span> / Register</span></p>
 </div> -->
<section class="w-100 vh-150 mt-5" style="background:url(assets/images/heading-bg.jpg);">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-20">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-m-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
               
                    <img src="assets/images/logo-color.png"
                      class="img-fluid" alt="Sample image">
    
                  </div>
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

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

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
  
                  <form class="mx-1 mx-md-4" action="./functions/authCode.php" method="POST">
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-3x mt-5 me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-2">
                        <label class="form-label" for="form3Example1c">Your Name</label>
                        <input type="text" name="name" id="form3Example1c" class="form-control" />
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-3x mt-5 me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-2">
                        <label class="form-label" for="form3Example3c">Your Email</label>
                        <input type="email" name="email" id="form3Example3c" class="form-control" />
                      </div>
                    </div>
  
                    <!-- <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-camera fa-3x mt-5 me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-2">
                        <label class="form-label" for="form3Example4c">Photo</label>
                        <input type="file" name="image" class="form-control" required>

                        <input type="file" name="image" id="form3Example4c" class="form-control" required/>
                      </div>
                    </div> -->

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-3x mt-5 me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-2">
                        <label class="form-label" for="form3Example4c">Password</label>
                        <input type="password" name="password" id="form3Example4c" class="form-control" />
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-3x mt-5 me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-2">
                        <label class="form-label" for="form3Example4cd">Repeat your password</label>
                        <input type="password" name="cPassword" id="form3Example4cd" class="form-control h" />
                      </div>
                    </div>
  
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit"  name="register" class="btn btn-danger-subtle text-black bg-danger-subtle  btn-lg">Register</button>
                    </div>
  
                  </form>
  
                </div>
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php include('includes/footer.php') ?>
