<?php 
include_once ('includes/header.php');
include_once ('../middleware/adminMiddleware.php');
include_once ('../config/connect.php') ;
// include_once ('../functions/code.php') ;
// include_once ('../functions/myfunctions.php') ;


?>



     <!-- CONTENT -->
	<section id="content">
		<!-- MAIN -->
		<main>
		<div class="head-title">
				<div class="left">
					<h1>Category</h1>
				</div>
				<a href="addCategory.php" class="btn-download">
				<i class="fa-solid fa-plus"></i>
				<span class="text">Add New Category</span>
				</a>
			</div>
		<!-- _____________ -->

        <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Category</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                      <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Remove Sale</th> -->
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                         
                         $sql ="SELECT *FROM users WHERE role='1'";
                         $users =mysqli_query($con,$sql);

                        if(mysqli_num_rows($users)> 0 )
                        {
                          foreach($users as $item)
                          {
                            ?>
                            <tr></tr>
                            <td>
                              <div class="d-flex px-2 py-1">
                                <!-- <input type="hidden" > -->
                                <div>
                                  <img src="../uploads/<?= $item['image']?>" class="avatar avatar-sm me-3 border-radius-lg" alt="image">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-sm"><?= $item['name']?></h6>
                                </div>
                              </div>
                            </td>
                            <td class="align-center text-center text-sm">
                                  <h6 class="mb-0 text-sm"><?= $item['email']?></h6>
                            </td>
                            <!-- <td class="align-center text-center text-sm">
                              <a href=""><i class="fa-solid fa-square-minus delete1"></i></a>
                            </td> -->
                            <td class="align-center text-center text-sm">
                                <button><a href="editUser.php?id=<?= $item['User_id']?>"><i class="fa-solid fa-pen-to-square fa-solid"></i></a></button>
                            </td>
                            <td class="align-center text-center text-sm">
                                <form action="../functions/code.php" method="POST">
                                  <input type="hidden" name="id" value="<?= $item['User_id']?>"/>
                                  <button type="submit" name="delateUser_btn"><i class="fa-solid fa-trash delete1"></i></button>
                                </form>
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
  include ('./includes/footer.php');
?>
