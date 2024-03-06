const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');
const signInForm = document.querySelector('.form-container.sign-in form');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

signInForm.addEventListener('submit', (event) => {
    event.preventDefault(); // Prevent form submission

    // Redirect the user to main.html
    window.location.href = 'main.html';
});