<?php 
include_once('includes/header.php');
include_once('functions/userFunctions.php');
?>
<?php 

if (isset($_GET['category'])){
    $category_slug = $_GET['category'];
    $category_data = getSlugActive("category" , $category_slug);
    $category = mysqli_fetch_array($category_data);
    if($category){
        $category_id = $category['category_id'];
?>

<div class="heading-main">
    <!-- <h3>Your Cart</h3> -->
    <p><a href="index.php">home </a> <span> / <?= $category['categoryName']?></span></p>
</div>


<section class="products" id="product">
<div class="row">
<div class="col-lg-3 col-md-3">
<div class="box-container">
<?php
                    
                    $sql="SELECT *FROM product WHERE category_id='$category_id' AND status='0'";
                    $product=mysqli_query($con,$sql);
                    if(mysqli_num_rows($product)> 0 )
                    {
                        foreach($product as $item)
                    {
                ?>
        <div class="box">

        <?php 
        if ($item['is_discount'] == 1){
            ?>
            <div class="discount">-<?= $item['percent_discount']?>%</div>
         <?php
      } else {
         ?>
         <input type="hidden" name="price" value="<?=$item['percent_discount'];?>">
         <?php
      }
      ?>
           <div class="image">
               <img src="./uploads/<?= $item['imageMain']?>" alt="">
               <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="./yourCart.html" class="cart-btn">add to cart</a>
                    <a href="./view.html" class="fas fa-share"></a>
               </div>
           </div>
           <div class="content">
               <h3><?= $item['productName']?> </h3>
               <?php if ($item['is_discount'] == 1){ ?>

<div class="price">JD <?= $item['price_discount']?> <span>JD<?= $item['price']?></span> </div>
<?php } else { ?>
<div class="price"> JD<?= $item['price']?></div> <?php } ?> 
           </div>
           
       </div>
       <?php
                          }
                        }
                        else
                        {
                            echo "Don't found" ;
                        //   redirect("login.php","Don't found");
                          // $_SESSION ['message']="Don't found";
                          // header('Location: ../category.php');
                        }
                    
                
                    ?>
      
</div>
</div>
</div>
</section>



<?php 
    }
    else{
        echo "Something Went Wrong";
    }
}
else{
    echo "Something Went Wrong";
}

?>


<?php include('includes/footer.php') ?>
