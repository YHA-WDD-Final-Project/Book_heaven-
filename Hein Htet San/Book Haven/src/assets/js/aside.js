const chevron = document.querySelector(".bi-chevron-right");
const aside = document.querySelector(".aside-bar");
const links = document.querySelectorAll(".aside-bar a");
const hamburger = document.querySelector(".bi-layout-sidebar-reverse");

links.forEach(e => {
    e.addEventListener("click", () => {
        aside.style.transform = "translateX(100%)";
    })
})

hamburger.addEventListener("click", () => {
    aside.style.transform = "translateX(0%)";
})

chevron.addEventListener("click", () => {
    aside.style.transform = "translateX(100%)";
})
