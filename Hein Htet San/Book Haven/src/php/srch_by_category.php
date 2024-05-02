<?php

    session_start();
    include_once("config.php");
    $user_id = $_SESSION['usr_id'];
    
    // $output = "";
    // $sql = mysqli_query($con, "SELECT * FROM book 
    //                             LEFT JOIN wishlist ON book.id = wishlist.book_id 
    //                             LEFT JOIN cart ON book.id = cart.bookid 
    //                             WHERE title='$searchTerm' OR Author='$searchTerm' ");
    // if(mysqli_num_rows($sql) > 0){
    //     include "data.php";
    // }else{
    //     $output .= "No book found!";
    // }
    // echo $output;

?>