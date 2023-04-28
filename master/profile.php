<?php 
include_once('includes/header.php');
include_once('functions/userFunctions.php');



 ?>

<div>
      <h1 id="userProfile">Welcome <?= $item['name']; ?> . </h1>
      <div class="card card-body" id="profileCard">
        <div class="row">
          <div class="col-md-3 col-sm-2 mx-auto" id="profileImageParent">
            <img
              class="profile-image"
              src="./uploads/<?= $item['image']; ?>"
              alt="profile image"
            ></img>
          </div>
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
          <div class="col-md-5 col-sm-5 personalDetails mx-auto">
            <h3 class="personalHead">Personal Details:</h3>
            <ul>
              <li>Name :<?= $item['name']; ?></li>
              <li>Email :<?= $item['email']; ?></li>
              <li>Gender :<?= $item['gender']; ?></li>
              <!-- <li>Age :<?= $item['name']; ?></li> -->
            </ul>
          </div>
          <div class="col-md-4 col-sm-5 address mx-auto">
            <h3 class="addressHead">Address:</h3>
            <ul>
              <li>Street:<?= $item['street']; ?></li>
              <!-- <li>Locality:{userObj.locality}</li> -->
              <li>City:<?= $item['city']; ?></li>
              <!-- <li>Pincode:{userObj.pincode}</li> -->
            </ul>
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
        
      </div>
      <div class="dashboardCards">
        <div class="cartCard">
          <div class="card card-body">
            <img
              class="cardImage"
              src="https://img.freepik.com/free-vector/vector-shopping-cart-icon_8276-197.jpg?size=338&ext=jpg&ga=GA1.2.1633237395.1647423373"
            ></img>
            <a href="yourCart.php" class="btn btn-warning" onClick={navigateToCart}>
              Go To Cart
        </a>
          </div>
        </div>
        <div class="editProfileCard">
          <div class="card card-body">
            <img
              class="cardImage"
              src="https://img.freepik.com/free-vector/paper-pencil-cartoon-icon-illustration-education-object-icon-concept-isolated-flat-cartoon-style_138676-2137.jpg?size=338&ext=jpg&ga=GA1.2.1633237395.1647423373"
            ></img>
            <a type="submit" href="updateProfile.php" class="btn btn-warning">
              Edit Profile
            </a>
          </div>
        </div>
        <div class="logoutCard">
          <div class="card card-body">
            <img
              class="cardImage"
              src="https://img.freepik.com/free-vector/man-showing-staircase-senior-woman_74855-10907.jpg?size=626&ext=jpg&ga=GA1.2.1633237395.1647423373"
            ></img>
            <a type="submit" href="Logout.php" class="btn btn-warning">
              Logout
            </a>
          </div>
        </div>
      </div>
    </div>

<?php include('includes/footer.php') ?>
