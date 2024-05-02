<?php

    session_start();
    include("../php/config.php");
    $user_id = $_SESSION['usr_id'];

        if(isset($_POST['confirm_order'])){
            $address = $_POST['address'];
            if(!empty($address) || $address != null){
                $query2 = null;
                $sql = "SELECT * FROM orderitem
                LEFT JOIN cart ON orderitem.cart_id = cart.cat_id
                LEFT JOIN book ON cart.bookid = book.id
                WHERE orderitem.usr_id=$user_id";
                $query = mysqli_query($con, $sql);
                $order_code = rand(0, 100000);
                // Get the current date
                $currentDate = date('Y/m/d');

                // Convert the date string to a DateTime object
                $dateObj = new DateTime($currentDate);

                // Add 2 days to the date
                $dateObj->modify('+2 days');

                // Format the updated date as a string
                $updatedDate = $dateObj->format('Y/m/d');
                $status = "unconfirm"; 
                while($row = mysqli_fetch_assoc($query)){
                    $userid = $row['user_id'];
                    $book = $row['title'];
                    $count = $row['counts'];
                    $category = $row['catid'];
                    $total = $row['total'];
                    $sql2 = "INSERT INTO order_details
                    (order_code, userid, order_count, order_categ, order_address, order_total, order_books, order_date, arrive_date, status)
                    VALUES ($order_code, $userid, $count, $category, '$address', $total, '$book', '$currentDate', '$updatedDate', '$status')";
                    $query2 = mysqli_query($con, $sql2);
                }
                if($query2){
                    $sql3 = "DELETE cart FROM cart LEFT JOIN orderitem ON cart.cat_id = orderitem.cart_id WHERE cart.cat_id = orderitem.cart_id";
                    $query3 = mysqli_query($con, $sql3);
                    $sql4 = "DELETE FROM orderitem";
                    $query4 = mysqli_query($con, $sql4);
                    if($query3 && $query4){
                        header("location:./delivery.php");
                    }
                }
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Haven | Loading...</title>
    <link rel="stylesheet" href="../assets/css/loading.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="icon" href="../icons/svg/logo.svg">
</head>
<style>
    .address-wrapper{
        width: 100%;
        height: 100vh;
        overflow: hidden;
    }
    .address-card{
        width: 460px;
        height: auto;
        background: #fff;
        border: 2px solid #999;
        border-radius: 18px;
    }
    h2{
        font-family: var(--Gluten);
        color: var(--azul);
        position: relative;
        z-index: 1;
    }
    h2::before{
        z-index: -1;
        position: absolute;
        left: 0;
        width: 75%;
        height: 17px;
        bottom: 0px;
        content: "";
        background: url(../icons/underline.png);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }
    p{
        font-family: var(--Gochi);
        font-size: 18px;
        color: var(--placeholder);
    }
    .address-wrap{
        width: 100%;
    }
    .address-wrap i{
        font-size: 26px;
        color: var(--azul);
    }
    .address-wrap input{
        font-family: var(--Gochi);
        font-size: 20px;
        color: var(--placeholder);
        width: 100%;
        height: 49px;
        padding: 10px;
        border: 2px solid var(--placeholder);
        border-radius: 10px;
        background: var(--input);
        color: var(--black);
    }
    .address-wrap input::placeholder{
        color: var(--placeholder);
    }
    .address-wrap input:focus{
        outline: 2px solid var(--azul);
        border: none;
    }
    .btn-wrap{
        width: 100%;
    }
    .back{
        width: 100px;
        height: 50px;
        background: var(--input);
        font-family: var(--Gochi);
        color: var(--placeholder);
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        font-size: 22px;
        text-decoration: none;
    }
    .back:hover{
        color:var(--input);
        background: var(--placeholder);
    }
    .confirm{
        width: 140px;
        height: 50px;
        border-radius: 10px;
        background: var(--azul);
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        color: var(--input);
        font-family: var(--Gochi);
    }
</style>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 address-wrapper d-flex align-items-center justify-content-center">
                <form method="post" class="address-card shadow p-4 d-flex flex-column justify-content-center align-items-start">
                    <h2>Address</h2>
                    <p>Let's us know your address first!</p>
                    <div class="d-flex align-items-center address-wrap mb-5">
                        <i class="bi bi-geo-alt-fill me-3"></i> <input type="text" name="address" placeholder="Enter your address">
                    </div>
                    <div class="d-flex btn-wrap align-items-center justify-content-between mb-3">
                        <a href="./cart.php" class="back">Back</a>
                        <button name="confirm_order" class="confirm">Confirm Order</button>
                    </div>
                    <small class="text-warning d-none text-small">Field can't be blank!</small>
                </form>
            </div>
        </div>
    </div>

</body>
</html>