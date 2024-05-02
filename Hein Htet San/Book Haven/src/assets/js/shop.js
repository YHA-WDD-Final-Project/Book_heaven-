
const heart = document.querySelector(".add-wishlist");
const heartFill = document.querySelector(".added-wishlist");
const cart = document.querySelector(".add-cart");
const cartFill = document.querySelector(".added-cart");
const categoryBtn = document.querySelector(".categ");
const listBtn = document.querySelector(".listbtn");
const linkLists = document.querySelector(".link-list");
const linkLists_links = document.querySelectorAll(".link-list a");



listBtn.addEventListener("click", () => {
    linkLists.classList.toggle("active");
})

linkLists_links.forEach(e => {
    e.addEventListener("click", event => {
        // event.preventDefault();
        linkLists.classList.toggle("active");
    })
})

categoryBtn.onclick = () => {
    categoryFrame.style.transform = "translateY(0)";
}




