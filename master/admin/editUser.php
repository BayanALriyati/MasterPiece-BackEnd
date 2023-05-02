
<?php 
include_once ('includes/header.php');
include_once ('../middleware/adminMiddleware.php');
include_once ('../config/connect.php');
include_once ('../functions/myfunctions.php') ;

?>
<?php
                   if (isset($_SESSION ['message'])){
                  ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                         <?= $_SESSION ['message']; ?>
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                    <?php  
                        unset($_SESSION ['message']);
                       }
                     ?>
<div class="container mt-2">
  <div class="row">
    <div class="col-md-12 shadow-lg p-3 mb-3 bg-primary rounded ">
     <?php 
      if(isset($_GET['id']))
      {
        $id = $_GET['id'];

              $users = getByIdOne("users" , "$id");
              if(mysqli_num_rows($users)> 0 )
             { 
                foreach($users as $data){
            ?>
        <!-- // $sql="SELECT *FROM users WHERE User_id='$id'";
        // $users = mysqli_query($con,$sql);
        
        // if(mysqli_num_rows($users) > 0)
        // {
        //   $data = mysqli_fetch_array($users); -->
        <!-- //   ?>  -->
           <div class="card shadow-lg p-3 mb-3 bg-white rounded">
             <div class="card-header">
               <h4>Edit User</h4>
             </div>
             <div class="card-body">
             <form action="../functions/code.php" method="POST" enctype="multipart/form-data" disabled>
                <div class="row">
                <input type="hidden" name="id" value="<?= $data['User_id'];?>"/>
                 <div class="col-md-12">
                  <label for="" class="label">Name</label>
                  <input type="text" value="<?= $data['name'];?>" placholder="<?= $data['name'];?>" name="name" class="form-control" required>
                 </div>
                 <div class="col-md-12">
                  <label for="" class="label">Email</label>
                  <input type="email" name="email" value="<?= $data['email'];?>" class="form-control" required>
                 </div>
                 <div class="col-md-12 my-3">
                  <label for="" class="label">Role</label>
                  <input type="checkbox" name="role" <?= $data['role'] ? "checked":"" ?>>
                 </div>                           
                 <div class="col-md-12">
                  <label for="" class="label">Upload Image</label>
                  <input type="hidden" name="old_image" class="form-control" value="<?= $data['image'];?>" accept="image/*" required>
                  <input type="file" name="image" class="form-control" value="<?= $data['image'];?>">
                  <label for="" class="label">Current Image</label>
                  <!-- <input type="hidden" name="old_image" class="form-control" value="<?= $data['image']?>" required> -->
                  <img src="../uploads/<?= $data['image'];?>" height="90" width="100" />
                 </div>
                 <div class="col-md-12"> 
                  <button type="submit" class="btn btn-primary mt-5" name="editUser_btn">Update</button>
                 </div>
                </div>
              </form>
             </div>
           </div>  
          <?php
      }
    }
      else
      {
            $_SESSION ['message']="users not found";
            header('Location: admin/admins.php');
      }
    }
           ?>
    </div>
  </div>
</div>

<?php
  include_once ('./includes/footer.php');
?>
