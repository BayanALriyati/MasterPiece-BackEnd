<?php
include_once ('./config/connect.php');
?>

<header class="header">
  <!-- <section class="search-form">
     <form action="" method="post">
       <input type="text" name="search_box" placeholder="search here..." maxlength="100" class="box" required>
       <button type="submit" class="fas fa-search" name="search_btn"></button>
     </form>
   </section> -->
   <section class="flex">

      <a href="home.php" class="logo"><img src="assets/images/logo-color.png" alt="logo"></a>

      <nav class="navbar">
         <a href="./index.php">Home</a>
         <a href="./yourGift.php">Your Gift</a>
         <a href="./aboutUs.php">About Us</a>        
         <a href="./contactUs.php">Contact Us</a>
      </nav>

      <div class="icons">
        
         <!-- <div class="fas fa-search"></div>
         <a href="yourCart.php" class="fas fa-shopping-cart"></a> -->
         <?php 
           if(isset($_SESSION['auth']))
           {
            $user_id = $_SESSION['auth_user']['user_id'];
            ?>
            <input type="hidden" name="user" value="<?= $_SESSION['auth_user']['user_id'];; ?>">
            
            <a href="search.php" class="fas fa-search"></a>
            <?php
            $sql = "SELECT * FROM `cart` WHERE user_id = '$user_id';";
            $check_cart = mysqli_query($con , $sql) ;
            // $total_cart_counts = mysqli_num_rows($check_cart);
            if(mysqli_num_rows($check_cart)> 0 ){
               $total_cart_counts = mysqli_num_rows($check_cart);
           
            ?>
               <a href="yourCart.php" class="fas fa-shopping-cart" class="hover"><span class="counts">(<?= $total_cart_counts; ?>)</span></a>
            <?php
            }else{
         ?>
               <a href="yourCart.php" class="fas fa-shopping-cart" class="hover"></a>
            <?php
            }
         ?>
         <?php
            $sql = "SELECT * FROM `favorite` WHERE user_id = '$user_id';";
            $check_favorite = mysqli_query($con , $sql) ;
            // $total_cart_counts = mysqli_num_rows($check_cart);
            if(mysqli_num_rows($check_favorite)> 0 ){
               $total_favorite_counts = mysqli_num_rows($check_favorite);
            ?>
               <a href="yourFavorite.php" class="fas fa-heart" class="hover"><span class="counts">(<?= $total_favorite_counts; ?>)</span></a>
            <?php
            }else{
         ?>
               <a href="yourFavorite.php" class="fas fa-heart" class="hover"></a>
            <?php
            }
         ?>
            <!-- <a href="yourFavorite.php" class="fas fa-heart"></a> -->
               <!-- <?= $_SESSION['auth_user']['image']; ?> -->
            <div id="user-btn" class="fas fa-user"></div>
            <span id="user" style="cursor:default;" class="hover"><?= $_SESSION['auth_user']['name']; ?></span>
         <?php
            }else{
         ?>
            <a href="search.php" class="fas fa-search"></a>
            <a href="yourCart.php" class="fas fa-shopping-cart" class="hover"></a>
            <a href="yourFavorite.php" class="fas fa-heart" class="hover"></a>
            <div id="user-btn" class="fas fa-user" class="hover"></div>
         <?php
          }
         ?>
         <!-- <div id="menu-btn" class="fas fa-bars"></div> -->
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
            <p class="name"><?= $_SESSION['auth_user']['name']; ?></p>
            <a href="Logout.php" class="btn">logout</a>
         </div>
         <?php
            }else{
         ?>
            <p class="first">please login first!</p>
            <a href="login.php" class="btn">login</a>
         <?php
          }
         ?>
      </div>
      <div class="btn-group">
         
        <button type="button" class="btn btn-primary"><div id="user-btn" class="fas fa-user" class="hover"></div></button>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
=        </button>
        <ul class="dropdown-menu" role="menu">
          <li><a href="yourFavorite.php" class="fas fa-heart" class="hover"></a></li>
          <li><a href="search.php" class="fas fa-search"><i></i></a></li>
          <li><a href="yourCart.php" class="fas fa-shopping-cart" class="hover"></a></li>
        </ul>
      </div>
      <nav class="bottom-nav">
      <a href="./index.php" class="fas fa-home"></a>
      <a href="./yourGift.php" class="fas fa-gift"></a>
      <a href="./aboutUs.php" class="fas fa-question"></a>
      <a href="./contactUs.php" class="fas fa-address-card"></a>
  </nav>

   </section>

</header>
