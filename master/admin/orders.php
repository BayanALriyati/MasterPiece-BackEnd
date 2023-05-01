<?php 
//  session_start();
include_once ('includes/header.php');
include_once ('../middleware/adminMiddleware.php');
include_once ('../config/connect.php') ;
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



     <!-- CONTENT -->
	<section id="content" class="order_table">
		<!-- MAIN -->
		<main>
		    <div class="head-title">
				    <div class="left">
					    <h1>Orders</h1>
				    </div>
	        </div> 
                
	   
		<!-- _____________ -->

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Orders</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Person Information</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Order Time</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $orders = getAllOrder("orders");

                        if(mysqli_num_rows($orders)> 0 )
                        {
                          while($fetch_orders = mysqli_fetch_array($orders)){ 
                            $i=0;
                          
                            ?>
                            <tr></tr>
                            <td>
                              <div class="d-flex px-2 py-1 text-crnter">
                                <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-sm"><span>Name:<?= $fetch_orders['fullName'];?></span></h6>
                                  <p class="text-xs text-secondary mb-0"><span>Phone:<?= $fetch_orders['phone'];?></p>
                                  <p class="text-xs text-secondary mb-0"><span>Email:<?= $fetch_orders['email'];?></p>
                                </div>
                              </div>
                            </td>
                            <td class="align-center text-center text-sm">
                               <p class="text-xs text-secondary mb-0"><?= $fetch_orders['order_time'];?></p>
                            </td>                          
                            </td>
                            <td class="align-center text-center text-sm">
                                <div class="flex-btn">
                                <form action="../functions/code.php" method="POST" enctype="multipart/form-data">
                                  <input type="hidden" name="order_id" value="<?= $fetch_orders['order_id']; ?>">
                                  <select name="status" class="select">
                                     <option selected disabled><?= $fetch_orders['status']; ?></option>
                                     <option value="pending">pending</option>
                                     <option value="completed">completed</option>
                                  </select>
                                    <button class="bg-primary" value="<?= $fetch_orders['order_id']; ?>" name="updateOrder"><i class="fa-solid fa-pen-to-square fa-solid"></i></button>
                                    <!-- <a href="../functions/code?editStatus=<?= $fetch_orders['order_id']?>"><i class="fa-solid fa-pen-to-square fa-solid"></i></a> -->
                                  <!-- <input type="submit" value="update" class="option-btn" name="update_payment"> -->
                                  <!-- <a href="placed_orders.php?delete=<?= $fetch_orders['order_id']; ?>" class="delete-btn" onclick="return confirm('delete this order?');">delete</a> -->
                                  <!-- <button class="bg-primary"><a href="orderView.php?order=<?= $fetch_orders['order_id']?>"><i class="fas fa-eye"></i></a></button> -->
                                  </form>
                                </div>
                              
                              <!-- <button class="bg-primary"><a href="orderView.php?order=<?= $fetch_orders['order_id']?>"><i class="fa-solid fa-eye fa-solid"></i></a></button> -->

                            </td>
                            <td class="align-center text-center text-sm">
                            <!-- <button class="bg-primary"><a href="orderView.php?order=<?= $fetch_orders['order_id']?>"><i class="fa-solid fa-eye fa-solid"></i></a></button> -->

                              <!-- <form action="" method="post"> -->
                                  <!-- <input type="hidden" name="order_id" value="<?= $fetch_orders['order_id']; ?>"> -->
                                  <div class="flex-btn">
                                     <button class="bg-primary"><a href="orderView.php?order=<?= $fetch_orders['order_id']?>"><i class="fa-solid fa-eye fa-solid"></i></a></button>
                                     <!-- <a href="orderView.php?order=<?= $fetch_orders['order_id']?>"><i class="fas fa-eye"></i></a> -->
                                     <form action="../functions/code.php" method="POST">
                                     <input type="hidden" name="id" value="<?= $fetch_orders['order_id']?>"/>
                                     <button type="button" class="delateOrder_btn bg-primary" value="<?= $fetch_orders['order_id']; ?>" name="delateOrder_btn"><i class="fa-solid fa-trash fa-solid"></i></button>
                                    </form>
                                  </div>
                               <!-- </form> -->
                            </td>
                          </tr>
                      <?php
                        }
                      }
                    
                          else
                          {
                            $_SESSION ['message']="Don't found";
                            // header('Location: orders.php');
                          // $_SESSION ['message']="Don't found";
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
