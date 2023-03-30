
 <?php 
include_once ('includes/header.php');
include_once ('../middleware/adminMiddleware.php');
include_once ('../config/connect.php');
include_once ('../functions/myfunctions.php') ;

?>
<div class="container mt-2">
  <div class="row">
    <div class="col-md-12 shadow-lg p-3 mb-3 bg-primary rounded ">
     <?php 
      if(isset($_GET['id']))
      {
        $id = $_GET['id'];

        // $category = getById("category" , $id);
        $sql="SELECT *FROM category WHERE category_id='$id'";
        $category=mysqli_query($con,$sql);
        
        if(mysqli_num_rows($category) > 0)
        {
          $data = mysqli_fetch_array($category);
          ?> 
           <div class="card shadow-lg p-3 mb-3 bg-white rounded">
             <div class="card-header">
               <h4>Edit Category</h4>
             </div>
             <div class="card-body">
              <form action="../functions/code.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                <input type="hidden" name="id" value="<?= $data['category_id']?>"/>
                 <div class="col-md-6">
                  <label for="" class="label">Name</label>
                  <input type="text" value="<?= $data['categoryName']?>" name="name" placeholder="Enter Category Name" class="form-control" required>
                 </div>
                 <div class="col-md-6">
                  <label for="" class="label">Slug</label>
                  <input type="text" name="slug" value="<?= $data['slug']?>" class="form-control" required>
                 </div>
                 <div class="col-md-6">
                  <label for="" class="label">Status</label>
                  <input type="checkbox" name="status" <?= $data['status'] ? "checked":"" ?>>
                 </div>
                 <div class="col-md-6">
                  <label for="" class="label">Popular</label>
                  <input type="checkbox" name="popular" <?= $data['popular'] ? "checked":""?>>
                 </div>
                 <div class="col-md-12">
                  <label class="label">Description</label>
                  <textarea name="description" placeholder="Enter Description" class="form-control" maxlength="500" cols="3" rows="3" required><?= $data['description']?></textarea>
                 </div>
                 <div class="col-md-12">
                  <label for="" class="label">Upload Image</label>
                  <input type="file" name="image" class="form-control" required>
                  <label for="" class="label">Current Image</label>
                  <input type="hidden" name="old_image" class="form-control" required>
                  <img src="../Uploads/<?= $data['image']?>" height="90" width="100" />
                 </div>
                 <div class="col-md-12"> 
                  <button type="submit" class="btn btn-primary mt-5" name="editCategory_btn">Update</button>
                 </div>
                </div>
              </form>
             </div>
           </div>  
          <?php
      }
      else
      {
            // echo "Category not found" ;
            // redirect("./category.php","Category not found");
            $_SESSION ['message']="Category not found";
            // header('Location: category.php');
      }
    }
           ?>
    </div>
  </div>
</div>

<?php
  include_once ('./includes/footer.php');
?>
