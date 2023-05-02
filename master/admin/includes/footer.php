<footer class="footer pt-5">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
          <div class="col-lg-12">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
  </main>

  <script src="assets/js/jquery-3.6.3.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/perfect-scrollbar.min.js"></script>
  <script src="assets/js/material-dashboard.js"></script>
  <script src="assets/js/smooth-scrollbar.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="assets/js/admin.js"></script>

    <!-- Alertify Js -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <script>
     <?php 
     if (isset($_SESSION ['message']))
     { ?>
         alertify.set('notifier' , 'position' , 'top-center');
         alertify.success('<?= $_SESSION ['message']?>');
     <?php 
         unset($_SESSION ['message']);
     } 
     ?>
  </script>
  <script>
      function openForm() {
        document.getElementById("popupForm").style.display = "block";
      }
      function closeForm() {
        document.getElementById("popupForm").style.display = "none";
      }
      </script>
<!-- <script>
//  $(document).ready(function(){
//     $('.delateProduct_btn').click(function(e){
//       e.preventDefault();
//       var product_id = $(this).val();
//       // alert(product_id);
  
//       swal({
//         title: "Are You Sure Delete?",
//         text: "Once Deleted, You Will Not Be Able To Recover",
//         icon: "warning",
//         buttons: true,
//         dangerMode: true,
      
//       })
    
//       .then((willDelete) => {
//         if (willDelete) {
//           $.ajax({
//              type: "POST",
//              url:"../functions/code.php",
//              data:{
//               'delete_id':product_id,
//               'delateProduct_btn':true,
//              },
//              success : function (response){
//               console.log(response);
//                 if(response == 200)
//                 {
//                   swal("Success!", "Product Deleted Successfully!", "success");
//                   $("#product_table").load(location.href + " #product_table");
//                 }
//                 else if(response == 500)
//                 swal("Error!", "Something went wrong!", "error");
//              }
            
//           });
        
//         } 
//       });
//     });
  
//  });
    
</script>

<script>
//  $(document).ready(function(){
//     $('.delateCategory_btn').click(function(e){
//       e.preventDefault();
//       var product_id = $(this).val();
//       // alert(product_id);
  
//       swal({
//         title: "Are You Sure Delete?",
//         text: "Once Deleted, You Will Not Be Able To Recover",
//         icon: "warning",
//         buttons: true,
//         dangerMode: true,
      
//       })
    
//       .then((willDelete) => {
//         if (willDelete) {
//           $.ajax({
//              type: "POST",
//              url:"../functions/code.php",
//              data:{
//               'delete_id':product_id,
//               'delateCategory_btn':true,
//              },
//              success : function (response){
//               console.log(response);
//                 if(response == 200)
//                 {
//                   swal("Success!", "Category Deleted Successfully!", "success");
//                   $("#category_table").load(location.href + " #category_table");
//                 }
//                 else if(response == 500)
//                 swal("Error!", "Something went wrong!", "error");
//              }
            
//           });
        
//         } 
//       });
//     });
  
//  });
    
</script>

<script>
//  $(document).ready(function(){
//     $('.delateOrder_btn').click(function(e){
//       e.preventDefault();
//       var id = $(this).val();
//       // alert(id);
  
//       swal({
//         title: "Are You Sure Delete?",
//         text: "Once Deleted, You Will Not Be Able To Recover",
//         icon: "warning",
//         buttons: true,
//         dangerMode: true,
      
//       })
    
//       .then((willDelete) => {
//         if (willDelete) {
//           $.ajax({
//              type: "POST",
//              url:"../functions/code.php",
//              data:{
//               'delete_id':id,
//               'delateOrder_btn':true,
//              },
//              success : function (response){
//               console.log(response);
//                 if(response == 200)
//                 {
//                   swal("Success!", "Order Deleted Successfully!", "success");
//                   $(".order_table").load(location.href + " .order_table");
//                 }
//                 else if(response == 500)
//                 swal("Error!", "Something went wrong!", "error");
//              }
            
//           });
        
//         } 
//       });
//     });
  
//  });
    
</script> -->

<!-- <script>
  $(document).ready(function(){
    $('.delateUsers_btn').click(function(e){
      e.preventDefault();
      var id = $(this).val();
      // alert(id);
  
      swal({
        title: "Are You Sure Delete?",
        text: "Once Deleted, You Will Not Be Able To Recover",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      
      })
    
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
             type: "POST",
             url:"../functions/code.php",
             data:{
              'delete_id':id,
              'delateUsers_btn':true,
             },
             success : function (response){
              console.log(response);
                if(response == 200)
                {
                  swal("Success!", "User Deleted Successfully!", "success");
                  $("#user_table").load(location.href + " #user_table");
                }
                else if(response == 500)
                swal("Error!", "Something went wrong!", "error");
             }
            
          });
        
        } 
      });
    });
  
 });
</script> -->
  
  </body>

</html>