<?php

 session_start();
 include_once ('../config/connect.php');
 include_once ('../functions/myfunctions.php') ;

if(isset($_POST['editUser_btn'])){
   $id = $_POST['id'];
   $name = $_POST['name'];
   $email = $_POST['email'];
   $role = ($_POST['role']) ? '1':'0'; 
   $new_image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../Uploads/'.$new_image; 
   $old_image = $_POST['old_image'];  

   if($new_image != ""){
      $update_image = $new_image ;
   }
   else
   {
       $update_image = $old_image ;
   }


   $update_query = "UPDATE `users` SET name='$name' ,email='$email' , role='$role' , image='$update_image' WHERE User_id='$id'" ;
   $update_query_run = mysqli_query($con , $update_query);

    if ($update_query_run)
    {
       if($_FILES['image']['name'] != "")
      {
        move_uploaded_file($image_tmp_name , $image_folder);
        if(file_exists("../uploads/".$old_image))
        {
           unlink("../uploads/".$old_image);
        }
      }
       redirect("../admin/users.php" , "Users Update Successfully");
    }
} 

else if(isset($_POST['delateUser_btn'])){
   
    $id =  $_POST['id'];
    $user_query = "SELECT * FROM users WHERE User_id = '$id' " ;
    $user_query_run = mysqli_query($con , $user_query) ;
    $user_data = mysqli_fetch_array($user_query_run) ;
    $image = $user_data['image'] ;
 
    $delate_query = " DELETE FROM `users` WHERE User_id = '$id' ";
    $delate_query_run = mysqli_query($con , $delate_query);

    if($delate_query_run)
    {
       if(file_exists("../uploads/".$image))
       {
          unlink("../uploads/".$image);
       }
       redirect("../admin/users.php" , "User Deleted Successfully");
    }
    else{
       redirect("../admin/users.php" , "Something went wrong");
    }
}

else if(isset($_POST['addCategory_btn'])){
   
    $categoryName = $_POST['name'];
    $slug = $_POST['slug'];
    $status = isset($_POST['status']) ? '1':'0'; 
    $popular = isset($_POST['popular']) ? '1':'0';
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../Uploads/'.$image;

    //   Do the category name already exists ?
    $select_category =("SELECT * FROM `category` WHERE categoryName='$categoryName'");
    $select_category_run=mysqli_query ($con , $select_category);
 
    if(mysqli_num_rows($select_category_run)> 0)
     {      
          redirect("../admin/addCategory.php" , "Category name already exist!");
         //  $_SESSION ['message']="category name already exist!";
         //  header('Location: ../admin/addCategory.php');
     }
     else
      {

    //Insert Category 
       $insert_query = "INSERT INTO category (categoryName , slug , status, popular, description , image) VALUE 
       ('$categoryName','$slug','$status','$popular','$description','$image')";
       $insert_query_run=mysqli_query($con,$insert_query);
   
    if($insert_query_run){
        move_uploaded_file($image_tmp_name , $image_folder);
        redirect("../admin/Category.php" , "Category Added Successfully");
        //   $_SESSION ['message'] = "Category Added Successfully";
        //   header('Location: ../admin/category.php');
     }
     else
     {
        redirect("../admin/addCategory.php" , "Something went wrong"); 
        //   $_SESSION ['message'] = "Something went wrong";
        //   header('Location: ../admin/addCategory.php');
     }
  }

}

else if(isset($_POST['editCategory_btn'])){
    $id = $_POST['id'];
    $categoryName = $_POST['name'];
    $slug = $_POST['slug'];
    $status = isset($_POST['status']) ? '1':'0'; 
    $popular = isset($_POST['popular']) ? '1':'0';
    $description = $_POST['description'];
    $new_image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../Uploads/'.$new_image; 
    $old_image = $_POST['old_image'];  

    if($new_image != ""){
       $update_image = $new_image ;
    }
    else
    {
        $update_image = $old_image ;
    }
 
 
    $update_query = "UPDATE `category` SET categoryName='$categoryName' ,slug='$slug' , status='$status' , 
    popular='$popular' , description='$description' , image='$update_image' WHERE category_id='$id'" ;
    $update_query_run = mysqli_query($con , $update_query);

     if ($update_query_run)
     {
        if($_FILES['image']['name'] != "")
       {
         move_uploaded_file($image_tmp_name , $image_folder);
         if(file_exists("../uploads/".$old_image))
         {
            unlink("../uploads/".$old_image);
         }
       }
        redirect("../admin/category.php" , "Category Update Successfully");
     }
} 

else if(isset($_POST['delateCategory_btn'])){
    
     $id =  $_POST['id'];
     $category_query = "SELECT * FROM category WHERE categoryName = '$id' " ;
     $category_query_run = mysqli_query($con , $category_query) ;
     $category_data = mysqli_fetch_array($category_query_run) ;
     $image = $category_data['image'] ;
  
     $delate_query = " DELETE FROM `category` WHERE category_id = '$id' ";
     $delate_query_run = mysqli_query($con , $delate_query);

     if($delate_query_run)
     {
        if(file_exists("../uploads/".$image))
        {
           unlink("../uploads/".$image);
        }
        redirect("../admin/category.php" , "Category Deleted Successfully");
     }
     else{
        redirect("../admin/category.php" , "Something went wrong");
     }
}

else if(isset($_POST['addProduct_btn'])){

   $category_name = $_POST['category'];
   $productName = $_POST['name'];
   $slug = $_POST['slug'];
   $status = isset($_POST['status']) ? '1':'0'; 
   $description = $_POST['description'];
   $price = $_POST['price'];
   $quantity = $_POST['quantity'];

   //       Image Main 
   $imageMain = $_FILES['imageMain']['name'];
   $imageMain_size = $_FILES['imageMain']['size'];
   $imageMain_tmp_name = $_FILES['imageMain']['tmp_name'];
   $imageMain_folder = '../Uploads/'.$imageMain;
   //      Image Thumbnail 1
   $thumbnail_1 = $_FILES['thumbnail_1']['name'];
   $thumbnail_1_size = $_FILES['thumbnail_1']['size'];
   $thumbnail_1_tmp_name = $_FILES['thumbnail_1']['tmp_name'];
   $thumbnail_1_folder = '../Uploads/'.$thumbnail_1;
   //      Image Thumbnail 2
   $thumbnail_2 = $_FILES['thumbnail_2']['name'];
   $thumbnail_2_size = $_FILES['thumbnail_2']['size'];
   $thumbnail_2_tmp_name = $_FILES['thumbnail_2']['tmp_name'];
   $thumbnail_2_folder = '../Uploads/'.$thumbnail_2;
   //      Image Thumbnail 3
   $thumbnail_3 = $_FILES['thumbnail_3']['name'];
   $thumbnail_3_size = $_FILES['thumbnail_3']['size'];
   $thumbnail_3_tmp_name = $_FILES['thumbnail_3']['tmp_name'];
   $thumbnail_3_folder = '../Uploads/'.$thumbnail_3;
   
   
   //   Do the product name already exists ?
   $select_product =("SELECT * FROM `product` WHERE productName='$productName'");
   $select_product_run=mysqli_query ($con , $select_product);

   if(mysqli_num_rows($select_product_run)> 0)
     {      
          redirect("../admin/addProduct.php" , "Product name already exist!");
         //  $_SESSION ['message']="category name already exist!";
         //  header('Location: ../admin/addCategory.php');
     }
     else
     {


        if($productName != "" && $category_name != "" && $description != "" && $price != "" 
          && $quantity && $price != "" && $slug  && $status != "" && 
          $imageMain != "" && $thumbnail_1 != "" && $thumbnail_2 != "" && $thumbnail_3 != "")
   
        {
           //Insert Products 
           $insert_query = "INSERT INTO product (category_id , productName , slug , status , description , price , quantity , imageMain , 
           thumbnail_1 , thumbnail_2 , thumbnail_3) VALUE ('$category_name' , '$productName' , '$slug' , '$status'  , '$description' , '$price' , 
           '$quantity' , '$imageMain' , '$thumbnail_1' , '$thumbnail_2' ,'$thumbnail_3')";
           $insert_query_run=mysqli_query($con,$insert_query);
 
           if($insert_query_run){
               move_uploaded_file($imageMain_tmp_name , $imageMain_folder);
               move_uploaded_file($thumbnail_1_tmp_name , $thumbnail_1_folder);
               move_uploaded_file($thumbnail_2_tmp_name , $thumbnail_2_folder);
               move_uploaded_file($thumbnail_3_tmp_name , $thumbnail_3_folder);

               redirect("../admin/Product.php" , "Product Added Successfully");
               // $_SESSION ['message'] = "Product Added Successfully";
               // header('Location: ../admin/Product.php');
            }
            else
            {
              redirect("../admin/addProduct.php" , "Something went wrong");
              // $_SESSION ['message'] = "Something went wrong";
              // header('Location: ../admin/addProduct.php');
           }
        }
        else
        {
               redirect("../admin/addProduct.php" , "Something went wrong");
        }
   }
}

else if(isset($_POST['editProduct_btn'])){
   $id = $_POST['id'];
   $category_name = $_POST['category'];
   $productName = $_POST['name'];
   $description = $_POST['description'];
   $price = $_POST['price'];
   $quantity = $_POST['quantity'];
   $slug = $_POST['slug'];
   $status = isset($_POST['status']) ? '1':'0'; 

   //       Image Main 
   $newImageMain = $_FILES['imageMain']['name'];
   $imageMain_size = $_FILES['imageMain']['size'];
   $imageMain_tmp_name = $_FILES['imageMain']['tmp_name'];
   $imageMain_folder = '../Uploads/'.$newImageMain;
   $oldImageMain = $_POST['oldImageMain'];  
   //      Image Thumbnail 1
   $newThumbnail_1 = $_FILES['thumbnail_1']['name'];
   $thumbnail_1_size = $_FILES['thumbnail_1']['size'];
   $thumbnail_1_tmp_name = $_FILES['thumbnail_1']['tmp_name'];
   $thumbnail_1_folder = '../Uploads/'.$newThumbnail_1;
   $oldThumbnail_1 = $_POST['oldThumbnail_1'];  
   //      Image Thumbnail 2
   $newThumbnail_2 = $_FILES['thumbnail_2']['name'];
   $thumbnail_2_size = $_FILES['thumbnail_2']['size'];
   $thumbnail_2_tmp_name = $_FILES['thumbnail_2']['tmp_name'];
   $thumbnail_2_folder = '../Uploads/'.$newThumbnail_2;
   $oldThumbnail_2 = $_POST['oldThumbnail_2'];  
   //      Image Thumbnail 3
   $newThumbnail_3 = $_FILES['thumbnail_3']['name'];
   $thumbnail_3_size = $_FILES['thumbnail_3']['size'];
   $thumbnail_3_tmp_name = $_FILES['thumbnail_3']['tmp_name'];
   $thumbnail_3_folder = '../Uploads/'.$newThumbnail_3;  
   $oldThumbnail_3 = $_POST['oldThumbnail_3'];  

   if($newImageMain != "" && $newThumbnail_1 != "" && $newThumbnail_2 != "" && $newThumbnail_3 != ""){
      $updateImageMain = $newImageMain ;
      $updateThumbnail_1 = $newThumbnail_1 ;
      $updateThumbnail_2 = $newThumbnail_2 ;
      $updateThumbnail_3 = $newThumbnail_3 ;
   }
   else
   {
      $updateImageMain = $oldImageMain ;
      $updateThumbnail_1 = $oldThumbnail_1 ;
      $updateThumbnail_2 = $oldThumbnail_2 ;
      $updateThumbnail_3 = $oldThumbnail_3 ;  
   }


   $update_query = "UPDATE `product` SET category_id='$category_name' ,
   productName='$productName' , description='$description' , 
   price='$price' , quantity='$quantity' ,
   slug='$slug' , status='$status' ,
   imageMain='$updateImageMain' ,
   thumbnail_1='$updateThumbnail_1' ,
   thumbnail_2='$updateThumbnail_2' ,
   thumbnail_3='$updateThumbnail_3' WHERE 
   product_id='$id'" ;
   $update_query_run = mysqli_query($con , $update_query);

    if ($update_query_run)
    {
       if($newImageMain = $_FILES['imageMain']['name']!= "" &&  
       $newThumbnail_1 = $_FILES['thumbnail_1']['name']!= "" &&
       $newThumbnail_2 = $_FILES['thumbnail_2']['name']!= "" &&
       $newThumbnail_3 = $_FILES['thumbnail_3']['name']!= ""
    )
      {
        move_uploaded_file($imageMain_tmp_name , $imageMain_folder);
        move_uploaded_file($thumbnail_1_tmp_name , $thumbnail_1_folder);
        move_uploaded_file($thumbnail_2_tmp_name , $thumbnail_2_folder);
        move_uploaded_file($thumbnail_3_tmp_name , $thumbnail_3_folder);
        if(file_exists("../uploads/".$oldImageMain) && 
           file_exists("../uploads/".$oldThumbnail_1)&& 
           file_exists("../uploads/".$oldThumbnail_2)&& 
           file_exists("../uploads/".$oldThumbnail_3))
        {
           unlink("../uploads/".$oldImageMain);
           unlink("../uploads/".$oldThumbnail_1);
           unlink("../uploads/".$oldThumbnail_2);
           unlink("../uploads/".$oldThumbnail_3);
        }
      }
       redirect("../admin/product.php" , "Product Update Successfully");
    }
} 

else if(isset($_POST['delateProduct_btn'])){
    
   $id =  $_POST['id'];
   $product_query = "SELECT * FROM product WHERE productName = '$id' " ;
   $product_query_run = mysqli_query($con , $product_query) ;
   $product_data = mysqli_fetch_array($product_query_run) ;
   $image = $product_data['imageMain'] ;

   $delate_query = " DELETE FROM `product` WHERE product_id = '$id' ";
   $delate_query_run = mysqli_query($con , $delate_query);

   if($delate_query_run)
   {
      if(file_exists("../uploads/".$image))
      {
         unlink("../uploads/".$image);
      }
      redirect("../admin/product.php" , "Product Deleted Successfully");
      // echo 200 ;
   }
   else{
      redirect("../admin/product.php" , "Something went wrong");
      // echo 500 ;

   }
}

else if( isset($_POST['add-discountCategory'])){

   $category_id = $_POST['category'];
   $percent_discount = $_POST['add-on-category'] ;
   $select_all_product ="SELECT * FROM `product` INNER JOIN `category` ON 
     product.category_id = category.category_id";
   $product_query_run = mysqli_query($con , $select_all_product) ;
   if(mysqli_num_rows($product_query_run)> 0){
      while($fetch_product = mysqli_fetch_array($product_query_run)){
         $category_id = $fetch_product['category_id'];
         $product_id = $fetch_product['product_id'];
         $percent_discount = $_POST['add-on-category'];
           $price = $fetch_product['price'];
           $new_price = ($price) * (1-((int)$percent_discount/100));
         //   $new_price = $fetch_product['price'] - (($fetch_product['price'])*((int)$percent_discount/100));

           $insert_new_price = "UPDATE `product` SET  price_discount='$new_price' , is_discount = '1' , percent_discount='$percent_discount'
                              Where category_id= '$category_id' AND category_id= '$category_id'";
           $product_query_run = mysqli_query($con , $insert_new_price) ;
           redirect("../admin/offers.php" , "Discount Added Successfully");
       }
   
   }
   else{
      redirect("../admin/offers.php" , "Delete previous offer");

    }
}

else if( isset($_POST['remove-discountCategory'])){

   $category_id = $_POST['category'];
   // $percent_discount = 0;
   $select_all_product ="SELECT * FROM `product` WHERE is_discount='1' AND category_id='$category_id'";
   $product_query_run = mysqli_query($con , $select_all_product) ;
   if(mysqli_num_rows($product_query_run)> 0){
         while($fetch_product = mysqli_fetch_array($product_query_run)){
            $id = $fetch_product['category_id'];
            $insert_new_price = "UPDATE `product` SET is_discount = '0' , price_discount = '0' , percent_discount = '0' 
                              WHERE category_id = '$id'";
            $product_query_run = mysqli_query($con , $insert_new_price) ;
            redirect("../admin/offers.php" , "Discount Removed Successfully");
         }
      
   }
   else{
      redirect("../admin/offers.php" , "No Discount");

   }
}

else if( isset($_POST['add-discountAllProduct'])){

   $percent_discount = $_POST['add-on-product'] ;
   $select_all_product ="SELECT * FROM `product` WHERE is_discount='0'";
   $product_query_run = mysqli_query($con , $select_all_product) ;
   if(mysqli_num_rows($product_query_run)> 0){
         while($fetch_product = mysqli_fetch_array($product_query_run)){
         $product_id = $fetch_product['product_id'];
         $price = $fetch_product['price'] ;
         $new_price = $price * (1-((int)$percent_discount/100));
         //   $new_price = $fetch_product['price'] - (($fetch_product['price'])*((int)$percent_discount/100));

           $insert_new_price = "UPDATE `product` SET  price_discount='$new_price' , is_discount = '1' , percent_discount='$percent_discount' WHERE product_id = '$product_id'";
           $product_query_run = mysqli_query($con , $insert_new_price) ;
           redirect("../admin/offers.php" , "Discount Added Successfully");
       }
       
   }
   else{
      redirect("../admin/offers.php" , "Delete previous offer");

    }
}

else if( isset($_POST['remove-discountAllProduct'])){

   $select_all_product ="SELECT * FROM `product` WHERE is_discount='1'";
   $product_query_run = mysqli_query($con , $select_all_product) ;
   if(mysqli_num_rows($product_query_run)> 0){
         while($fetch_product = mysqli_fetch_array($product_query_run)){
            $insert_new_price = "UPDATE `product` SET is_discount = '0' , price_discount = '0' , percent_discount = '0' ";
            $product_query_run = mysqli_query($con , $insert_new_price) ;
            redirect("../admin/offers.php" , "Discount Removed Successfully");
         }
      
   }
   else{
      redirect("../admin/offers.php" , "No Discount");

   }
}

else if( isset($_POST['add-discountProduct'])){

   $product_id = $_POST['product'];
   $percent_discount = $_POST['add-on-product'] ;
   $select_all_product ="SELECT * FROM `product` WHERE is_discount='0' AND product_id='$product_id'";
   $product_query_run = mysqli_query($con , $select_all_product) ;
   if(mysqli_num_rows($product_query_run)> 0){
         while($fetch_product = mysqli_fetch_array($product_query_run)){

            $id = $fetch_product['product_id'];
           $new_price = $fetch_product['price'] * (1-((int)$percent_discount/100));
         //   $new_price = $fetch_product['price'] - (($fetch_product['price'])*((int)$percent_discount/100));

            $insert_new_price = "UPDATE `product` SET  price_discount='$new_price' , is_discount = '1' , percent_discount='$percent_discount' WHERE product_id = '$id'";
            $product_query_run = mysqli_query($con , $insert_new_price) ;
            redirect("../admin/offers.php" , "Discount Added Successfully");
      }
      
   }
   else{
      redirect("../admin/offers.php" , "Delete previous offer");

    }
}

else if( isset($_POST['remove-discountProduct'])){

   $product_id = $_POST['product'];
   $select_all_product ="SELECT * FROM `product` WHERE is_discount='1' AND product_id='$product_id'";
   $product_query_run = mysqli_query($con , $select_all_product) ;
   if(mysqli_num_rows($product_query_run)> 0){
         while($fetch_product = mysqli_fetch_array($product_query_run)){
            $id = $fetch_product['product_id'];
            $insert_new_price = "UPDATE `product` SET is_discount = '0' , price_discount = '0' , percent_discount = '0' WHERE product_id = '$id'";
            $product_query_run = mysqli_query($con , $insert_new_price) ;
            redirect("../admin/offers.php" , "Discount Removed Successfully");
         }
      
   }
   else{
      redirect("../admin/offers.php" , "No Discount");

   }

}
// else if( isset($_POST['addTOcart'])){
//    // $_SESSION['auth_user']['user_id'];
//    $productId = $_POST['product_id'];
//    $product_name = $_POST['name'];
//    $product_price = $_POST['price'];
//    $product_image = $_POST['image'];
//    $product_qty = $_POST['qty'];
//    $send_to_cart ="INSERT INTO cart ( product_id , product_name , product_price , product_image , product_qty)
//    VALUES ( '$productId' , '$product_name' , '$product_price','$product_image' , '$product_qty')";
//    $send_to_cart = mysqli_query($con , $send_to_cart) ;
// }



?>