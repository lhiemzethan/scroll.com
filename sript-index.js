
const btnlogin = document.querySelector('.popup-login');

btnlogin.addEventListener('click', (event) => {
    event.preventDefault();
    window.location.href = "login.html";
});