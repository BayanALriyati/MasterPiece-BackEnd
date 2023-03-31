<?php 
include_once('includes/header.php');
include_once('functions/userFunctions.php');

?>
<?php 

if (isset($_GET['product'])){
    $product_slug = $_GET['product'];
    $product_data = getSlugActive("product" , $product_slug);
    $product = mysqli_fetch_array($product_data);
    if($product){
        // $category_id = $category['category_id'];
        ?>
<section class="section product-detail">
<div class="details container">

      <div class="left">
            <div class="main">
                <img src="./uploads/<?= $product['imageMain']?>" alt="Image Main" id="ProductImg" />
            </div>
        <div class="thumbnails">
            <div class="thumbnail">
                <img src="./uploads/<?= $product['imageMain']?>" alt="Image Main" class="small-img"/>
            </div>
            <div class="thumbnail">
                <img src="./uploads/<?= $product['thumbnail_1']?>" alt="Thumbnail" class="small-img"/>
            </div>
            <div class="thumbnail">
                <img src="./uploads/<?= $product['thumbnail_2']?>" alt="Thumbnail" class="small-img"/>
            </div>
            <div class="thumbnail">
                <img src="./uploads/<?= $product['thumbnail_3']?>" alt="Thumbnail" class="small-img"/>
           </div>
        </div>
      </div>
    <div class="right">
        <h1><?= $product['productName']?></h1>
        <p class="description"><?= $product['description']?></p>
        <?php if ($product['is_discount'] == 1){ ?>

            <div class="price">JD <?= $product['price_discount']?> <span>JD<?= $product['price']?></span> </div>

            <?php } else { ?>
            <div class="price"> JD<?= $product['price']?></div> <?php } ?> 

      <form class="form-view" action="./functions/handleAdd.php" method="POST" enctype="multipart/form-data">
      
      <input type="hidden" name="product_id" value="<?= $product['product_id']; ?>">
      <input type="hidden" name="name" value="<?= $product['productName']; ?>">
      <?php 
      if ($product['is_discount'] == 1){
         ?>
         <input type="hidden" name="price" value="<?=$product['price_discount'];?>">
         <?php
      } else {
         ?>
         <input type="hidden" name="price" value="<?=$product['price'];?>">
         <?php
      }
      ?>     
      <input type="hidden" name="image" value="<?= $product['imageMain']; ?>">

         <div class="input-group mb-3 ">
            <buton type="button" class="input-group-text addCart decrement-btn">-</buton>
            <input type="text" class="form-control input-qty" name="qty" value="1">
            <buton type="button" class="input-group-text addCart increment-btn">+</buton>
         </div>
         <button class="addCart" name="addTOcart"><i class="fas fa-shopping-cart"></i>Add To Cart</button>
         <button class="addCart" name="addTOheart"><i class="fas fa-heart"></i>Add To Favorite</button>
    </div>
      </form>
            <!-- <p><label><?= $product['description']?></label></p> -->
            
           
    </div>
</div>
</section>

    <?php
        }

        // else
        // {
        //     echo "Don't found" ;

        // }
}
    else{
        echo "Something Went Wrong";
    }

?>



<?php include('./includes/footer.php') ?>
