<?php

    include("./config.php");
    $order_code = $_GET['order_id'];

    $sql = "DELETE FROM order_details WHERE order_code=$order_code";
    $query = mysqli_query($con, $sql);
    if($query){
        header("location: ../template/delivery.php");
    }

?>