<?php

    session_start();
    include("../php/config.php");
    $user_id = $_SESSION['usr_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Haven | Delivery </title>
    <link rel="stylesheet" href="../assets/css/delivery.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="icon" href="../icons/svg/logo.svg">
</head>
<style>
    .itembox-wrapper{
        border: 2px solid var(--placeholder);
    }
</style>
<body>
    
    <div class="container-fluid">
        <div class="row">

            <div class="col-12 d-flex align-items-center justify-content-start navbar px-3 py-3">
                <img src="../icons/svg/logotext.svg" alt="">
            </div>
            <div class="col-12 d-flex align-items-end justify-content-between header px-3 px-md-5  border-bottom">
                <h4><span><i class="bi bi-box"></i></span> Delivery</h4>
                <a href="./shop.php" class="back">Back</a>
            </div>

        </div>

        <div class="col-12 d-flex align-items-start justify-content-center py-3 ">
            <div class="row item-wrapper px-3 py-2 position-relative">


            <?php
            
                $status = "d-none";
                $sql1 = "SELECT DISTINCT order_code, order_date, arrive_date FROM order_details WHERE status='unconfirm' AND userid=$user_id";
                $query1 = mysqli_query($con, $sql1);
                if(mysqli_num_rows($query1) != 0){
                    $status = "d-none";
                    while($row1 = mysqli_fetch_assoc($query1)):
                        $code =  $row1['order_code'];
                        $order_time = $row1['order_date'];
                        $arrive_time = $row1['arrive_date'];
                
            
            ?>

                <!-- item  -->
                <div class="itembox col-12 col-md-4 col-lg-3 d-flex align-items-start justify-content-center px-3 py-2 mb-3">
                    <div class="itembox-wrapper shadow  d-flex align-items-center justify-content-between px-3 py-2 mb-3">
                        <!-- image  -->
                        <i class="bi bi-box me-3"></i>
                        <!-- content  -->
                        <div class="d-flex align-items-start justify-content-start flex-column">
                            <span class="border-bottom mb-3">Order ID : #<span class="price"><?php echo $code;?></span></span>
                            <div class="mb-3 d-flex flex-column align-items-start justify-content-center">
                                <span>Order Date : <span><?php echo $order_time;?></span></span>
                                <span>Arrival Date : <span><?php echo $arrive_time;?></span></span>
                            </div>
                            <div class="order-det">
                                <a href="./order_detail.php?order_id=<?php echo $code;?>" class="btn text-center btn-warning text-secondary"><i class="bi bi-info-square"></i> Detail</a>
                                <a href="../php/cancel_order.php?order_id=<?php echo $code;?>" class="btn btn-danger ">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- item  -->

            <?php 
                    endwhile;
                }else{
                    $status = "d-block";
                }
            ?>
                 
                <div class="status <?php echo $status;?>">
                    <p>No Order<br>Please Order Something!<br>Don't be window shopping buddy!</p>
                </div>

            </div>
        </div>


    </div>

</body>
</html>
