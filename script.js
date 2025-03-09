// Get the error message from the URL
const urlParams = new URLSearchParams(window.location.search);
const errorMessage = urlParams.get("error");
const btnpopup = document.querySelector('.popup-error');
const btnpop = document.querySelector('.pop-error');
const kontainerMuncul = document.querySelector('.kontainer-muncul');

// Get the element where you want to display the error message
const errorContainer = document.getElementById("error-message");

// Check if there is an error message
if (errorMessage) {
        // Display the error message
        kontainerMuncul.classList.add('show');
        errorContainer.innerHTML = errorMessage;
        errorContainer.style.display = "block"; // Tampilkan kontainer error
    } else {
        errorContainer.style.display = "none"; // Sembunyikan kontainer error
}

btnpopup.addEventListener('click', () => {
    window.location.replace("login.html");
});

const btnlogin = document.querySelector('.popup-login');

btnlogin.addEventListener('click', (event) => {
    event.preventDefault();
    window.location.href = "login.html";
});
