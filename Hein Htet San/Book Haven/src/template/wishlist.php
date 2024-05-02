<?php
    session_start();
    $user_id = $_SESSION['usr_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Haven | Wishlists </title>
    <link rel="stylesheet" href="../assets/css/wishlist.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="icon" href="../icons/svg/logo.svg">
</head>
<style>
    .itembox .cart{
        text-decoration: none;
        /* font-family: var(--Gluten); */
        font-size: 22px;
        font-weight: 500;
        color: var(--placeholder);
    }
    .itembox .cart.active{
        color: var(--yellow);
    }
</style>
<body>
    
    <div class="container-fluid">
        <div class="row">

            <div class="col-12 d-flex align-items-center justify-content-start navbar px-3 py-3">
                <img src="../icons/svg/logotext.svg" alt="">
            </div>
            <div class="col-12 d-flex align-items-end justify-content-between header px-4 px-md-5  border-bottom">
                <h4><span><i class="bi bi-heart-fill"></i></span> WishList</h4>
                <a href="./shop.php" class="back z-2">Back</a>
            </div>

            <div class="col-12 d-flex align-items-start justify-content-center py-3 ">
                <div class="row item-wrapper px-3 py-2">


                <?php 

                    $status = "d-none";
                    $arr = [];
                    $i= 0;
                    include_once('../php/config.php');
                    $sql = "SELECT * FROM wishlist WHERE user_id = $user_id";
                    $query = mysqli_query($con, $sql);
                    if(mysqli_num_rows($query) != 0){
                        $status = "d-none";
                        while($row = mysqli_fetch_assoc($query)){
                            $arr[$i] = $row['book_id'];
                            $i++;
                        }
                        for($j=0; $j<count($arr); $j++){
                            // echo $arr[$j];
                            $fetch_book = mysqli_query($con, "SELECT * FROM book LEFT JOIN wishlist ON book.id = wishlist.book_id WHERE id = $arr[$j] && user_id=$user_id");
                            $row2 = mysqli_fetch_assoc($fetch_book);
                            $title = $row2['title'];
                            $price = $row2['prices'];
                            $img = $row2['cover_img'];
                            $id = $row2['id'];

                            echo "
                            <div class='itembox col-12 col-md-4 d-flex align-items-center justify-content-center px-3 py-2 mb-3'>
                                <!-- image  -->
                                <div class='img-box shadow me-5' style='background: url(../books/$img);
                                background-position: center; background-size: cover; 
                                border: 2px solid var(--placeholder); background-repeat: no-repeat;'></div>
                                <!-- content  -->
                                <div class='d-flex align-items-start justify-content-start flex-column'>
                                    <h3 class='mb-3'>$title</h3>
                                    <span class='border-bottom mb-3'>Price : <span class='price'>$$price</span></span>
                                    <div class='d-flex align-items-start justify-content-center'>
                                        <a href='./product_detail.php?id=$id' class='btn btn-sm btn-warning info me-3'>Book Info</a>
                                        <a href='../php/wishlist2.php?id=$id&usr_id=$user_id' class=' mt-1'><i class='bi bi-trash'></i></a>
                                    </div>
                                </div>
                            </div>
                            ";
                        }
                        $arr = [];
                    }else{
                        $status = "d-block";
                    }

                ?>

                    <!-- item  -->
                    

                    
                    <!-- item  -->
                     
                    <div class="status <?php echo $status;?> d-flex align-items-end">
                        <p>No wishlist Here!<br>Please choose your favorites!</p>
                    </div>


                    <div class="mb-5"></div>
                    <div class="mb-5"></div>
                    <div class="mb-5"></div>
                    <div class="mb-5"></div>
                    <div class="mb-5"></div>
                    <div class="mb-5"></div>

                </div>
            </div>
        </div>

        </div>
    </div>

</body>
</html>