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
 
<?php
     if(isset($_SESSION['auth']))
           {
            $user_id= $_SESSION['auth_user']['user_id'];
            $password= $_SESSION['auth_user']['password'];
			$image= $_SESSION['auth_user']['image'];
			$name= $_SESSION['auth_user']['name'];

            ?> 
   
<section class="w-100 vh-150 mt-5" style="background:url(assets/images/heading-bg.jpg);">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-20">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
			  
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">




         <form class="mx-1 mx-md-4" action="./functions/code.php" method="POST" enctype="multipart/form-data" disabled>
         <?php 
           if(isset($_SESSION['auth']))
           {
            $user_id= $_SESSION['auth_user']['user_id'];
            $password= $_SESSION['auth_user']['password'];
			        $sql="SELECT *FROM users WHERE User_id='$user_id'";
              $sql_run=mysqli_query($con,$sql);
              if(mysqli_num_rows($sql_run)> 0 )
             { 
                foreach($sql_run as $item){
            ?> 
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-3x mt-5 me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-2">
                        <label class="form-label" for="form3Example1c">Your Name</label>
                        <input type="text" name="name" id="form3Example1c" value="<?= $item['name'] ?>" class="form-control" required/>
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-3x mt-5 me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-2">
                        <label class="form-label" for="form3Example3c">Your Email</label>
                        <input type="email" name="email" id="form3Example3c" value="<?= $item['email']; ?>" class="form-control" required/>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
					
                      <i class="fas fa-lock fa-3x mt-5 me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-2">
					              <input type="hidden" name="prev_password" value="<?= $item['password']; ?>">
                        <label class="form-label" for="form3Example4c">old Password</label>
                        <input type="password" name="old_password" value="<?= $item['password']; ?>" id="form3Example4c" class="form-control" required/>
                        <label class="form-label" for="form3Example4c">new Password</label>
                        <input type="password" name="new_password" value="<?= $item['password']; ?>" id="form3Example4cd" class="form-control" required/>
                        <label class="form-label" for="form3Example4c">Repeat your Password</label>
                        <input type="password" name="cpassword" value="<?= $item['password']; ?>" id="form3Example4cd" class="form-control" required/>

                      </div>
                    </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <a href="profile.php">
                    <button type="button"  name="cencel" class="btn btn-secondary my-3 fs-2">Cencel</button>
                    </a>
                  </div>

               </div>
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">  
                <img src="./uploads/<?= $item['image'];?>" class="img-profile rounded-circle"/>

                  <div class="d-flex flex-row align-items-center mb-4">
                       <i class="fas fa-camera fa-3x mt-5 me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-2">
                        <input type="hidden" name="old_image" value="<?= $item['image']; ?>" class="form-control" required>
                        <label class="form-label" for="form3Example4c">Photo</label>
						            <input type="file" name="image" id="form3Example4c" value="<?= $item['image'];?>" accept="image/*" class="form-control"/>
					          </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-3x mt-5 me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-2">
                      <label class="form-label" for="form3Example3c">City</label>
                      <input type="text" name="city" id="form3Example3c" value="<?= $item['city']; ?>" class="form-control" required/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-3x mt-5 me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-2">
                      <label class="form-label" for="form3Example4cd">Street</label>
                      <input type="text" name="street" id="form3Example4cd" value="<?= $item['street']; ?>" class="form-control" required/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-3x mt-5 me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-2">
                    <label for="" class="form-label" value="<?= $item['gender']; ?>">Gender</label>
                           <select name="gender" class="form-control"> 
                           <option disabled value="<?= $item['gender']; ?>">Select Gender</option>
                             <!-- <option >Select Gender</option> -->
                                       <option>female</option>
                                       <option>male</option>
                           </select>
                    </div>
                  </div>
                  <?php
          }
		}
	}
			   else{
			echo '<p class="emptyReview">No user</p>';
		 }
            ?>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                     <button type="submit"  name="Update" class="btn btn-secondary my-3 fs-2">Update</button>
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
    <?php }else { 
    //  header("Location: ./login.php");
	// redirect("./login.php","Login To Continue");
  $_SESSION ['message'] = "Login To Continue";
         header('Location: login.php');
    //  exit;
    } ?>
  
<?php include('includes/footer.php') ?>