<?php

    session_start();
    include("../php/config.php");
    $user_id = $_SESSION['usr_id'];
    $code = $_GET['order_id'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Haven | Order Details</title>
    <link rel="stylesheet" href="../assets/css/loading.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="icon" href="../icons/svg/logo.svg">
</head>
<style>
    .details-wrapper{
        width: 100%;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .details{
        width: 500px;
        height: auto;
        border: 2px solid var(--placeholder);
        border-radius: 15px;
        background: #fff;
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
        width: 45%;
        height: 17px;
        bottom: 0px;
        content: "";
        background: url(../icons/underline.png);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }
    .table-wrapper{
        width: 100%;
        height: 200px;
        display: flex;
        align-items: start;
        justify-content: center;
        overflow-y: scroll;
    }
    .table-wrapper::-webkit-scrollbar{
        display: none;
    }
    table{
        width: 100%;
        height: auto;
    }
    table tr > th{
        color: var(--azul);
        border-bottom: 2px solid var(--azul);
    }
    table tr > th, td{
        font-family: var(--Gochi);
        padding: 5px 10px;
        text-align: center;
    }
    table tr:nth-child(even){
        background: var(--input);
    }
    .okay{
        padding: .5rem 1.3rem;
        text-align: center;
        border: none;
        border-radius: 10px;
        background: var(--azul);
        font-family: var(--Gochi);
        font-size: 18px;
        text-decoration: none;
        color: #fff;
    }
</style>
<body>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 details-wrapper">
                <div class="details shadow d-flex flex-column align-items-start justify-content-center px-3 py-4">
                    <h2 class="mb-4">Your Order</h2>
                    <div class="table-wrapper mb-3">
                        <table>
                            <tr>
                                <th>Book</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                            <?php

                                $sql = "SELECT * FROM order_details WHERE order_code = $code";
                                $query = mysqli_query($con, $sql);
                                while($row = mysqli_fetch_assoc($query)):
                                    $title = $row['order_books'];
                                    $price = $row['order_total'] / $row['order_count'];
                                    $qty = $row['order_count'];
                                    $total = $row['order_total'];
                            ?>
                            <tr>
                                <td><?php echo $title;?></td>
                                <td>$<?php echo $price;?></td>
                                <td><?php echo $qty;?></td>
                                <td>$<?php echo $total;?></td>
                            </tr>
                            <?php  endwhile;  ?>
                        </table>
                    </div>
                    <div class="d-flex align-items-end justify-content-end w-100 px-3">
                        <a href="./delivery.php" class="okay">Okay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>