<?php

    include_once("../php/config.php");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Haven | Dashboard | Overview</title>
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
    .user-card{
        border: 2px solid var(--placeholder);
        background-color: #fff;
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
                        <a href="./overview.php" class="active d-flex span text-decoration-none"><i class="bi bi-view-stacked me-2"></i> <span class="d-none d-md-block span2 active"> Overview </span></a>
                    </div>
                    <div class="d-flex mb-md-3 me-5 me-md-0">
                        <a href='./book.php' class="d-flex span text-decoration-none"><i class="bi bi-journal-bookmark me-2"></i> <span class="d-none d-md-block span2"> Book </span></a>
                    </div>
                    <div class="d-flex mb-md-3 me-5 me-md-0">
                        <a href="./order.php" class="d-flex span text-decoration-none"><i class="bi bi-card-checklist me-2"></i> <span class="d-none d-md-block span2"> Order </span></a>
                    </div>
                    <div class="d-flex mb-md-3 me-5 me-md-0">
                        <a href='./message.php' class="d-flex span text-decoration-none"><i class="bi bi-envelope me-2"></i> <span class="d-none d-md-block span2"> Message </span></a>
                    </div>
                </div>
            </div>

            <!-- main  -->
            <div class="col-12 col-md-10 order-0 order-md-1 main">

                <div class="row mt-3 mb-3">
                    <div class="col-12 d-flex px-5 align-items-center justify-content-between border-bottom py-3 main-navbar">
                        <div class="d-flex">
                            <i class="bi bi-view-stacked me-2"></i> Overview
                        </div>
                        <button class="px-3 py-1 view-btn shadow">
                            <i class="bi bi-binoculars-fill me-2"></i> View
                        </button>
                    </div>
                </div>

                <?php
                
                    $sql1 = "SELECT count(email) AS user_count FROM user WHERE NOT id=81374";
                    $query1 = mysqli_query($con, $sql1);
                    $row1 = mysqli_fetch_assoc($query1);
                    $user_count = $row1['user_count'];

                    $sql2 = "SELECT count(id) AS book_count FROM book";
                    $query2 = mysqli_query($con, $sql2);
                    $row2 = mysqli_fetch_assoc($query2);
                    $book_count = $row2['book_count'];

                    $sql3 = "SELECT count(DISTINCT order_code) AS order_codes FROM order_details";
                    $query3 = mysqli_query($con, $sql3);
                    $row3 = mysqli_fetch_assoc($query3);
                    $order_count = $row3['order_codes'];

                ?>
                <div class="row px-2 py-2 px-md-4 px-md-4 ">
                    <div class="col-6 col-md-4 mb-2 mb-md-2">
                        <div class="user-card bg-light shadow d-flex align-items-center justify-content-evenly pb-4">
                            <div class="d-flex flex-column align-items-center justify-content-start pt-4">
                                <span>User</span>
                                <span><?php echo $user_count;?></span>
                            </div>
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 mb-2 mb-md-2">
                        <div class="user-card bg-light shadow d-flex align-items-center justify-content-evenly pb-4">
                            <div class="d-flex flex-column align-items-center justify-content-start pt-4">
                                <span>Book</span>
                                <span><?php echo $book_count;?></span>
                            </div>
                            <i class="bi bi-journal-bookmark"></i>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 mb-2 mb-md-2">
                        <div class="user-card bg-light shadow d-flex align-items-center justify-content-evenly pb-4">
                            <div class="d-flex flex-column align-items-center justify-content-start pt-4">
                                <span>Order</span>
                                <span><?php echo $order_count;?></span>
                            </div>
                            <i class="bi bi-inboxes-fill"></i>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-center px-4 py-2">
                        <div class="table-wrapper shadow">
                            <table class="">
                                <tr class="">
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                </tr>
                                <?php
                                    $sql4 = "SELECT * FROM user WHERE NOT id=81374";
                                    $query4 = mysqli_query($con, $sql4);
                                    $count=1;
                                    while($row = mysqli_fetch_assoc($query4)):
                                        $name = $row['fname'] . " " .$row['lname'];
                                        $email = $row['email'];
                                        $phone = $row['phone'];
                                ?>
                                <tr>
                                    <td><?php echo $count;?>.</td>
                                    <td><?php echo $name;?></td>
                                    <td><?php echo $email;?></td>
                                    <td><?php echo $phone;?></td>
                                </tr>
                                <?php 
                                    $count++;
                                    endwhile;
                                ?>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.querySelector(".view-btn").addEventListener("click", () => {
            window.location = "../template/user_login.php";
        })
    </script>
</body>
</html>