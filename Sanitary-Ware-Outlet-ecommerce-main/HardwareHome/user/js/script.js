// this is for searchbar
let searchbar = document.querySelector('.search');

document.querySelector('#search-btn').onclick = () => {
    searchbar.classList.toggle('active');
    navbar.classList.remove('active');
    userlog.classList.remove('active');
}

document.querySelector(`#s-btn`).onclick = () => {
    searchbar.classList.remove('active');
}
// this is for navigation bar
let navbar = document.querySelector('.navbar');

document.querySelector(`#menu-btn`).onclick = () => {
    searchbar.classList.remove('active');
    navbar.classList.toggle('active');
    userlog.classList.remove('active');

}

// this is for navigation bar
let userlog = document.querySelector('.log');

document.querySelector(`#login-btn`).onclick = () => {
    searchbar.classList.remove('active');
    navbar.classList.remove('active');
    userlog.classList.toggle('active');

}




// this is for filter search

// function search() {
//     let filter = document.getElementById('searchbox').value.toUpperCase();


//     let itemlist = document.querySelectorAll('.item');

//     let l = document.getElementsByTagName('h1');

//     for (var i = 0; i <= l.length; i++) {
//         let a = itemlist[i].getElementsByTagName('h1')[0];

//         let value = a.innerHTML || a.innerText || a.textContent;

//         if (value.toUpperCase().indexOf(filter) > -1) {
//             itemlist[i].style.display = "";
//         }
//         else {
//             itemlist[i].style.display = "None";
//         }
//     }
// }






let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
 
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  
  slides[slideIndex-1].style.display = "block";  
 
}













