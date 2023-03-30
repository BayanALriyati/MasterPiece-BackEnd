const btns = document.querySelectorAll('.btn');
const storeProducts = document.querySelectorAll('.box');
// const search = document.getElementById(search);

// for (i = 0; i < btns.length; i++) {

//     btns[i].addEventListener('click', (e) => {
//         e.preventDefault()
        
//         const filter = e.target.dataset.filter;
//         console.log(filter);
        
//         storeProducts.forEach((product)=> {
//             if (filter === 'all'){
//                 product.style.display = 'block'
//             } else {
//                 if (product.classList.contains(filter)){
//                     product.style.display = 'block'
//                 } else {
//                     product.style.display = 'none'
//                 }
//             }
//         });
//     });
// };

// This code has been replaced by the function(filterProducts) above which does a better job
const search = document.getElementById("search-form");
const storeProduct = document.querySelectorAll(".content h3");

search.addEventListener("keyup", (e) => {
    e.preventDefault();
    const searchValue = search.value.toLowerCase().trim();
    // alert(search.value);

    
    for (i = 0; i < storeProduct.length; i++) {
        if (storeProduct[i].classList.contains(searchValue)) {
            storeProduct[i].style.display = 'block';
        } else if (searchValue == "") {
            storeProduct[i].style.display = 'block';
        } else {
            storeProduct[i].style.display = 'none';    
        }

       if (searchValue == "") {
        storeProduct[i].style.display = 'block';
       }
        
    }

})

$(document).ready(function () {
    $('a.close').click(function (event) {
        event.preventDefault();
        $('.popup').hide("slow");
    });
});

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


    // navbar = document.querySelector('.header .navbar');

    // document.querySelector('#menu-btn').onclick = () =>{
    //    navbar.classList.toggle('active');
    //    profile.classList.remove('active');
    // }
    
    // profile = document.querySelector('.header .profile');
    
    // document.querySelector('#user-btn').onclick = () =>{
    //    profile.classList.toggle('active');
    //    navbar.classList.remove('active');
    // }