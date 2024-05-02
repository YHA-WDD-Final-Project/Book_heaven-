<?php

    include_once("config.php");
    $book_id = $_GET['id'];
    $user_id = $_GET['usr_id'];
    $is_include = false;

    $fetch = "SELECT * FROM cart LEFT JOIN book ON book.id=cart.bookid WHERE user_id=$user_id";
    $fetch_query = mysqli_query($con, $fetch);

    if(mysqli_num_rows($fetch_query) == 0){
        $total_price = mysqli_query($con, "SELECT * FROM book WHERE id=$book_id");
        $row2 = mysqli_fetch_assoc($total_price);
        $total = $row2['prices'];
        $append = "INSERT INTO cart (bookid,user_id, counts, total) VALUES ($book_id, $user_id, 1, $total)";
            $append_query = mysqli_query($con, $append);
            if($append_query){
                header("location:../template/shop.php");
            }
    }else{
        while($row = mysqli_fetch_assoc($fetch_query)){
            if($book_id == $row['bookid']){
                $is_include = true;
            }
        }
        if($is_include){
            $remove = "DELETE FROM cart WHERE bookid = $book_id && user_id=$user_id";
            $remove_query = mysqli_query($con, $remove);
            if($remove_query){
                header("location: ../template/shop.php");
            }
        }else{
            $total_price = mysqli_query($con, "SELECT * FROM book WHERE id=$book_id");
            $row2 = mysqli_fetch_assoc($total_price);
            $total = $row2['prices'];
            $append = "INSERT INTO cart (bookid, user_id, counts, total) VALUES ($book_id, $user_id,1, $total)";
            $append_query = mysqli_query($con, $append);
            if($append_query){
                header("location: ../template/shop.php");
            }
        }
        $is_include = false;
    }


?>