

<?php

    include_once("config.php");
    $user_id = $_SESSION['usr_id'];
    $is_include_in_wishlist = false;
    
    while($row = mysqli_fetch_assoc($sql)){

        $title = $row['title'];
        $price = $row['prices'];
        $img = $row['cover_img'];
        $id = $row['id'];
        $cart_fill = "d-none";
        $heart = "d-block";
        $heart_fill = "d-none";
        $cart = "d-block";

        $sql2 = "SELECT * FROM wishlist WHERE book_id= $id AND user_id=$user_id";
        $query2 = mysqli_query($con, $sql2);

        $sql3 = "SELECT * FROM cart WHERE bookid= $id AND user_id=$user_id";
        $query3 = mysqli_query($con, $sql3);

        if($query2){
            if (mysqli_num_rows($query2) > 0) {
                $row2 = mysqli_fetch_assoc($query2);
                if($row2['book_id'] == null){
                    $heart = "d-block";
                    $heart_fill="d-none";
                }else{
                    $heart = "d-none";
                    $heart_fill = "d-block";
                }
            }   
        }


        if($query3){
            if (mysqli_num_rows($query3) > 0) {
                $row3 = mysqli_fetch_assoc($query3);
                if($row3['bookid'] == null){
                    $cart = "d-block";
                    $cart_fill="d-none";
                }else{
                    $cart = "d-none";
                    $cart_fill = "d-block";
                }
            }   
        }

        $output .= "
        <div class='col-6 col-md-3 col-lg-2 p-3 text-center item'>
            <a href='./product_detail.php?id=$id' class='d-flex align-items-center justify-content-center'>
                <div class='image shadow' style='background: url(../books/$img);
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-position: center;
                    border: 2px solid #999'></div>
            </a>
            <!-- <div class='mt-2'></div> -->
            <a href='' class='name px-lg-3 px-1'>$title</a>
                <div class='foot w-100 d-flex align-items-center justify-content-between px-lg-4 px-2'>
                    <a href='#' class='price'>$$price</a>
                <div class='btn-gp d-flex align-items-center justify-content-center mb-2'>
                    <a href='../php/wishlist.php?id=$id&usr_id=$user_id' class='me-1 wishlist'>
                        <i class='bi bi-heart add-wishlist $heart'></i>
                        <i class='bi bi-heart-fill text-danger added-wishlist $heart_fill'></i>
                    </a>
                    <a href='../php/cart.php?id=$id&usr_id=$user_id' class='cart mb-1'>
                        <i class='bi bi-cart $cart'></i>
                        <i class='bi bi-cart-fill text-warning  $cart_fill' ></i>
                    </a>
                </div>
            </div>
        </div>
        ";
    }

?>
