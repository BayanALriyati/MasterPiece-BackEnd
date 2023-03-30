<?php 
include_once ('includes/header.php');
include_once ('../middleware/adminMiddleware.php');
include_once ('../config/connect.php');
// include_once ('../functions/myfunctions.php') ;
?>
<div class="container mt-2">
    <div class="row">
    <div class="col-md-12 shadow-lg p-3 mb-3 bg-primary rounded ">
    <div class="formPopup" id="popupForm">

    <?php 
      if(isset($_GET['discount']))
      {
        $id = $_GET['discount'];

        // $category = getById("category" , $id);
        $sql="SELECT *FROM product WHERE product_id='$id'";
        $product=mysqli_query($con,$sql);
        
        if(mysqli_num_rows($product) > 0)
        {
          $data = mysqli_fetch_array($product);
          ?> 
        <div class="discountPopup">
  
  
    <form action="" class="formContainer">
    <!-- <input type="hidden" name="id" value="<?= $data['product_id']?>"/> -->

      <h2>Add Discount</h2>
      <label for="email">
        <strong>Price</strong>
      </label><br/>
      <input type="text" id="price"  name="price" value="<?= $data['price']?>" required><br/>
      <label for="psw">
        <strong>Percent Discount</strong>
      </label><br/>
      <input type="password" id="psw" placeholder="%" name="psw" required><br/>
      <a><button type="submit" class="btnDiscount">Add</button></a><br/>
      <button type="submit" class="btnCancel" onclick="closeForm()">Close</button>
    </form>
   
</div>
  
            <?php
        }
        else
        {
            // echo "Category not found" ;
            // redirect("./category.php","Category not found");
            $_SESSION ['message']="Product not found";
            // header('Location: category.php');
        }
    }
    
            ?>
    </div>
    </div>
</div>
</div>


<?php
    include_once ('./includes/footer.php');
?>