

<!-- Remove the container if you want to extend the Footer to full width. -->
   <div class="container-fluid my-5">
   
       <footer class="bg-danger-subtle text-center text-lg-start text-white">
         <!-- Grid container -->
         <div class="container p-4">
           <!--Grid row-->
           <div class="row my-4">
             <!--Grid column-->
             <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
     
               <div class="rounded-circle bg-white shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto" style="width: 100px; height: 100px;">
                   <img src="assets/images/logo-color.png" alt="logo" style="width: 100px; height: 100px;" loading="lazy" />
               </div>
     
               <p class="text-center text-black fs-1">The Best Gifts</p>
       
             </div>
             <!--Grid column-->
     
             <!--Grid column-->
             <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
               <h5 class="text-uppercase text-black mb-4 fs-2">Quick links</h5>
     
               <ul class="list-unstyled">
                 <li class="mb-2">
                   <a href="./index.html" class="text-black fs-3"><i class="fas fa-home pe-3 fs-3"></i>Home</a>
                 </li>
                 <li class="mb-2">
                   <a href="./yourGift.html" class="text-black fs-3"><i class="fas fa-gift pe-3 fs-3"></i>Your Gift</a>
                 </li>
                 <li class="mb-2">
                   <a href="./aboutUs.html" class="text-black fs-3"><i class="fas fa-question pe-3 fs-3"></i>About US</a>
                 </li>
                 <li class="mb-2">
                   <a href="./contactUs.html" class="text-black fs-3"><i class="fas fa-address-card pe-3 fs-3"></i>Contact Us</a>
                 </li>
               </ul>
             </div>
             <!--Grid column-->
             
             <!--Grid column-->
             <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
               <h5 class="text-uppercase text-black mb-4 fs-2">Our Social</h5>
     
               <ul class="list-unstyled">
                 <li class="mb-2">
                  <a class="text-black px-2 fs-3" href="https://www.facebook.com/" target="_blank">
                    <i class="fab fa-twitter pe-3 fs-3"></i>facebook
                  </a>
                 </li>
                 <li class="mb-2">
                  <a class="text-black px-2 fs-3" href="https://twitter.com/" target="_blank">
                    <i class="fab fa-twitter pe-3 fs-3"></i>twitter
                  </a>
                 </li>
                 <li class="mb-2">
                  <a class="text-black px-2 fs-3" href="https://www.instagram.com/" target="_blank">
                    <i class="fab fa-instagram pe-3 fs-3"></i>instagram
                  </a>
                 </li>
                 <li class="mb-2">
                  <a class="text-black ps-2 fs-3" href="https://web.whatsapp.com/" target="_blank">
                    <i class="fab fa-whatsapp pe-3 fs-3"></i>whatsapp
                  </a>
                 </li>
               </ul>
             </div>
             <!--Grid column-->
             
             
             
             
             <!--Grid column-->
             <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
               <h5 class="text-uppercase text-black mb-4 fs-2">Contact us</h5>
     
               <ul class="list-unstyled">
                 <li>
                   <p class="text-black fs-3"><i class="fas fa-map-marker-alt pe-3 fs-3"></i>Aqaba-Jordan</p>
                 </li>
                 <li>
                   <p class="text-black fs-3"><i class="fas fa-phone pe-3  fs-3"></i>0786324604</p>
                 </li>
                 <li>
                   <p class="text-black fs-3"><i class="fas fa-envelope pe-3 fs-3"></i>gift@gmail.com</p>
                 </li>
               </ul>
             </div>
             <!--Grid column-->
           </div>
           <!--Grid row-->
         </div>
         <!-- Grid container -->
     
         <!-- Copyright -->
         <div class="text-center p-3 fs-3" style="background-color:#621147">
           © 2020 Copyright:
           <a class="text-white fs-3" href="https://mdbootstrap.com/">THE BEST GIFT</a>
         </div>
         <!-- Copyright -->
       </footer>
     
     </div>
     <!-- End of .container -->
     <script src="assets/js/jquery-3.6.3.min.js"></script>
     <script src = "https://ajax.googleapis.com/ajax/libs/jQuery/3.3.1/jQuery.min.js"></script>
     <!-- <script src="assets/js/script.js"></script> -->
     <!-- <script src="assets/js/custom.js"></script> -->

  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/perfect-scrollbar.min.js"></script>
  <script src="assets/js/smooth-scrollbar.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
   
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- <script src="assets/js/script.js"></script> -->
   <!-- <script src="assets/js/silder.js"></script> -->
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
    var ProductImg = document.getElementById('ProductImg');
    var SmallImg = document.getElementsByClassName('small-img');
    SmallImg[0].onclick = function() {
      ProductImg.src = SmallImg[0].src;
    };
    SmallImg[1].onclick = function() {
      ProductImg.src = SmallImg[1].src;
    };
    SmallImg[2].onclick = function() {
      ProductImg.src = SmallImg[2].src;
    };
    SmallImg[3].onclick = function() {
      ProductImg.src = SmallImg[3].src;
    };
  </script>
  <script>
  var swiper = new Swiper(".products-slider", {
  spaceBetween: 10,
  loop:true,
  centeredSlides: true,
  autoplay: {
    delay: 9500,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    450: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 3,
    },
    // 1024: {
    //   slidesPerView: 4,
    // },
  },
});
</script>

<script>
profile = document.querySelector('.header .flex .profile');

document.querySelector('#user-btn').onclick = () =>{
   profile.classList.toggle('active');
}
  </script>
 
  <script>
		function createDiv() {
			const selectBox = document.getElementById("selectBox");
			const selectedValue = selectBox.value;
			if (selectedValue === "Credit card") {
				const div = document.createElement("div");
				div.innerHTML = "You selected Credit card";
				document.getElementById("output").appendChild(div);
				document.getElementById("output").style.display = "block";
			
     
    } else if (selectedValue === "Pay Cash") {
				document.getElementById("output").innerHTML = "You selected green";
				document.getElementById("output").style.display = "none";
			} else {
				document.getElementById("output").style.display = "none";
			}
		
    }
	</script>
 
<script>
 $(document).ready(function(){
  $('.increment-btn').click(function (e) {

    e.preventDefault();

    var qty = $('.input-qty').val();

    var value = parseInt(qty, 20); 
    value = isNaN(value)? 0 : value;


    if(value < 20)
    {
       value++;
      $('.input-qty').val(value);
    }
});

$('.decrement-btn').click(function (e) {

  e.preventDefault();
  var qty = $('.input-qty').val();

  var value = parseInt(qty, 20); 
  value = isNaN(value)? 0 : value;


  if(value > 1)
  {
   value--;
  $('.input-qty').val(value);
  // alert(qty);
  }
});

$('.addToCartBtn').click(function (e){
    e.preventDefault();
    var qty = $('.input-qty').val();

    var product_id = $(this).val();
    alert(product_id);
  
   }) 
});
</script>

<script>
  $(document).ready(function(){
    $('.btnCartDelete').click(function(e){
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
             url:"./functions/handleAdd.php",
             data:{
              'delete_all':id,
              'btnCartDelete':true,
             },
             success : function (response){
              console.log(response);
                if(response == 200)
                {
                  swal("Success!", "Items Deleted Successfully!", "success");
                  $("#delete_all").load(location.href + " #delete_all");
                }
                else if(response == 500)
                swal("Error!", "Something went wrong!", "error");
             }
            
          });
        
        } 
      });
    });
  
 });
</script> 

<script>
  $(document).ready(function(){
    $('.btnDelete').click(function(e){
      e.preventDefault();
      var id = $(this).val();
      alert(id);
  
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
             url:"./functions/handleAdd.php",
             data:{
              'deleteCart_id':id,
              'btnDelete':true,
             },
             success : function (response){
              console.log(response);
                if(response == 200)
                {
                  swal("Success!", "Item Deleted Successfully!", "success");
                  $("#delete_all").load(location.href + " #delete_all");
                }
                else if(response == 500)
                swal("Error!", "Something went wrong!", "error");
             }
            
          });
        
        } 
      });
    });
  
 });
</script>

<script>
  $(document).ready(function(){
    $('.deleteFavorite').click(function(e){
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
             url:"./functions/handleAdd.php",
             data:{
              'deleteFavorite_id':id,
              'deleteFavorite':true,
             },
             success : function (response){
              console.log(response);
                if(response == 200)
                {
                  swal("Success!", "Item Deleted Successfully!", "success");
                  $("#product").load(location.href + " #product");
                }
                else if(response == 500)
                swal("Error!", "Something went wrong!", "error");
             }
            
          });
        
        } 
      });
    });
  
 });
</script>

</body>
</html>
