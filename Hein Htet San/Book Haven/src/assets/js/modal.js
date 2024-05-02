const modalWrapper = document.querySelector(".my-modal-wrapper");
const spinner = document.querySelector(".spinner-border");
const choose = document.querySelectorAll(".choose-opt .choose");

setTimeout(() => {
    modalWrapper.style.transform = "translateY(0)";
    spinner.classList.add("d-none");
}, 3000)

choose.forEach(e => {
    e.addEventListener("click", () => {
        spinner.classList.remove("d-none");
        modalWrapper.style.transform = "translateY(100%)";
        setTimeout(() => {
            if(e.classList.contains("user")){
                console.log("user")
                window.location = "../template/user_login.php";
            }else if(e.classList.contains("admin")){
                window.location = "../admin/admin_login.php";
                console.log("admin")
            }
        }, 3000)
    })
})