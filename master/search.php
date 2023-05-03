<?php

include_once('includes/header.php');
include_once('functions/userFunctions.php');
if(isset($_SESSION['auth'])){
   $user_id = $_SESSION['auth_user']['user_id'];
}else{
   $user_id = '';
   // header('location:user_login.php');
};

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

<section class="search-form">
   <form action="" method="post">
      <input type="text" name="search_box" placeholder="search here..." maxlength="100" class="box" required>
      <button type="submit" class="fas fa-search" name="search_btn"></button>
   </form>
</section>


<!-- prodcuts section starts  -->

<section class="products" id="product">

   <div class="box-container">
   <?php
     if(isset($_POST['search_box']) OR isset($_POST['search_btn'])){
     $search_box = $_POST['search_box'];
     $sql = "SELECT * FROM `product` WHERE productName LIKE '%{$search_box}%'"; 
     $select_product = mysqli_query($con , $sql);
     if(mysqli_num_rows($select_product)> 0 ){
         foreach($select_product as $fetch_product){
   ?>

       <div class="box">
       <form class="form-view" action="./functions/handleAdd.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="description" value="<?= $fetch_product['description']; ?>">
            <input type="hidden" name="product_id" value="<?= $fetch_product['product_id']; ?>">
            <input type="hidden" name="name" value="<?= $fetch_product['productName']; ?>">
            <?php 
            if ($fetch_product['is_discount'] == 1){
               ?>
               <input type="hidden" name="price" value="<?=$fetch_product['price_discount'];?>">
               <?php
            } else {
               ?>
               <input type="hidden" name="price" value="<?=$fetch_product['price'];?>">
               <?php
            }
            ?>     
            <input type="hidden" name="image" value="<?= $fetch_product['imageMain']; ?>">
            <div class="flexCard">
            <?php 
                 if ($fetch_product['is_discount'] == 1){
                    ?>
                       <div class="discount">-<?= $fetch_product['percent_discount']?>%</div>
                    <?php
                 } else {
                    ?>
                    <input type="hidden" name="price" value="<?=$fetch_product['percent_discount'];?>">
                    <?php
                 }

                 ?>
               
        </div>
           <div class="image">
               <img src="./uploads/<?= $fetch_product['imageMain']?>" alt="Image">
               <div class="icons">
                  <button name="addHeartSearch" class="cart-btn"><i class="fas fa-heart"></i></button>
                  <button name="addCartSearch" class="cart-btn">Add Cart</button>
                  <a href="product_view.php?product=<?= $item['slug']?>" target="_blank"><i class="fas fa-share"></i></a>
               </div>
           </div>
           <div class="content">
              <div class="itemProduct">
                  <h3><?= $fetch_product['productName']?></h3>
                  <input type="number" name="qty" class="qtyMain" min="1" max="99"  value="1">
                </div>
               <?php if ($fetch_product['is_discount'] == 1){ ?>
               <div class="price"> JOD<?= $fetch_product['price_discount']?> <span>JOD<?= $fetch_product['price']?></span> </div>
                <?php } else { ?>
                  <div class="price"> JD<?= $fetch_product['price']?></div> 
               <?php } ?>           
           </div>
       </div>
       </form>
       <?php 
       }
      }else{
        echo '<p class="empty">There is no gift with this name</p>';
     }
   }
      ?>
   </div>

</section>


<!-- prodcuts section ends -->

