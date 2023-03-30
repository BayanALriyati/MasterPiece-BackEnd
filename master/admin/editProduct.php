<?php 
include_once ('includes/header.php');
include_once ('../middleware/adminMiddleware.php');
include_once ('../config/connect.php');
// include_once ('../functions/myfunctions.php') ;
?>
<div class="container mt-2">
    <div class="row">
    <div class="col-md-12 shadow-lg p-3 mb-3 bg-primary rounded ">
    <?php 
      if(isset($_GET['id']))
      {
        $id = $_GET['id'];

        // $category = getById("category" , $id);
        $sql="SELECT *FROM product WHERE product_id='$id'";
        $product=mysqli_query($con,$sql);
        
        if(mysqli_num_rows($product) > 0)
        {
          $data = mysqli_fetch_array($product);
          ?> 
            <div class="card shadow-lg p-3 mb-3 bg-white rounded">
            <div class="card-header text-center fs-1">
            <h4>Edit Product</h4>
            </div >
            <div class="card-body">
            <form action="../functions/code.php" method="POST" enctype="multipart/form-data">
            <div class="row">
            <input type="hidden" name="id" value="<?= $data['product_id']?>"/>
                <div class="col-md-12">
            <label for="" class="label">Name</label>
            <input type="text" name="name" value="<?= $data['productName']?>" class="form-control" required>
            </div>
            <div class="col-md-6">
            <label for="" class="label">Slug</label>
            <input type="text" name="slug" value="<?= $data['slug']?>" class="form-control" required>
           </div>
           <div class="col-md-6">
            <label for="" class="label">Status</label>
            <input type="checkbox" <?= $data['status'] ? "checked":"" ?> name="status">
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
                        <option value="<?= $item["category_id"];?>"<?= $data["category_id"] == $item["category_id"]?'selected':''?>><?= $item["categoryName"];?></option>
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
            <input type="text" name="quantity" value="<?= $data['quantity']?>" class="form-control" required>
            </div>
                <div class="col-md-4">
            <label for="" class="label">Price</label> 
            <input type="text" name="price" value="<?= $data['price']?>" class="form-control" required>
            </div>
                <div class="col-md-12">
            <label class="label">Description</label>
            <textarea name="description" class="form-control" maxlength="500" cols="3" rows="3" required><?= $data['description']?></textarea>
            </div>
                <div class="col-md-12"> 
            <label for="" class="label">Image Main</label>
                <input type="file" name="imageMain" class="form-control" required>
                <label for="" class="label">Current Image</label>
                <input type="hidden" name="oldImageMain" value="<?= $data['imageMain']?>" class="form-control" required>
                <img src="../Uploads/<?= $data['imageMain']?>" height="90" width="100" />
            </div>
                <div class="col-md-4"> 
            <label for="" class="label">Thumbnail 1</label>
                <input type="file" name="thumbnail_1" class="form-control" required>
                <label for="" class="label">Current Image</label>
                <input type="hidden" name="oldThumbnail_1" value="<?= $data['thumbnail_1']?>" class="form-control" required>
                <img src="../Uploads/<?= $data['thumbnail_1']?>" height="90" width="100" />
            </div>
                <div class="col-md-4"> 
            <label for="" class="label">Thumbnail 2</label>
                <input type="file" name="thumbnail_2" class="form-control" required>
                <label for="" class="label">Current Image</label>
                <input type="hidden" name="oldThumbnail_2" value="<?= $data['thumbnail_2']?>" class="form-control" required>
                <img src="../Uploads/<?= $data['thumbnail_2']?>" height="90" width="100" />
            </div>
                <div class="col-md-4"> 
                <label for="" class="label">Thumbnail 3</label>
                <input type="file" name="thumbnail_3" class="form-control" required>
                <label for="" class="label">Current Image</label>
                <input type="hidden" name="oldThumbnail_3" value="<?= $data['thumbnail_3']?>" class="form-control" required>
                <img src="../Uploads/<?= $data['thumbnail_3']?>" height="90" width="100" />
            </div>
                <div class="col-md-12"> 
            <button type="submit" class="btn btn-primary mt-5" name="editProduct_btn">Save</button>
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
            $_SESSION ['message']="Product not found";
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