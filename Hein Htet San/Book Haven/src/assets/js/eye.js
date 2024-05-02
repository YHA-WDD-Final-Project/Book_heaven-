const eyeFrame = document.querySelector(".eye");
const show = document.querySelector(".bi-eye");
const hide = document.querySelector(".bi-eye-slash");
const passwordField = document.querySelector(".input-container input[type=password]")

eyeFrame.addEventListener("click", () => {
    show.classList.toggle("d-none");
    hide.classList.toggle("d-none");
    if(show.classList.contains("d-none")){
        passwordField.type = "text";
    }
    if(hide.classList.contains("d-none")){
        passwordField.type = "password";
    }
})
