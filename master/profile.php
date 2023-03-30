<?php 
include_once('includes/header.php');
include_once('functions/userFunctions.php');



 ?>

<div>
      <h1 id="userProfile">Welcome {userObj.userName}, Good Evening </h1>
      <div class="card card-body" id="profileCard">
        <div class="row">
          <div class="col-md-3 col-sm-2 mx-auto" id="profileImageParent">
            <img
              class="profile-image"
              src="https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?size=338&ext=jpg&ga=GA1.2.1633237395.1647423373"
              alt="profile image"
            ></img>
          </div>
          <div class="col-md-5 col-sm-5 personalDetails mx-auto">
            
            <h3 class="personalHead">Personal Details:</h3>
            <ul>
              <li>Name:{userObj.userName}</li>
              <li>email:{userObj.email}</li>
              <li>gender:{userObj.gender}</li>
              <li>age:{userObj.age}</li>
            </ul>
          </div>
          <div class="col-md-4 col-sm-5 address mx-auto">
            <h3 class="addressHead">Address:</h3>
            <ul>
              <li>Street:{userObj.street}</li>
              <li>Locality:{userObj.locality}</li>
              <li>City:{userObj.city}</li>
              <li>Pincode:{userObj.pincode}</li>
            </ul>
            
          </div>
        </div>
      </div>
      <div class="dashboardCards">
        <div class="cartCard">
          <div class="card card-body">
            <img
              class="cardImage"
              src="https://img.freepik.com/free-vector/vector-shopping-cart-icon_8276-197.jpg?size=338&ext=jpg&ga=GA1.2.1633237395.1647423373"
            ></img>
            <button class="btn btn-warning" onClick={navigateToCart}>
              Go To Cart
            </button>
          </div>
        </div>
        <div class="editProfileCard">
          <div class="card card-body">
            <img
              class="cardImage"
              src="https://img.freepik.com/free-vector/paper-pencil-cartoon-icon-illustration-education-object-icon-concept-isolated-flat-cartoon-style_138676-2137.jpg?size=338&ext=jpg&ga=GA1.2.1633237395.1647423373"
            ></img>
            <button class="btn btn-warning" onClick={navigateToEditProfile}>
              Edit Profile
            </button>
          </div>
        </div>
        <div class="logoutCard">
          <div class="card card-body">
            <img
              class="cardImage"
              src="https://img.freepik.com/free-vector/man-showing-staircase-senior-woman_74855-10907.jpg?size=626&ext=jpg&ga=GA1.2.1633237395.1647423373"
            ></img>
            <button class="btn btn-warning" onClick={userLogout}>
              Logout
            </button>
          </div>
        </div>
      </div>
    </div>

<?php include('includes/footer.php') ?>
