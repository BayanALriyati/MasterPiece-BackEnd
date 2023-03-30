<?php 
include_once('includes/header.php');
include_once('functions/userFunctions.php');
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
                        
                                    redirect("index.php","Don't found");
                                     // $_SESSION ['message']="Don't found";
                                     // header('Location: ../category.php');
                                    }
                        ?>
                            </div>
                        </div>
                        <div id="search-categories">
                            <form action="" onsubmit="return false">
                            <input type="search" id="search-form" placeholder="search gift name here....">
                            <button id="search-form">search</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-9 col-md-9">
                    <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="products">
                            
                                <div class="box-container">
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
                <div class="col-lg-4 col-md-6">

                    <div class="products">
                            
                            <div class="box-container">
                                <div class="box flower">
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
                                        <img src="./uploads/<?= $item['imageMain']?>"  alt="">
                                        <div class="icons">
                                            <a href="#" class="fas fa-heart"></a>
                                            <a href="#" class="cart-btn">add to cart</a>
                                            <a href="product_view.php?product=<?= $item['slug']?>" class="fas fa-share"></a>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h3><?= $item['productName']?></h3>
                                        <?php if ($item['is_discount'] == 1){ ?>

<div class="price">JD <?= $item['price_discount']?> <span>JD<?= $item['price']?></span> </div>
<?php } else { ?>
<div class="price"> JD<?= $item['price']?></div> <?php } ?> 
                                    </div>
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
                        //   redirect("login.php","Don't found");
                        //   $_SESSION ['message']="Don't found";
                        //   header('Location: ../category.php');
                        }
                    
                
                    ?>
                                </div>
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
                                <div class="col-lg-12 col-md-12">
                                    <div class="products">
                                        <div class="box-container">
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
                    <div class="col-lg-4 col-md-6">
                        <div class="products">
                            
                            <div class="box-container">
                         
                                <div class="box flower">
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
                                        <img src="./uploads/<?= $item['imageMain']?>"  alt="">
                                        <div class="icons">
                                            <a href="#" class="fas fa-heart"></a>
                                            <a href="#" class="cart-btn">add to cart</a>
                                            <a href="product_view.php?product=<?= $item['slug']?>" class="fas fa-share"></a>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h3><?= $item['productName']?></h3>
                                        <?php if ($item['is_discount'] == 1){ ?>

                                            <div class="price">JD <?= $item['price_discount']?> <span>JD<?= $item['price']?></span> </div>
                                        <?php } else { ?>
                                            <div class="price"> JD<?= $item['price']?></div> <?php } ?> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                            <!-- <div class="box card">
                                                    <div class="image">
                                                    <img src="./uploads/<?= $item['imageMain']?>" alt="">
                                                        <div class="icons">
                                                            <a href="#" class="fas fa-heart"></a>
                                                            <a href="#" class="cart-btn">add to cart</a>
                                                            <a href="./view.html" class="fas fa-share"></a>
                                                        </div>
                                                    </div>
                                                <div class="content">
                                                <h3><?= $item['productName']?></h3>
                                                <div class="price"> <?= $item['price']?></div>
                                                </div>
                                            </div> -->
                    <?php
                    }
                }
            }
        
                ?>     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>       


            </div>
        </div>
    </div>
    </section>
    <!-- Shop Section End -->


<?php include('includes/footer.php') ?>
