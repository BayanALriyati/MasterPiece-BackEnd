$(document).ready(function(){
//   $(document).on('click','.delateProduct_btn'(e){
    $('.delateProduct_btn').click(function(e){
      e.preventDefault();
      var id= $(this).val();
      // alert("id");
      swal({
        title: "Are you sure delete product?",
        text: "Once deleted, you will not be able to recover",
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
              'id':id,
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
