
<?php
    
    session_start();
    include_once("../php/config.php");
    $user_id = $_SESSION['usr_id'];
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Haven | Shopping</title>
    <link rel="stylesheet" href="../assets/css/shop.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="icon" href="../icons/svg/logo.svg">
</head>
<body>
    <div class="container-fluid position-relative">

        <!-- category modal  -->
        <div class="cate-wrapper p-5">
            <div class="cate-modal shadow d-flex flex-column align-items-center justify-content-center py-5">
                <a href="" class="all cate-link active">All</sp>
                <?php
                    $sql2 = "SELECT * FROM category";
                    $query2 = mysqli_query($con, $sql2);
                    while($row2 = mysqli_fetch_assoc($query2)):
                ?>
                    <a href="" class="cate-link <?php echo $row2['cat_id'];?>"><?php echo $row2['catname'];?></a>
                <?php endwhile;?>
            </div>
        </div>
        <!-- end of category modal  -->

        <div class="row">
            <!-- navbar  -->
            <div class="col-12 navbar mb-4 mb-md-3">
                <div class="row navwrapper">
                    <div class=" col-6 col-md-3 d-flex align-items-center justify-content-start px-4 px-md-5">
                        <img src="../icons/svg/logotext.svg" alt="">
                    </div>
                    <div class="col-0 col-md-6 d-none d-md-block d-flex align-items-center justify-content-center">
                        <div class="searchbar position-relative">
                            <span><i class="bi bi-search"></i></span><input type="text" class="shadow">
                        </div>
                    </div>
                    <div class="col-6 col-md-3 d-flex align-items-center justify-content-end px-1 px-md-3">
                        <button class="categ" name="category">Category</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 d-block d-md-none d-flex align-items-center justify-content-center">
                <div class="searchbar position-relative">
                    <span><i class="bi bi-search"></i></span><input type="text" class="shadow">
                </div>
            </div>
            <!-- end of navbar  -->

            <!-- sub nav  -->
            <div class="col-12 sub-nav border-bottom px-4 px-md-5">
                <div class="row ">
                    <div class="col-6 d-flex align-items-center justify-content-start">
                        <h4 class="pt-3 pt-md-2">Product</h4>
                    </div>
                    <div class="col-6 d-flex align-items-center justify-content-end position-relative" >
                        <button class="listbtn"><i class="bi bi-list"></i></button>
                        <div class="d-flex px-3 flex-column align-items-start shadow justify-content-center link-list">
                            <a href="./profile.php?id=<?php echo $user_id;?>" class="profile d-flex me-3 mb-2"><i class="bi bi-person-circle me-2"></i> Profile</a>
                            <a href="./wishlist.php?id=<?php echo $user_id;?>" class="heart d-flex me-3 mb-2"><i class="bi bi-heart-fill me-2"></i> Wishlist</a>
                            <a href="./cart.php?id=<?php echo $user_id;?>" class="shopping-cart d-flex me-3 mb-2"><i class="bi bi-cart-fill me-2"></i> Cart</a>
                            <a href="./delivery.php?id=<?php echo $user_id;?>" class="truck d-flex"><i class="bi bi-box me-2"></i> Delivery</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of sub nav  -->

            <!-- product  -->
            <div class="col-12 products px-3 px-md-5">

                <!-- product  wrapper -->
                <div class="row products-wrapper align-items-center">

                    <!-- product items -->
                    <!-- end of product item  -->                    
                    
                </div>
                <div class="mb-5"></div>

            </div>
            <!-- end of product  -->

        </div>
    </div>
    <script src="../assets/js/shop.js"></script>
    <script src="../assets/js/items.js"></script>
    <script>
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
    </script>
</body>
</html>