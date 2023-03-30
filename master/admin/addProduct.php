<?php 
include_once ('includes/header.php');
include_once ('../middleware/adminMiddleware.php');

?>
<div class="container mt-2">
  <div class="row">
    <div class="col-md-12 shadow-lg p-3 mb-3 bg-primary rounded ">
      <div class="card shadow-lg p-3 mb-3 bg-white rounded">
        <di class="card-header text-center fs-1">
            <h4>Add Product</h4>
        </di >
        <div class="card-body">
          <form action="../functions/code.php" method="POST" enctype="multipart/form-data">
           <div class="row">
           <div class="col-md-12">
            <label for="" class="label">Name</label>
            <input type="text" name="name" placeholder="Enter Product Name" class="form-control" required>
           </div>
           <div class="col-md-6">
            <label for="" class="label">Slug</label>
            <input type="text" name="slug" placeholder="Enter Category Slug" class="form-control" required>
           </div>
           <div class="col-md-6">
            <label for="" class="label">Status</label>
            <input type="checkbox" name="status">
           </div>
           <div class="col-md-4">
            <label for="" class="label">Select Category</label>
             <select name="category" class="form-select">
              <option selected>Select Category</option>
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
           <div class="col-md-4">
            <label for="" class="label">Quantity</label>
            <input type="text" name="quantity" placeholder="Enter Quantity" class="form-control" required>
           </div>
           <div class="col-md-4">
            <label for="" class="label">Price</label>
            <input type="text" name="price" placeholder="Enter Price" class="form-control" required>
           </div>
           <div class="col-md-12">
            <label class="label">Description</label>
            <textarea name="description" placeholder="Enter Description" class="form-control" maxlength="500" cols="3" rows="3" required></textarea>
           </div>
           <div class="col-md-12"> 
            <label for="" class="label">Image Main</label>
            <input type="file" name="imageMain" class="form-control" required>
           </div>
           <div class="col-md-4"> 
            <label for="" class="label">Thumbnail 1</label>
            <input type="file" name="thumbnail_1" class="form-control" required>
           </div>
           <div class="col-md-4"> 
            <label for="" class="label">Thumbnail 2</label>
            <input type="file" name="thumbnail_2" class="form-control" required>
           </div>
           <div class="col-md-4"> 
            <label for="" class="label">Thumbnail 3</label>
            <input type="file" name="thumbnail_3" class="form-control" required>
           </div>
           <div class="col-md-12"> 
            <button type="submit" class="btn btn-primary mt-5" name="addProduct_btn">Save</button>
           </div>
           </div>
          </form>
       </div>
      </div>
    </div>
  </div>
</div>


<?php
  include_once ('./includes/footer.php');
?>