<?php 
include_once ('includes/header.php');
include_once ('../middleware/adminMiddleware.php');
include_once ('../config/connect.php') ;
?>
                <?php
                   if (isset($_SESSION ['message'])){
                  ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                       <?= $_SESSION ['message']; ?>
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fa-sharp fa-solid fa-close"></i></button>
                  </div>
                    <?php  
                        unset($_SESSION ['message']);
                       }
                     ?>
<?php
if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email= $_POST['email'];
    $fullName= $_POST['fullName'];
    $password= $_POST['new_pass'];

    // $curr_pass= $_POST['email'];

    $update_profile = $con->prepare("UPDATE `users` SET UserName = ? , Email =? , FulName = ? , Password =? , WHERE User_id =?  ");
    $update_profile->execute([$name , $email , $fullName , $admin_id]);
 
    $select_admin = $con->prepare("SELECT * FROM `users` WHERE User_id = $admin_id AND Role= 1");
    $select_admin->execute();
     $fetch_admin = $select_admin->fetchAll(PDO::FETCH_ASSOC);
     $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
 
    $prev_pass = $_POST['prev_pass'];
    $current_pass = $_POST['curr_pass'];
    $new_pass = $_POST['new_pass'];
    $confirm_pass = $_POST['confirm_pass'];
    if($current_pass == $empty_pass){
       $message[] = 'please enter old password!';
    }elseif($current_pass != $prev_pass){
       $message[] = 'old password not matched!';
    }elseif($new_pass != $confirm_pass){
       $message[] = 'confirm password not matched!';
    }else{
       if($new_pass != $empty_pass){
          $update_pass = $con->prepare("UPDATE `users` SET Password = ? WHERE User_id = ?");
          $update_pass->execute([$confirm_pass, $admin_id]);
          $message[] = 'password updated successfully!';
       }else{
          $message[] = 'please enter a new password!';
       }
    }
    
 }
 ?>



<div class="container">

<div class="row flex-lg-nowrap">
  
<?php 
if(isset($_SESSION['auth']))
{
 $user_id= $_SESSION['auth_user']['user_id'];
   $sql="SELECT *FROM users WHERE User_id='$user_id'";
   $sql_run=mysqli_query($con,$sql);
   if(mysqli_num_rows($sql_run)> 0 )
  { 
     foreach($sql_run as $item){

 ?>
  <input type="hidden" name="prev_pass" value=" ">

  <div class="col">
    <div class="row">
      <div class="col mb-3 mt-5">
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 140px;">
                    <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                    <?php if ($item['image'] == ""){ ?>
                      <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
                      <?php } else { ?>
                      <img class="profile-image" src="../uploads/<?= $item['image']; ?>" name="image" alt="profile image" height="120" width="120"/>
                              <?php } ?>
                    <!-- <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span> -->
                      <!-- <img class="profile-image" src="../uploads/<?= $item['image']; ?>" name="image" alt="profile image" height="120" width="120"/> -->
                    </div>
                  </div>
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap" ><?= $item['name']; ?></h4>
                    <p class="mb-0"><?= $item['email']; ?></p>
                    <div class="mt-2">
                      <button class="btn btn-block" type="button" onclick="openForm()">
                        <i class="fa fa-fw fa-camera"></i>
                        <span>Change Photo</span>
                      </button>
                    </div>
                  </div>
                              <div class="discountPopup">
  
                                  <div class="formPopup" id="popupForm">
                                    <form action="../functions/code.php" method="POST" enctype="multipart/form-data" class="formContainer">

                                      <h2>Change Photo</h2>
                                       <br/>
                                      <input type="hidden" name="profile" value="<?= $item['User_id']?>"/>
                                      <input type="file" name="image" class="border border-danger" required><br/>
                                      <div class="flex-btn">
                                      <button type="submit" class="btn btn-outline-secondary mt-3" name="updateImage_admin">Change</button><br/>
                                      <button type="submit" class="btn btn-outline-secondary mt-3" onclick="closeForm()">Close</button>
                                      </div>
                                    </form>
                                  </div>
                                  <!-- class="btnCancel" -->
                              </div>
                </div>
              </div>
              <ul class="nav nav-tabs">
                <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
              </ul>
              <div class="tab-content pt-3">
                <div class="tab-pane active">
                  <form class="form" action="../functions/code.php" method="POST" enctype="multipart/form-data" disabled>
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Full Name</label>
                              <input class="form-control" type="text" name="name" value="<?= $item['name']; ?>" required>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Email</label>
                              <input class="form-control" type="email" name="email" value="<?= $item['email']; ?>" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>City</label>
                              <input class="form-control" type="text" name="city" value="<?= $item['city']; ?>" required>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Street</label>
                              <input class="form-control" type="text" name="street" value="<?= $item['street']; ?>" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <!-- <label>Email</label> -->
                              <label for="" class="form-label">Gender</label>
                                <select name="gender" class="form-control" value="<?= $item['gender']; ?>"> 
                                       <option disabled value="<?= $item['gender']; ?>">Select Gender</option>
                                       <option>female</option>
                                       <option>male</option>
                                </select>                           
                           </div>
                          </div>
                        </div>
                       
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-sm-6 mb-3">
                        <div class="mb-2"><b>Change Password</b></div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <input type="hidden" name="prev_password" value="<?= $item['password']; ?>">
                              <label>Current Password</label>
                              <input class="form-control" type="password" name="old_password" value="<?= $item['password']; ?>" placeholder="••••••" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>New Password</label>
                              <input class="form-control" type="password" name="new_password" value="<?= $item['password']; ?>" placeholder="••••••" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                              <input class="form-control" type="password" name="cpassword" value="<?= $item['password']; ?>" placeholder="••••••"></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-5 offset-sm-1 mb-0 mt-5">
                        <div class="row">
                          <div class="col">                            
                            <div class="custom-controls-stacked px-3" class="imgUpdate">
                              <img src="../assets/images/logo-color.png" class="imgUpdate">  
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <button class="btn btn-block" type="submit" name="updateProfile_admin">Save Changes</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-3 mb-3 mt-5">
        <div class="card mb-3">
          <div class="card-body">
            <div class="px-xl-3 text-center">
              <a href="logout_admin.php" >
                <button class="btn btn-block btn-secondary">
                <i class="fa fa-sign-out"></i>
                <span>Logout</span>
                </button>
              </a>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body text-center">
            <!-- <h6 class="card-title font-weight-bold">Support</h6> -->
            <p class="card-text text-dark ">Get Fast, Free Help From Our Friendly Assistants.</p>
            <button type="button" class="btn btn-primary">Contact Us</button>
          </div>
        </div>
      </div>
    </div>
    <?php
?>
  </div>

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
        </div>
<?php
  include ('includes/footer.php');
?>