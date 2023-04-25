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
        $product_id = $product['product_id'];
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
      
      <input type="hidden" name="description" value="<?= $product['description']; ?>">
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
         <!-- <input type="number" name="qty" class="qty" min="1" max="99"  value="1"> -->

         <div class="input-group mb-3 ">
            <buton type="button" class="input-group-text addCart decrement-btn">-</buton>
            <input type="text" class="form-control input-qty" name="qty" value="1">
            <buton type="button" class="input-group-text addCart increment-btn">+</buton>
         </div>
         <div class="add_btn">
           <button class="addToCart" name="addTOcart"><i class="fas fa-shopping-cart"></i>Add To Cart</button>
           <button class="addToCart" name="addTOheart"><i class="fas fa-heart"></i>Add To Favorite</button>
         </div>
  </div>
      </form>
            
           
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

<section class="quick-view">

   <h1 class="headingReview">Review for products</h1>

   <?php

//   ADD COMMENT


$sql = "SELECT * FROM review INNER JOIN users 
        ON (review.user_id = users.user_id) WHERE product_id = $product_id";
        // $stmt = $conn->prepare($query);
        $check_review = mysqli_query($con , $sql);

        // $stmt->execute([$pid]);
         ?>
<section style="background-color:rgb(98, 17, 71); !important;">

  <div class="container my-1 mx-5 py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 col-lg-12">
        <div class="card text-dark">
          <div class="card-body p-4">
            <h4 class="mb-0" style="font-size: 25px;">Recent comments</h4>
           
           
                    <?php 
             while($review = mysqli_fetch_array($check_review)){ 
                  $comment_id = $review['review_id'];
                  $product_id = $review['product_id'];
                  $comment_date = $review['review_date'];
                  $comment_content = $review['review_text'];
                  $user_name = $review['name'];
            ?>
            <div class="card-body p-4">
            <div class="d-flex flex-start">
              <div>
                <h6 class="fw-bold mb-1" style="font-size: 26px;"><?php echo $user_name ?></h6>
                <div class="d-flex align-items-center mb-3">
                  <p class="mb-0" style="font-size: 12px;">
                  <?php echo $comment_date ?>
                  </p>
                </div>
                <p class="mb-0" style="font-size: 20px;">
                <?php echo  $comment_content; ?>
                </p>
              </div>
            </div>
          </div>

          <hr class="my-0" /><?php } ?>
        </div>
      </div>
    </div>
  </div>
  <form action="" method="post">
    
            <div class="writeReview">
               <div >
                  <textarea style="width:120rem;font-size:20px;margin-top:20px; border:2px solid silver"  class="form-control" name="comment_text" cols="5"  rows="1" placeholder="Add your comment" value=""></textarea>
               </div>
            </div>
            <div class="col-md-12 text-right">
               <button type="submit" class="btnReview btn-secondary my-5 fs-2" name="placeOrder">Add Now</button>

               <!-- <input type="submit" name="submit_comment" value="Submit Now" class="btn"> -->

            </div>
            </form>
</section>
          <!-- <form action="" method="post">
            <div class="writeReview">
               <div >
                  <textarea style="width:50%;font-size:20px;margin-top:20px; border:2px solid silver"  class="form-control" name="comment_text" cols="5"  rows="1" placeholder="Add your comment" value=""></textarea>
               </div>
            </div>
            <div class="col-md-12 text-right">
               <input type="submit" name="submit_comment" value="Submit Now" class="btn submit_btn" style="background-color:#C6861A ; font-size : 20px;">

            </div>
            </form> -->


 <?php include('./includes/footer.php') ?>
