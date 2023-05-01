<?php 
include_once ('includes/header.php');
include_once ('../middleware/adminMiddleware.php');

?>
<div class="container mt-2">
  <div class="row">
    <div class="col-md-12 shadow-lg p-3 mb-3 bg-primary rounded ">
      <div class="card shadow-lg p-3 mb-3 bg-white rounded">
        <di class="card-header">
            <h4>Add Category</h4>
        </di >
        <div class="card-body">
          <form action="../functions/code.php" method="POST" enctype="multipart/form-data">
           <div class="row">
           <div class="col-md-6">
            <label for="" class="label">Name</label>
            <input type="text" name="name" placeholder="Enter Category Name" class="form-control" required>
           </div>
           <div class="col-md-6">
            <label for="" class="label">Slug</label>
            <input type="text" name="slug" placeholder="Enter Category Slug" class="form-control" required>
           </div>
           <div class="col-md-6">
            <label for="" class="label">Status</label>
            <input type="checkbox" name="status">
           </div>
           <div class="col-md-6">
            <label for="" class="label">Popular</label>
            <input type="checkbox" name="popular">
           </div>
           <div class="col-md-12">
            <label class="label">Description</label>
            <textarea name="description" placeholder="Enter Description" class="form-control" maxlength="500" cols="3" rows="3" required></textarea>
           </div>
           <div class="col-md-12"> 
            <label for="" class="label">Upload Image</label>
            <input type="file" name="image" class="form-control" required>
           </div>
           <div class="col-md-12"> 
            <button type="submit" class="btn btn-primary mt-5" name="addCategory_btn">Save</button>
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