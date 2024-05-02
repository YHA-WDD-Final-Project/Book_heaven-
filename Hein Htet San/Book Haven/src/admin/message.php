<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Haven | Dashboard | Message</title>
    <link rel="stylesheet" href="../assets/css/message.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="icon" href="../icons/svg/logo.svg">
</head>
<style>
    .message-box{
    border: 2px solid var(--placeholder);
    }
    h5{
        color: var(--azul);
    }
    h5 span{
    font-family: var(--Gochi);
    color: #777;
    }
    p{
        font-family: var(--Gochi);
        font-size: 18px;
        color: #333;
        /* text-indent: 1.5rem; */
        letter-spacing: 1px;
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
                        <a href="./order.php" class=" d-flex span text-decoration-none"><i class="bi bi-card-checklist me-2"></i> <span class="d-none d-md-block span2 "> Order </span></a>
                    </div>
                    <div class="d-flex mb-md-3 me-5 me-md-0">
                        <a href="./message.php" class="active d-flex span text-decoration-none"><i class="bi bi-envelope me-2"></i> <span class="d-none d-md-block span2 active"> Message </span></a>
                    </div>
                </div>
            </div>

            <!-- main  -->
            <div class="col-12 col-md-10 order-0 order-md-1 main">

                <div class="row mt-3 mb-3">
                    <div class="col-12 d-flex px-5 align-items-center justify-content-between border-bottom py-2 main-navbar">
                        <div class="d-flex">
                            <i class="bi bi-envelope me-2"></i> Message
                        </div>
                    </div>
                </div>


                <div class="row">

                    <?php
                        include("../php/config.php");
                        $sql = "SELECT * FROM message";
                        $query = mysqli_query($con, $sql);
                        while($row = mysqli_fetch_assoc($query)):
                            $name = $row['user_name'];
                            $email = $row['email'];
                            $message = $row['msg'];
                    ?>

                    <div class="col-12 col-md-6 col-lg-4 d-flex align-items-start justify-content-start px-4 py-2">
                        <!-- message goes here  -->
                        <div class=" message-box d-flex flex-column align-items-start shadow justify-content-start p-3">
                            <h5><i class="bi bi-person-fill me-2"></i> <span><?php echo $name;?></span></h5>
                            <h5><i class="bi bi-envelope-fill me-2"></i> <span><?php echo $email;?></span></h5>
                            <p class=""><?php echo $message;?></p>            
                        </div>
                        <!-- message end here  -->
                    </div>
                    <?php endwhile;?>
                </div>
            </div>

            </div>
        </div>
    </div>
</body>
</html>