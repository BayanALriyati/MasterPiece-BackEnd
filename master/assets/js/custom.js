// $(document).ready(function(){



// $('.increment-btn').click(function (e) {

// e.preventDefault();

// var qty = $(this).closest('.product_data').find('.input-qty').val();



// var value = parseInt(qty, 10); 
// value = isNaN(value)? 0 : value;


// if(value < 10)
// {
// value++;

// $(this).closest('.product_data').find('.input-qty').val(value);


// }


// });
// });

   $('.addCartBtn').click(function (e){
    e.preventDefault();
    var qty = $(this).closest('.product-data').find('.input-qty').val();
    var product_id = $(this).val();
    alert(product_id);
    // $.ajax({
    //          mothed: "POST",
    //          url:"./functions/handleCart.php",
    //          data:{
    //           'product_id': product_id,
    //           'product_qty': qty,
    //           'scope' : "add" ,
    //         },
    //           success : function (response){
    //             if(response == 201){
    //               alertify.success ("Product Added TO Cart")
    //             }
    //             else if (response == 401){
    //               alertify.success ("Login To Continue")
    //             }
    //             else if (response == 500){
    //               alertify.success ("Something Error")
    //             }
    //          }
             
    //         })
   }) 