
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
        
         <!-- <div class="fas fa-search"></div>
         <a href="yourCart.php" class="fas fa-shopping-cart"></a> -->
         <?php 
           if(isset($_SESSION['auth']))
           {
            // $user_id = $_SESSION['auth_user']['user_id'];
            ?>
            <input type="hidden" name="price" value="<?= $_SESSION['auth_user']['user_id'];; ?>">

            <div class="fas fa-search"></div>
            <a href="yourCart.php" class="fas fa-shopping-cart"></a>
            <a href="yourCart.php" class="fas fa-heart"></a>
               <!-- <?= $_SESSION['auth_user']['image']; ?> -->
            <div id="user-btn" class="fas fa-user"></div>
            <!-- <span id="user" style="cursor:default;"><?= $_SESSION['auth_user']['name']; ?></span> -->
         <?php
            }else{
         ?>
            <div class="fas fa-search"></div>
            <a href="yourCart.php" class="fas fa-shopping-cart"></a>
            <a href="yourCart.php" class="fas fa-heart"></a>
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
            <p class="name"><?= $_SESSION['auth_user']['name']; ?></p>
            <a href="Logout.php" class="btn">logout</a>
         </div>
         <!-- <p class="account">
            <a href="login.php">login</a> or
            <a href="register.php">register</a>
         </p>  -->
         <?php
            }else{
         ?>
            <p class="first">please login first!</p>
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