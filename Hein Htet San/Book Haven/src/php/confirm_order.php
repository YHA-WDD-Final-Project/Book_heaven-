<?php

    include("config.php");
    $order_code = $_GET['order_id'];
    echo $order_code;
    $sql = "UPDATE order_details SET status='confirm' WHERE order_code = $order_code";
    $query = mysqli_query($con, $sql);
    if($query){
        header("location: ../admin/order.php");
    }

?>