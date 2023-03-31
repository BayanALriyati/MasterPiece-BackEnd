<?php 
// session_start();

?>


<header class="header">

   <section class="flex">

      <a href="home.php" class="logo"><img src="assets/images/logo-color.png" alt="logo"></a>

      <nav class="navbar">
         <a href="./index.php">Home</a>
         <a href="./yourGift.php">Your Gift</a>
         <a href="./aboutUs.php">About Us</a>        
         <a href="./contactUs.php">Contact Us</a>
      </nav>

      <div class="icons">
        
         <!-- <a href="search.php"><i class="fas fa-search"></i></a>
         <a href="cart.php"><i class="fas fa-shopping-cart"></i><span></span></a> -->
         <div class="fas fa-search"></div>
         <div class="fas fa-shopping-cart"></div>
         <?php 
           if(isset($_SESSION['auth']))
           {
            ?>
            <!-- <?= $_SESSION['auth_user']['image']; ?> -->
         <div id="user-btn" class="fas fa-user"></div>
         <span id="user" style="cursor:default;"><?= $_SESSION['auth_user']['name']; ?></span>
         <?php
            }else{
         ?>
            <div id="user-btn" class="fas fa-user"></div>
         <?php
          }
         ?>
         <div id="menu-btn" class="fas fa-bars"></div>
      </div>

      <div class="profile">
      <?php 
           if(isset($_SESSION['auth']))
           {
            ?>
         <!-- <p class="name"><?= $_SESSION['auth_user']['name']; ?></p>
          <a><img src="../Uploads/<?= $_SESSION['auth_user']['image']; ?>" alt="logo"></a> -->
         <!-- <div class="name"><img src="../Uploads/<?= $_SESSION['auth_user']['image']; ?>" alt="logo"></div> -->
         <div class="flex">
            <a href="profile.php" class="btn">profile</a>
            <a href="Logout.php" class="btn">logout</a>
         </div>
         <!-- <p class="account">
            <a href="login.php">login</a> or
            <a href="register.php">register</a>
         </p>  -->
         <?php
            }else{
         ?>
            <p class="name">please login first!</p>
            <a href="login.php" class="btn">login</a>
         <?php
          }
         ?>
      </div>
      <nav class="bottom-nav">
      <a href="./index.php" class="fas fa-home"></a>
      <a href="./yourGift.php" class="fas fa-gift"></a>
      <a href="./aboutUs.php" class="fas fa-question"></a>
      <a href="./contactUs.php" class="fas fa-address-card"></a>
  </nav>

   </section>

</header>