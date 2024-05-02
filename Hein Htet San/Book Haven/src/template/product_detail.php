<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Haven | Details </title>
    <link rel="stylesheet" href="../assets/css/detail.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="icon" href="../icons/svg/logo.svg">
</head>
<body>
    <div class="container-fluid">
        <div class="row">

            <div class="col-12 d-flex align-items-center justify-content-start navbar px-3 py-3">
                <img src="../icons/svg/logotext.svg" alt="">
            </div>
            <div class="col-12 d-flex align-items-end justify-content-start header px-3  border-bottom">
                <h4><span><i class="bi bi-journal-bookmark-fill"></i></span> Product Details</h4>
            </div>
            

            <!-- product detail  -->

            <?php

                include_once("../php/config.php");
                $id = $_GET['id'];
                $sql = "SELECT * FROM book LEFT JOIN category ON book.catid=category.cat_id WHERE id = $id";
                $query = mysqli_query($con, $sql);
                while($row = mysqli_fetch_assoc($query)){
                    $title = $row['title'];
                    $price = $row['prices'];
                    $img = $row['cover_img'];
                    $descp = $row['description'];
                    $author = $row['Author'];
                    $category = $row['catname'];

                    echo "
                    <div class='col-12 col-md-6 product-image'>
                            <div class='image shadow' style='
                                        background: url(../books/$img);
                                        background-repeat: no-repeat;
                                        background-size: cover;
                                        background-position: center; 
                                        width: 200px; height: 300px;
                                        border-radius: 10px;
                                        border: 2px solid var(--placeholder);'></div>
                                </div>
                                <div class='col-12 col-md-6 product-details d-flex align-items-center justiyf-content-center'>
                                    <div class='content-wrapper text-start px-3 px-md-5'>
                                        <small class='instock'>in stock</small>
                                        <h3>$title</h3>
                                        <div class='mt-3 d-flex flex-column align-items-start justify-content-center border-bottom pb-2 mb-3'>
                                            <small class='category-name mb-1'>Category : <span>$category</span></small>
                                            <small class='author-name'>Author : <span>$author</span></small>
                                        </div>
                                        <p class='price'>Price : <span>$$price</span></p>
                                        <p class='summary'>
                                            $descp
                                        </p>
                                        <div class='d-flex align-items-center justify-content-end footer px-5'>
                                            <a href='./shop.php' class='back'>Back</a>
                                        </div>
                                    </div>
                                </div>
                    ";
                }
            
            
            ?>

            

            <!-- end of product detail  -->

        </div>
    </div>

    <script src="../assets/js/details.js"></script>
    
</body>
</html>