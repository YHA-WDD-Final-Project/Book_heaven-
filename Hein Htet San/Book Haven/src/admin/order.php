<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Haven | Dashboard | Order</title>
    <link rel="stylesheet" href="../assets/css/overview.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="icon" href="../icons/svg/logo.svg">
</head>
<style>
    .table-wrapper{
        overflow-y: scroll;
        border: 2px solid var(--placeholder);
    }
    .table-wrapper::-webkit-scrollbar{
        display: none;
    }
</style>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- navbar  -->
            <div class="col-12 navbar px-4 py-2 border-bottom">
                <div class="row">
                    <div class="col-12 mb-3">
                        <img src="../icons/svg/logotext.svg" alt="">
                    </div>
                    <div class="col-12 d-flex align-items-end">
                        <h4><i class="bi bi-command"></i> Dashboard</h4>
                    </div>
                </div>
            </div>

            <!-- aside  -->
            <div class="col-12 col-md-2 order-1 border-md-right border-top order-md-0 aside d-flex py-0 py-md-5 align-items-center align-items-md-start justify-content-center">
                <div class="aside-wrapper d-flex flex-md-column align-items-start">
                    <div class="d-flex mb-md-3 me-5 me-md-0">
                        <a href="./overview.php" class="text-decoration-none d-flex span"><i class="bi bi-view-stacked me-2"></i> <span class="d-none d-md-block span2 "> Overview </span></a>
                    </div>
                    <div class="d-flex mb-md-3 me-5 me-md-0">
                        <a href="./book.php" class="text-decoration-none d-flex span"><i class="bi bi-journal-bookmark me-2"></i> <span class="d-none d-md-block span2 "> Book </span></a>
                    </div>
                    <div class="d-flex mb-md-3 me-5 me-md-0">
                        <a href="./order.php" class="active d-flex span text-decoration-none"><i class="bi bi-card-checklist me-2"></i> <span class="d-none d-md-block span2 active"> Order </span></a>
                    </div>
                    <div class="d-flex mb-md-3 me-5 me-md-0">
                        <a href="./message.php" class="d-flex span text-decoration-none"><i class="bi bi-envelope me-2"></i> <span class="d-none d-md-block span2"> Message </span></a>
                    </div>
                </div>
            </div>

            <!-- main  -->
            <div class="col-12 col-md-10 order-0 order-md-1 main">

                <div class="row mt-3 mb-3">
                    <div class="col-12 d-flex px-5 align-items-center justify-content-between border-bottom py-2 main-navbar">
                        <div class="d-flex">
                            <i class="bi bi-card-checklist me-2"></i> Order
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-center px-4 py-2">
                        <div class="table-wrapper shadow">
                            <table class="">
                                <tr class="">
                                    <th>No.</th>
                                    <th>Order ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Order Detail</th>
                                    <th>Action</th>
                                </tr>

                                <?php

                                    include("../php/config.php");
                                    $sql = "SELECT DISTINCT order_code, userid, order_address, fname, lname, phone, status FROM order_details
                                            LEFT JOIN user ON order_details.userid=user.id ORDER BY status";
                                    $query = mysqli_query($con, $sql);
                                    $count = 0;
                                    $textColor = "btn-info";
                                    $control = "enabled";
                                    while($row = mysqli_fetch_assoc($query)):
                                        $count++;
                                        $order_code = $row['order_code'];
                                        $name = $row['fname']."".$row['lname'];
                                        $address = $row['order_address'];
                                        $phone = $row['phone'];
                                        $status = $row['status'];
                                        $user_id = $row['userid'];
                                        if($status == "confirm"){
                                            $control = "disabled";
                                            $textColor = "btn-success";
                                        }else{
                                            $control = "enabled";
                                            $textColor = "btn-info";
                                        }
                                ?>
                                
                                    <tr>
                                        <td><?php echo $count;?>.</td>
                                        <td>#<?php echo $order_code;?></td>
                                        <td><?php echo $name;?></td>
                                        <td><?php echo $address;?></td>
                                        <td><?php echo $phone;?></td>
                                        <td>
                                            <a href="./order_detail.php?order_id=<?php echo $order_code;?>&user_id=<?php echo $user_id;?>" class="btn btn-sm btn-warning"><i class="bi bi-exclamation-circle-fill"></i> Details</a>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-center fs-5">
                                                <a href="../php/confirm_order.php?order_id=<?php echo $order_code;?>" class="me-3 btn btn-sm <?php echo $textColor;?> border border-rounded <?php echo $control;?>"><i class="bi bi-check-all"></i> Confirm</a>
                                            </div>
                                        </td>
                                    </tr>

                                <?php

                                    endwhile;
                                
                                ?>
                                <div class="mb-5"></div>
    
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>