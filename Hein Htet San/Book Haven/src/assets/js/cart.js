const lnks = document.querySelectorAll(".itembox #select");
const footer = document.querySelector(".footer");

let tracker = 0;

lnks.forEach(e => {
     
    // Add an event listener to handle the click event
    e.addEventListener("click", (event) => {
        // Prevent the default behavior of the link
        // event.preventDefault();
        if(e.classList.contains("active")){
            e.classList.remove("active");
            tracker--;
        }else{
            e.classList.add("active");
            tracker++;
        }
        if(tracker){
            footer.style.transform = "translateY(0)";
        }else{
            footer.style.transform = "translateY(100%)";
        }
    })
    
})

