const searchBar = document.querySelector(".searchbar input")
// const category_links = document.querySelectorAll(".cate-modal a");

searchBar.onkeyup = () => {
    let searchTerm = searchBar.value;
    if(searchTerm != ""){
        searchBar.classList.add("active");
    }else{
        searchBar.classList.remove("active");
    }
    // let's start Ajax
    let xhr = new XMLHttpRequest(); // creating XML object
    xhr.open("POST", "../php/search.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                document.querySelector(".products-wrapper").innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);

}

setInterval(() => {
    // let's start Ajax
    let xhr = new XMLHttpRequest(); // creating XML object
    xhr.open("GET", "../php/items.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                // console.log(data);
                if(!searchBar.classList.contains("active")){
                    document.querySelector(".products-wrapper").innerHTML = data;
                }
            }
        }
    }
    xhr.send();
}, 500)



