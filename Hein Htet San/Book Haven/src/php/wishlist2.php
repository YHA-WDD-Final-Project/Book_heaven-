<?php

    include_once("config.php");
    $book_id = $_GET['id'];
    $user_id = $_GET['usr_id'];
    $is_include = false;

    $fetch = "SELECT * FROM wishlist WHERE user_id=$user_id";
    $fetch_query = mysqli_query($con, $fetch);

    if(mysqli_num_rows($fetch_query) == 0){
        $append = "INSERT INTO wishlist (book_id) VALUES ($book_id)";
            $append_query = mysqli_query($con, $append);
            if($append_query){
                header("location:../template/wishlist.php");
            }
    }else{
        while($row = mysqli_fetch_assoc($fetch_query)){
            if($book_id == $row['book_id']){
                $is_include = true;
            }
        }
        if($is_include){
            $remove = "DELETE FROM wishlist WHERE book_id = $book_id and user_id=$user_id";
            $remove_query = mysqli_query($con, $remove);
            if($remove_query){
                header("location: ../template/wishlist.php");
            }
        }else{
            $append = "INSERT INTO wishlist (book_id) VALUES ($book_id)";
            $append_query = mysqli_query($con, $append);
            if($append_query){
                header("location: ../template/wishlist.php");
            }
        }
        $is_include = false;
    }


?>