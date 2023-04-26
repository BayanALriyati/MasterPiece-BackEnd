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
        $_SESSION['product_id']= $product_id;

        echo ($product_id);

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
        // $_SESSION['product_id']= $product_id;

$sql = "SELECT * FROM reviews INNER JOIN users 
        ON (reviews.user_id = users.user_id) WHERE product_id = $product_id ORDER BY reviews.review_id DESC";
        $check_review = mysqli_query($con , $sql);
        
         ?>
<section style="background-color:rgb(98, 17, 71); !important;">

  <div class="container my-1 mx-5 py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 col-lg-12">
        <div class="card text-dark reviewBox">
          <div class="card-body p-4">
            <!-- <h4 class="mb-0 headingReview" style="font-size: 25px;">Recent comments</h4> -->
           
           
                    <?php 
            //  while($item = mysqli_fetch_array($check_review)){ 
            //       $comment_id = $item['review_id'];
            //       $product_id = $item['product_id'];
            //       $comment_date = $item['review_date'];
            //       $comment_content = $item['review_text'];
            //       $user_name = $item['name'];
            if(mysqli_num_rows($check_review)> 0 )
{
   foreach($check_review as $item){

?>
            
            <div class="card-body p-4">
            <div class="d-flex flex-start">
              <div>
                <h6 class="fw-bold mb-1" style="font-size: 26px;"><?= $item['name']; ?></h6>
                <div class="d-flex align-items-center mb-3">
                  <p class="mb-0" style="font-size: 12px;">
                  
                  <?= $item['review_date']; ?>
                  </p>
                </div>
                <p class="mb-0" style="font-size: 20px;">
                
                
                <?= $item['review_text']; ?>
                </p>
              </div>
            </div>
          </div>

          <hr class="my-0" />
          <?php }
}
           else{
        echo '<p class="emptyReview">No review</p>';
     }
    
          ?>
        </div>
      </div>
    </div>
  </div>
  
        
  <?php
if(isset($_SESSION['auth']))
{$_SESSION['product_id']= $product_id;
?>
  <form action="./functions/handleAdd.php" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="product_id" value="<?= $product['product_id']; ?>">
  <!-- <input type="hidden" name="product_id" value="<?= $product['user_id']; ?>"> -->

               <div class="col-md-12 text-center">
                  <textarea style="width:100rem;font-size:20px;margin:20px; border:2px solid silver"  class="form-control" name="review_text" cols="5"  rows="1" placeholder="Add your comment" value=""></textarea>
               </div>
        
            <div class="col-md-12 text-center">
               <button type="submit" class="btnReview btn-secondary my-5 fs-2" name="addReview">Add Now</button>
            </div>
            </form>
            <?php
}
   else
   {
    redirect("./login.php","Login To Continue");
   }
  
?>
</section>
        


              
              <?php
  
?>
 <script>
    var ProductImg = document.getElementById('ProductImg');
    var SmallImg = document.getElementsByClassName('small-img');
    SmallImg[0].onclick = function() {
      ProductImg.src = SmallImg[0].src;
    };
    SmallImg[1].onclick = function() {
      ProductImg.src = SmallImg[1].src;
    };
    SmallImg[2].onclick = function() {
      ProductImg.src = SmallImg[2].src;
    };
    SmallImg[3].onclick = function() {
      ProductImg.src = SmallImg[3].src;
    };
  </script>
<?php include_once('./includes/footer.php') ?>
