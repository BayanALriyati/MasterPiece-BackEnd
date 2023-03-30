<?php 
//  session_start();
include_once ('includes/header.php');
include_once ('../middleware/adminMiddleware.php');
include_once ('../config/connect.php') ;
?>



     <!-- CONTENT -->
	<section id="content">
		<!-- MAIN -->
		<main>
		<div class="head-title">
				<div class="left">
					<h1>Product</h1>
				</div>
				<a href="addusers.php" class="btn-download">
				<i class="fa-solid fa-plus"></i>
				<span class="text">Add New Product</span>
				</a>
			</div>
		<!-- _____________ -->

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Product</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2" id="product_table">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delate</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $product = getAll("product");

                        if(mysqli_num_rows($product)> 0 )
                        {
                          while($fetch_product = mysqli_fetch_array($product)){ 
                            $i=0;
                          
                            ?>
                            <tr></tr>
                            <td>
                            <div class="d-flex px-2 py-1">
                                <div>
                                  <img src="../uploads/<?= $fetch_product['imageMain'];?>" class="avatar avatar-sm me-3 border-radius-lg" alt="image">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-sm"><?= $fetch_product['productName'];?></h6>
                                  <p class="text-xs text-secondary mb-0"><?= $fetch_product['description'];?></p>
                                </div>
                              </div>
                            </td>
                            <td>
                            <?php 
                                  $product_category ="SELECT * FROM `product` INNER JOIN `category` ON 
                                    product.category_id = category.category_id";
                                  $sql_run=mysqli_query($con,$product_category);
                                  if(mysqli_num_rows($sql_run)> 0){
                                                                              
                                    while($fetch_product_category = mysqli_fetch_array($sql_run)){ 
                                        if($i==0 &&  $fetch_product['category_id'] == 
                                          $fetch_product_category['category_id'] ){
                                          $i++;
                                ?>
                                <div class="d-flex flex-column text-center">
                                  <h6 class="mb-0 text-sm"><?= $fetch_product_category['categoryName'];?></h6>
                                </div>
                                <?php
                                  }
                                }
                              }         
                              ?>
                              </div>
                            </td>
                            <td class="align-center text-center text-sm">
                                <button><a href="editProduct.php?id=<?= $fetch_product['product_id']?>"><i class="fa-solid fa-pen-to-square fa-solid"></i></a></button>
                            </td>
                            <td class="align-center text-center text-sm">
                                <form action="../functions/code.php" method="POST">
                                  <input type="hidden" name="id" value="<?= $fetch_product['product_id']?>"/>
                                <button type="submit" class="delateProduct_btn delateProduct_btn" name="delateProduct_btn" 
                                  value="<?= $fetch_product['product_id']?>"><i class="fa-solid fa-trash delete1"></i></button>
                                </form>
                            </td>
                          </tr>
                      <?php
                        }
                      }
                         else
                         {
                        
                          // redirect("../category.php","Don't found");
                          $_SESSION ['message']="Don't found";
                          // header('Location: ../category.php');
                        }
                      
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
		</main>
	</section>
	<!-- CONTENT -->

<?php
  include ('includes/footer.php');
?>
