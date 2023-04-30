 <?php 
include_once ('includes/header.php');
include_once ('../middleware/adminMiddleware.php');
include_once ('../functions/myfunctions.php') ;


?>
<div class="container">
  <div class="row">
    <div class="col-md-12 mb-5 text-center">
       <?php 
           if(isset($_SESSION['auth']))
           {
            ?>
                <h2>Welcome <?= $_SESSION['auth_user']['name']; ?></h2>
         <?php 
            }
           ?>    
    </div>
<div class="row">
 <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 ">
  <div class="card mb-5">
  <div class="card-header p-3 pt-2 mb-5">
    <div class="icon icon-lg icon-shape bg-primary shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
      <i class="fa-sharp fa-solid fa-gifts"></i>
      <!-- <i class='bx bxs-gift-circle' ></i> -->

    </div>
    <?php
            $product = getAll("product");

            if(mysqli_num_rows($product)> 0 )
            {
              $number_of_products = mysqli_num_rows($product);
              ?>
    <div class="text-end pt-1">
      <p class="text-sm mb-0 text-capitalize">All Gifts</p>
      <h4 class="mb-0"><?= $number_of_products; ?></h4>
    </div>
    <?php
                        }
                         else
                         {
                        
                          // redirect("../category.php","Don't found");
                          $_SESSION ['message']="Don't found";
                          // header('Location: ../category.php');
                        }
                      
                    ?>
  </div>

  <hr class="dark horizontal my-0">
  <div class="card-footer p-3">
    <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span>Gifts</p>
  </div>
  </div>
 </div>

 <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 ">
  <div class="card mb-5">
    <div class="card-header p-3 pt-2 mb-5">
      <div class="icon icon-lg icon-shape bg-primary shadow-info text-center border-radius-xl mt-n4 position-absolute">
        <i class='bx bxs-dollar-circle' ></i>
      </div>
      <?php
           $total_sales = 0;
           $sales = getAll("orders");

           if(mysqli_num_rows($sales)> 0 )
           {
             while($fetch_sales = mysqli_fetch_array($sales)){ 
                $total_sales += $fetch_sales['total_price'];    
                // echo $total_sales ;    
             }
            }
            else
                  {   
                    // redirect("../category.php","Don't found");
                    $_SESSION ['message']="Don't found";
                    // header('Location: ../category.php');
                  }
               ?> 
      <div class="text-end pt-1">
         <p class="text-sm mb-0 text-capitalize">Tolal Sales</p>
         <h4 class="mb-0 "><?= $total_sales; ?></h4>
      </div>
    </div>

      <hr class="horizontal my-0 dark">
      <div class="card-footer p-3">
        <p class="mb-0 ">Sales</p>
      </div>
  </div>
</div>

 <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 ">
  <div class="card mb-5">
  <div class="card-header p-3 pt-2 mb-5">
    <div class="icon icon-lg icon-shape fs-5 bg-primary shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
      <i class='bx bx-list-check' ></i>
    </div>
    <?php
            $orders = getAll("orders");

            if(mysqli_num_rows($orders)> 0 )
            {
              $number_of_orders = mysqli_num_rows($orders);
              ?>
    <div class="text-end pt-1">
      <p class="text-sm mb-0 text-capitalize">All Orders</p>
      <h4 class="mb-0"><?= $number_of_orders; ?></h4>
    </div>
    <?php
                        }
                         else
                         {
                        
                          // redirect("../category.php","Don't found");
                          $_SESSION ['message']="Don't found";
                          // header('Location: ../category.php');
                        }
                      
                    ?>
   </div>

   <hr class="dark horizontal my-0">
   <div class="card-footer p-3">
    <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span>Orders</p>
   </div>
  </div>
 </div>

<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 ">
  <div class="card mb-5">
    <div class="card-header p-3 pt-2 mb-5">
      <div class="icon icon-lg icon-shape bg-primary shadow-info text-center border-radius-xl mt-n4 position-absolute">
        <i class='bx bx-list-plus' ></i>
      </div>
      <?php
           $total_sales = 0;
           $sales = getAll("orders");

           if(mysqli_num_rows($sales)> 0 )
           {
             while($fetch_sales = mysqli_fetch_array($sales)){ 
                $total_sales += $fetch_sales['total_price'];    
                // echo $total_sales ;    
             }
            }
            else
                  {   
                    // redirect("../category.php","Don't found");
                    $_SESSION ['message']="Don't found";
                    // header('Location: ../category.php');
                  }
               ?> 
      <div class="text-end pt-1">
         <p class="text-sm mb-0 text-capitalize">Tolal Sales</p>
         <h4 class="mb-0 "><?= $total_sales; ?></h4>
      </div>
    </div>

      <hr class="horizontal my-0 dark">
      <div class="card-footer p-3">
        <p class="mb-0 ">Sales</p>
      </div>
  </div>
</div>

<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 ">
  <div class="card mb-5">
    <div class="card-header p-3 pt-2 mb-5">
      <div class="icon icon-lg icon-shape bg-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">     
         <i class='bx bx-user'></i>
      </div>
       <?php
            $admins = getByRole("users" , 1);
            if(mysqli_num_rows($admins)> 0 )
            {
              $number_of_admins = mysqli_num_rows($admins);
              ?>
      <div class="text-end pt-1">
        <p class="text-sm mb-0 text-capitalize">All Admins</p>
        <h4 class="mb-0"><?= $number_of_admins; ?></h4>
      </div>
      <?php
                        }
                         else
                         {
                        
                          // redirect("../category.php","Don't found");
                          $_SESSION ['message']="Don't found";
                          // header('Location: ../category.php');
                        }
                      
                    ?>
    </div>

     <hr class="dark horizontal my-0">

     <div class="card-footer p-3">
         <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span>Admins</p> 
     </div>
  </div>
</div>

<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 ">
 <div class="card mb-5">
  <div class="card-header p-3 pt-2 mb-5">
    <div class="icon icon-lg icon-shape bg-primary shadow-success text-center border-radius-xl mt-n4 position-absolute">
      <i class="fa-solid fa-users"></i>
    </div>
    <?php
            $users = getByRole("users" , 0);
            if(mysqli_num_rows($users)> 0 )
            {
              $number_of_users = mysqli_num_rows($users);
              ?>
    <div class="text-end pt-1">
      <p class="text-sm mb-0 text-capitalize ">All Users</p>
      <h4 class="mb-0 "><?= $number_of_users; ?></h4>
      <?php
                        }
                         else
                         {
                        
                          // redirect("../category.php","Don't found");
                          $_SESSION ['message']="Don't found";
                          // header('Location: ../category.php');
                        }
                      
                    ?>
    </div>
  </div>

  <hr class="horizontal my-0 dark">
  <div class="card-footer p-3">
    <p class="mb-0 "><span class="text-success text-sm font-weight-bolder"></span>Users</p>
  </div>
 </div>
</div>
  </div>
 </div>
</div>
<!-- </div> -->

<?php
  include_once ('includes/footer.php');
?>