<?php

    include_once("config.php");
    echo "Hello from add";
    $id = $_GET['id'];
    $sql = "SELECT counts FROM cart WHERE bookid = $id";
    $query = mysqli_query($con, $sql);

    if($query){
        $row = mysqli_fetch_assoc($query);
        if($row['counts'] < 2){
            header("location: ../template/cart.php");
        }else{
            $item_count = $row['counts'] - 1;
            $update = mysqli_query($con, "UPDATE cart LEFT JOIN book
            ON book.id=cart.bookid SET counts = $item_count, total = cart.total-book.prices WHERE bookid = $id");
            if($update){
                header("location: ../template/cart.php");
            }
        }
    }

?>