<?php

    include("config.php");
    $cart_id = $_GET['cart_id'];
    $price = $_GET['price'];
    $usr_id = $_GET['usr_id'];

    // $sql2 = "INSERT INTO orderitem ()"
    $sql1 = "SELECT * FROM orderitem";
    $query1 = mysqli_query($con, $sql1);
    if(mysqli_num_rows($query1) == 0){
        $append = "INSERT INTO orderitem (cart_id, price, usr_id) VALUES ($cart_id, $price, $usr_id)";
            $append_query = mysqli_query($con, $append);
            if($append_query){
                header("location:../template/cart.php");
            }
    }else{
        while($row = mysqli_fetch_assoc($query1)){
            if($cart_id == $row['cart_id']){
                $is_include = true;
            }
        }
        if($is_include){
            $remove = "DELETE FROM orderitem WHERE cart_id = $cart_id && usr_id=$usr_id";
            $remove_query = mysqli_query($con, $remove);
            if($remove_query){
                header("location: ../template/cart.php");
            }
        }else{
            $append = "INSERT INTO orderitem (cart_id, price, usr_id) VALUES ($cart_id, $price, $usr_id)";
            $append_query = mysqli_query($con, $append);
            if($append_query){
                header("location: ../template/cart.php");
            }
        }
        $is_include = false;
    }
    // echo $cart_id;

?>