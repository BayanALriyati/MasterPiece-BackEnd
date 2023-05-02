$(document).ready(function(){
    $('.delateProduct_btn').click(function(e){
      e.preventDefault();
      var product_id = $(this).val();
      // alert(product_id);
  
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
              'delete_id':product_id,
              'delateProduct_btn':true,
             },
             success : function (response){
              console.log(response);
                if(response == 200)
                {
                  swal("Success!", "Product Deleted Successfully!", "success");
                  $("#product_table").load(location.href + " #product_table");
                }
                else if(response == 500)
                swal("Error!", "Something went wrong!", "error");
             }
            
          });
        
        } 
      });
    });
  
 });



 $(document).ready(function(){
    $('.delateCategory_btn').click(function(e){
      e.preventDefault();
      var product_id = $(this).val();
      // alert(product_id);
  
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
              'delete_id':product_id,
              'delateCategory_btn':true,
             },
             success : function (response){
              console.log(response);
                if(response == 200)
                {
                  swal("Success!", "Category Deleted Successfully!", "success");
                  $("#category_table").load(location.href + " #category_table");
                }
                else if(response == 500)
                swal("Error!", "Something went wrong!", "error");
             }
            
          });
        
        } 
      });
    });
  
 });

 $(document).ready(function(){
    $('.delateOrder_btn').click(function(e){
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
              'delateOrder_btn':true,
             },
             success : function (response){
              console.log(response);
                if(response == 200)
                {
                  swal("Success!", "Order Deleted Successfully!", "success");
                  $(".order_table").load(location.href + " .order_table");
                }
                else if(response == 500)
                swal("Error!", "Something went wrong!", "error");
             }
            
          });
        
        } 
      });
    });
  
 });

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

 $(document).ready(function(){
    $('.delateAdmin_btn').click(function(e){
      e.preventDefault();
      var product_id = $(this).val();
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
              'delete_id':product_id,
              'delateAdmin_btn':true,
             },
             success : function (response){
              console.log(response);
                if(response == 200)
                {
                  swal("Success!", "Admin Deleted Successfully!", "success");
                  $("#admin_table").load(location.href + " #admin_table");
                }
                else if(response == 500)
                swal("Error!", "Something went wrong!", "error");
             }
            
          });
        
        } 
      });
    });
  
 });

