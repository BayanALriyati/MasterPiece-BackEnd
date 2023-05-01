<?php 
include_once('includes/header.php');
include_once('functions/userFunctions.php');
?>
<?php
                   if (isset($_SESSION ['message'])){
                  ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                       <?= $_SESSION ['message']; ?>
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fa-sharp fa-solid fa-close"></i></button>
                  </div>
                    <?php  
                        unset($_SESSION ['message']);
                       }
                     ?>

   <!-- Shop Section Begin -->
   <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h1>YOUR GIFT</h1>
                            </div>
                            <div class="filter-box">
                            <a href="./yourGift.php" class="btn active" data-filter="all">All</a>

                            <?php
                    
                                $category = getAllActive("category");
                                // $sql="SELECT *FROM category";
                                // $category=mysqli_query($con,$sql);
                                if(mysqli_num_rows($category)> 0 )
                                {
                                    foreach($category as $item)
                                {
                                ?>
                                <a href="yourGift.php?category=<?= $item['slug']?>" class="btn" data-filter="gift">Choose <?= $item['categoryName']?></a>
                                <?php
                                    }
                                        }
                                        else
                                    {
                        
                                        echo "Don't found" ;
                                        //  $_SESSION ['message']="Don't found";
                                    //  header('Location: ./yourGift.php');                        
                                    }
                                  ?>
                            </div>
                        </div>
                        <div id="search-categories">
                            <form action="" method="post">
                               <input type="search" id="search-form" name="search_box" placeholder="search gift name here....">
                               <a href="search.php" id="search-form" type="submit" name="search_btn">search</a>
                            </form>
                        </div>
                    </div>
                </div>

                         
<div class="col-lg-9 col-md-9">
    <div class="row">
                           
                                <?php 

            if (isset($_GET['category'])){
                $category_slug = $_GET['category'];
                $category_data = getSlugActive("category" , $category_slug);
                $category = mysqli_fetch_array($category_data);
                if($category){
                    $category_id = $category['category_id'];
            ?>
                        
                        <?php
                            
                            $sql="SELECT *FROM product WHERE category_id='$category_id' AND status='0'";
                            $product=mysqli_query($con,$sql);
                            if(mysqli_num_rows($product)> 0 )
                            {
                                foreach($product as $item)
                            {
                        ?>

                <div class="col-lg-4 col-md-6 mb-4">
                   <div class="products">
                            <div class="box-container">
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
    
                                        <div class="image">
                                            <a href="product_view.php?product=<?= $item['slug']?>"><img src="./uploads/<?= $item['imageMain']?>"  alt="Image"></a>
                                            <div class="icons">
                                                <button name="addTOheart" class="cart-btn"><i class="fas fa-heart"></i></button>
                                                <button class="cart-btn" name="addTOcart">Add Cart</button>
                                                <a href="product_view.php?product=<?= $item['slug']?>" target="_blank"><i class="fas fa-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="itemProduct">
                                              <h3><?= $item['productName']?></h3>
                                              <input type="number" name="qty" class="qtyMain" min="1" max="99"  value="1">
                                            </div>
                                            <?php if ($item['is_discount'] == 1){ ?>
    
                                                <div class="price">JD <?= $item['price_discount']?> <span>JD<?= $item['price']?></span> </div>
                                            <?php } else { ?>
                                                <div class="price"> JD<?= $item['price']?></div> <?php } ?> 
                                        </div>
                                    </form>
                                </div>
                            </div>
                   </div>
                  
                </div>
                
                                    <?php
                            }
                        }
                        else
                        {
                            echo "Don't found" ;
                            // $_SESSION ['message']="Don't found";
                            // header('Location: ./yourGift.php');                        
                        }
                    
                
                    ?>
    </div>
</div>
            </div>
        </div>
                
                <?php 
    }
    else{
        ?>

     <div class="col-lg-9 col-md-9">
       <div class="row">
                        <?php
                            }
            }
                        else
                        {
                        $product = getAll("product");

                        if(mysqli_num_rows($product)> 0 )
                        {
                            foreach($product as $item)
                            {
                        ?>
                <div class="col-lg-4 col-md-6 mb-4">
                   <div class="products">
                            <div class="box-container">
                                <div class="box flower">
                                  <form class="form-view" action="./functions/handleAdd.php"  method="POST" enctype="multipart/form-data">
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
    
                                        <div class="image">
                                            <a href="product_view.php?product=<?= $item['slug']?>"><img src="./uploads/<?= $item['imageMain']?>"  alt="Image"></a>
                                            <div class="icons">
                                                <button name="addTOheart" class="cart-btn"><i class="fas fa-heart"></i></button>
                                                <button class="cart-btn" name="addTOcart">Add Cart</button>
                                                <a href="product_view.php?product=<?= $item['slug']?>"><i class="fas fa-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="itemProduct">
                                              <h3><?= $item['productName']?></h3>
                                              <input type="number" name="qty" class="qtyMain" min="1" max="99"  value="1">
                                            </div>
                                            <?php if ($item['is_discount'] == 1){ ?>
    
                                                <div class="price">JD <?= $item['price_discount']?> <span>JD<?= $item['price']?></span> </div>
                                            <?php } else { ?>
                                                <div class="price"> JD<?= $item['price']?></div> <?php } ?> 
                                        </div>
                                    </form>
                                </div>
                            </div>
                   </div>
                  
                </div>
                <?php
                            }
                        }
                        else
                        {
                            // echo "Don't found" ;
                        //   redirect("login.php","Don't found");
                        $_SESSION ['message']="Don't found";
                        header('Location: yourGift.php'); 
                        
                        }
                        }
                
                    ?>                      
                       
       </div>
     </div>

                        </div>
                     </div>
                   
           
  
                    
                       
                
                
            

        </div>
    </div>
    </section>
    <!-- Shop Section End -->


<?php include('includes/footer.php') ?>
