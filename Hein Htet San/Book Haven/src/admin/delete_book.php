<?php

    include("../php/config.php");
    $book_id = $_GET['id'];
    $sql = "DELETE FROM book WHERE id=$book_id";
    $query = mysqli_query($con, $sql);
    if($query){
        header("location:./book.php");
    }

?>