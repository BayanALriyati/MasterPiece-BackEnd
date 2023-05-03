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
    <h3>Our gift</h3>
    <p><a href="index.php" target="_blank">home </a> <span> / <?= $category['categoryName']?></span></p>
</div>


<section class="products" id="product">
<div class="box-container">
<?php
                    
                    $sql="SELECT *FROM product WHERE category_id='$category_id' AND status='1'";
                    $product=mysqli_query($con,$sql);
                    if(mysqli_num_rows($product)> 0 )
                    {
                        foreach($product as $item)
                    {
                ?>
        <div class="box">
        <form class="form-view" action="./functions/handleAdd.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="description" value="<?= $item['description']; ?>">
                                    <input type="hidden" name="product_id" value="<?= $item['product_id']; ?>">
                                    <input type="hidden" name="name" value="<?= $item['productName']; ?>">
                                    <?php 
                                    if ($item['is_discount'] == 1){
                                       ?>
                                       <input type="hidden" name="price" value="<?=$item['price_discount'];?>">
                                       <?php
                                    } else {
                                       ?>
                                       <input type="hidden" name="price" value="<?=$item['price'];?>">
                                       <?php
                                    }
                                    ?>     
                                    <input type="hidden" name="image" value="<?= $item['imageMain']; ?>">
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
               <button name="addTOheart" class="cart-btn"><i class="fas fa-heart"></i></button>
                                                <button class="cart-btn" name="addTOcart">Add Cart</button>
                                                <a href="product_view.php?product=<?= $item['slug']?>" target="_blank"><i class="fas fa-eye"></i></a>
               </div>
           </div>
           <div class="content">
               <h3><?= $item['productName']?> </h3>
               <?php if ($item['is_discount'] == 1){ ?>

<div class="price">JD <?= $item['price_discount']?> <span>JD<?= $item['price']?></span> </div>
<?php } else { ?>
<div class="price"> JD<?= $item['price']?></div> <?php } ?> 
           </div>
        </form>
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
