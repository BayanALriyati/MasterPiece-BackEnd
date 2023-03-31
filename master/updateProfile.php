<?php 
include_once('includes/header.php');
include_once('functions/userFunctions.php');

 ?>
<section class="w-100 vh-150 mt-5" style="background:url(assets/images/heading-bg.jpg);">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-20">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
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


         <form class="mx-1 mx-md-4" action="./functions/code.php" method="POST" enctype="multipart/form-data">
         <?php 
           if(isset($_SESSION['auth']))
           {
            ?> 
             <input type="hidden" name="prev_pass" value="<?= $fetch_profile["password"]; ?>">
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-3x mt-5 me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-2">
                        <label class="form-label" for="form3Example1c">Your Name</label>
                        <input type="text" name="name" id="form3Example1c" placeholder="<?= $_SESSION['auth_user']['name']; ?>" class="form-control" />
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-3x mt-5 me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-2">
                        <label class="form-label" for="form3Example3c">Your Email</label>
                        <input type="email" name="email" id="form3Example3c" placeholder="<?= $_SESSION['auth_user']['email']; ?>" class="form-control" />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-3x mt-5 me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-2">
                        <label class="form-label" for="form3Example4c">Password</label>
                        <input type="password" name="password" id="form3Example4c" placeholder="<?= $_SESSION['auth_user']['password']; ?>" class="form-control" />
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
                    <button type="submit"  name="cencel" class="btn btn-danger-subtle text-black bg-danger-subtle  btn-lg">Cencel</button>
                  </div>

               </div>
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">  
                  <div class="d-flex flex-row align-items-center mb-4">
                       <i class="fas fa-camera fa-3x mt-5 me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-2">
                        <label class="form-label" for="form3Example4c">Photo</label>
                        <input type="file" name="image" id="form3Example4c" accept="image/*" class="form-control" required/>
                      </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-3x mt-5 me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-2">
                      <label class="form-label" for="form3Example3c">City</label>
                      <input type="text" name="city" id="form3Example3c" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-3x mt-5 me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-2">
                      <label class="form-label" for="form3Example4cd">Street</label>
                      <input type="text" name="street" id="form3Example4cd" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-3x mt-5 me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-2">
                    <label for="" class="form-label">Gender</label>
                           <select name="category" class="form-control"> 
                             <option selected>Select Gender</option>
                                       <option>female</option>
                                       <option>male</option>
                           </select>
                    </div>
                  </div>
                  <?php
          }
            ?>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                     <button type="submit"  name="Update" class="btn btn-danger-subtle text-black bg-danger-subtle  btn-lg">Update</button>
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