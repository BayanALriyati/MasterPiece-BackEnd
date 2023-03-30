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
					    <h1>Offers</h1>
				    </div>
	      </div>
      <div class="head-title">
        <div class="left">
					<h1 class="offer">Category</h1>
				</div>
          <div>
            <form action="../functions/code.php" method="POST" enctype="multipart/form-data">

                <div class="input-group mb-3">
                    <button type="submit" class="btn btn-outline-secondary" name="add-discountCategory">Add All Category</button>
                      <select name="category" class="form-select selectOffer">
                            <option selected>Choose Category</option>
                            <?php 
                                $category = getAll("category");
                                    if(mysqli_num_rows($category)> 0 )
                            {
                                foreach ($category as $item) {
                                    ?>
                                    <!-- <input type="hidden" name="category"/> -->
                                <option value="<?= $item["category_id"];?>"><?= $item["categoryName"];?></option>
                                <?php
                        }
                    }
                    else{
                        $_SESSION ['message']="Category not found";
                    }
                ?>
                          <input type="text" name="add-on-category" placeholder="%" class="form-control inputOffer" aria-label="Text input with segmented dropdown button">
                  </div>
                </form>
          </div> 
          <div>
            <form action="../functions/code.php" method="POST" enctype="multipart/form-data">
            <div class="input-group">
              <button class="btn btn-outline-secondary" type="submit" name="remove-discountCategory">Remove All Category</button>
              <select name="category" class="form-select selectOffer" id="inputGroupSelect04" aria-label="Example select with button addon">
                    <option selected>Choose Category</option>
                    <?php 
                                $category = getAll("category");
                                    if(mysqli_num_rows($category)> 0 )
                            {
                                foreach ($category as $item) {
                                    ?>
                                <option value="<?= $item["category_id"];?>"><?= $item["categoryName"];?></option>
                                <?php
                        }
                    }
                    else{
                        $_SESSION ['message']="Category not found";
                    }
                ?>
    
              </select>
            </div>
            </form>
	        </div>
      </div>
          <div class="head-title">
                <div class="left">
					        <h1 class="offer">1 Product</h1>
			        	</div>
                <div>
            <form action="../functions/code.php" method="POST" enctype="multipart/form-data">

                <div class="input-group mb-3">
                    <button type="submit" class="btn btn-outline-secondary" name="add-discountProduct">Add Product</button>
                      <select name="product" class="form-select selectOffer">
                            <option selected>Choose Product</option>
                            <?php 
                                $product = getAll("product");
                                    if(mysqli_num_rows($product)> 0 )
                            {
                                foreach ($product as $item) {
                                    ?>
                                    <!-- <input type="hidden" name="category"/> -->
                                <option value="<?= $item["product_id"];?>"><?= $item["productName"];?></option>
                                <?php
                        }
                    }
                    else{
                        $_SESSION ['message']="Product not found";
                    }
                ?>
                          <input type="text" name="add-on-product" placeholder="%" class="form-control inputOffer" aria-label="Text input with segmented dropdown button">
                  </div>
                </form>
          </div> 
          <div>
            <form action="../functions/code.php" method="POST" enctype="multipart/form-data">
            <div class="input-group">
              <button class="btn btn-outline-secondary" type="submit" name="remove-discountProduct">Remove Product</button>
              <select name="product" class="form-select selectOffer">
                            <option selected>Choose Product</option>
                            <?php 
                                $product = getAll("product");
                                    if(mysqli_num_rows($product)> 0 )
                            {
                                foreach ($product as $item) {
                                    ?>
                                <option value="<?= $item["product_id"];?>"><?= $item["productName"];?></option>
                                <?php
                        }
                    }
                    else{
                        $_SESSION ['message']="Product not found";
                    }
                ?>
    
              </select>
            </div>
            </form>
	        </div>
	      </div>

        <div class="head-title">
                <div class="left">
					        <h1 class="offer"> ALL Product</h1>
			        	</div>
          <div>
            <form action="../functions/code.php" method="POST" enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <button class="btn btn-outline-secondary" name="add-discountAllProduct" type="submit" id="button-addon1">ADD All Product</button>
                    <input type="text" name="add-on-product" class="form-control inputOffer" placeholder="%" aria-label="Example text with button addon" aria-describedby="button-addon1">
                </div>
            </form>
          </div> 
          <div>
            <form action="../functions/code.php" method="POST" enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <button name="remove-discountAllProduct" class="btn btn-outline-secondary" type="submit" id="button-addon1">Remove All Product</button>
                </div>
            </form>
          </div> 
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
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">price discount</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
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
                                <h6 class="mb-0 text-sm"><?= $fetch_product['price'];?></h6>
                            </td>
                            <td class="align-center text-center text-sm">
                            <?php if ($fetch_product['is_discount'] == 1){ ?>

                              <h6 class="mb-0 text-sm"><?= $fetch_product['price_discount'];?></h6>
                              <?php } else { ?>
                            <h6 class="mb-0 text-sm" style="color:#d81b60;">Not Discount</h6> <?php } ?>
                            </td>
                            <td class="align-center text-center text-sm">
                            <?php if ($fetch_product['is_discount'] == 1) { ?>
                              <h6 class="mb-0 text-sm"><?= $fetch_product['percent_discount'];?>%</h6>  
                              <form action="../functions/code.php" method="POST">
                                  <input type="hidden" name="product" value="<?= $fetch_product['product_id']?>"/>
                                <button type="submit" class="btnIcons-remove" name="remove-discountProduct" 
                                  value="<?= $fetch_product['product_id']?>"><i class="fa-sharp fa-solid fa-circle-minus"></i>
                                </button>
                                </form>
                              <!-- <i class="fa-sharp fa-solid fa-circle-minus"></i> -->
                              
                              <?php } else { ?>
                                <div class="openBtn">
      <button class="openButton" onclick="openForm()"><i class="fa-sharp fa-solid fa-circle-plus"></i></button>
      <input type="hidden" name="product" value="<?= $fetch_product['product_id']?>"/>

    </div>
    
  <div class="discountPopup">
  
      <div class="formPopup" id="popupForm">
      <form action="../functions/code.php" method="POST" enctype="multipart/form-data" class="formContainer">

        <!-- <form action="../functions/code.php" class="formContainer"> -->


          <h2>Add Discount</h2>
          <!-- <label for="email">
            <strong>Price</strong>
          </label><br/>
          <input type="text" id="price"  name="price" value="<?= $fetch_product['price']?>" required><br/>
          <label for="psw"> -->
            <strong>Percent Discount</strong>
          </label><br/>
          <input type="hidden" name="product" value="<?= $fetch_product['product_id']?>"/>
          <input type="text" placeholder="%" name="add-on-product" required><br/>
          <button type="submit" class="btn btn-outline-secondary" name="add-discountProduct">Add Product</button><br/>

          <!-- <button type="submit" class="btnDiscount" name="add-discountProduct">Add</button><br/> -->
          <button type="submit" class="btnCancel" onclick="closeForm()">Close</button>
        </form>
       
    </div>
      
    </div>
                                <!-- <i class="fa-sharp fa-solid fa-circle-plus"></i> -->
                                <?php } ?>                            
                            <!-- <h6 class="mb-0 text-sm" style="color:#d81b60;">Not Discount</h6> -->
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
