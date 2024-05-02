<?php

    session_start();
    include_once("config.php");
    $user_id = $_SESSION['usr_id'];

    $searchTerm = mysqli_real_escape_string($con, $_POST['searchTerm']);
    $output = "";
    $sql = mysqli_query($con, "SELECT * FROM book 
                                LEFT JOIN category ON book.catid = category.cat_id
                                WHERE title='$searchTerm' OR Author='$searchTerm' OR catname='$searchTerm' 
                                ");

#LEFT JOIN wishlist ON book.id = wishlist.book_id 
#LEFT JOIN cart ON book.id = cart.bookid


    if(mysqli_num_rows($sql) > 0){
        include "data.php";
    }else{
        $output .= "No book found!";
    }
    echo $output;

?>