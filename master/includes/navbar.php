<?php 
// session_start();

?>

<!-- <header class="head">

 <section class="header">

   <div class="header-1">
    
     <a href="./index.php" ><img src="assets/images/logo-color.png" alt="logo" class="logo" ></a>
     
     <div class="header-2">
 
      <nav class="nav">
         <a href="./index.php">Home</a>
         <a href="./yourGift.php">Your Gift</a>
         <a href="./aboutUs.html">About Us</a>        
         <a href="./contactUs.html">Contact Us</a>
      </nav>
      
   </div>

     <div class="icon">
         <div id="search-btn" class="fas fa-search"></div>
         <a href="./search.html" class="fas fa-search"></a>
         <a href="./yourCart.html" class="fas fa-shopping-cart"></a>
     </div>

       <?php 
           if(isset($_SESSION['auth']))
           {
            ?>
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <?= $_SESSION['auth_user']['name']; ?>
                     </a>

                 <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Order</a>
                    <a class="dropdown-item" href="Logout.php">Logout</a>
                 </ul>
           </li> 
         <?php 
           }
           else
           {
            ?>
            <div class="icon-1">
            <a href="./login.php" class="fas fa-user"></a>
           </div>
            <?php 
            }
           ?>
 
   </div>
 

   <nav class="bottom-nav">
      <a href="./index.html" class="fas fa-home"></a>
      <a href="./yourGift.html" class="fas fa-gift"></a>
      <a href="./aboutUs.html" class="fas fa-question"></a>
      <a href="./contactUs.html" class="fas fa-address-card"></a>
  </nav>
 </section>
</header> -->
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
         <div id="user-btn" class="fas fa-user"></div>
         <!-- <span id="user" style="cursor:default;"><?= $_SESSION['auth_user']['name']; ?></span> -->
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