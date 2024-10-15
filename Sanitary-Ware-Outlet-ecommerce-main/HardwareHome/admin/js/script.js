// this is for navigation bar
let navbar = document.querySelector('.navbar');

document.querySelector(`#menu-btn`).onclick = () => {

    navbar.classList.toggle('active');
    userlog.classList.remove('active');
}



// this is for login bar
let userlog = document.querySelector('.log');

document.querySelector(`#login-btn`).onclick = () => {
  
    navbar.classList.remove('active');
    userlog.classList.toggle('active');

}