
<?php
    
    session_start();
    include_once("../php/config.php");
    $user_id = $_SESSION['usr_id'];
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Haven | User Profile </title>
    <link rel="stylesheet" href="../assets/css/profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="icon" href="../icons/svg/logo.svg">
</head>
<style>
    
    .profile-wrapper{
        height: 80vh;
    }
</style>
<body>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-center profile">
                <div class="profile-wrapper shadow d-flex align-items-center justify-content-center flex-column">

                <?php
                
                    include_once("../php/config.php");
                    

                    $sql = "SELECT * FROM user WHERE id = $user_id";
                    $query = mysqli_query($con, $sql);


                    while($row = mysqli_fetch_assoc($query)):
                        $name = $row['fname'] . " " . $row['lname'];
                        $email = $row['email'];
                        $phone = $row['phone'];
                        $img = $row['image'];
                                
                ?>


                    <div class="img-box mb-3" style="background: url(../icons/<?php echo $img; ?>);
                    background-position: center; background-repeat: no-repeat;
                    background-size: cover;"></div>

                    <div class="text-center d-flex align-items-center justify-content-center flex-column mb-3">
                        <h5 class="title">Name</h5>
                        <span><?php echo $name;?></span>
                    </div>
                    <div class="text-center d-flex align-items-center justify-content-center flex-column mb-3">
                        <h5 class="title">Email</h5>
                        <span><?php echo $email;?></span>
                    </div>
                    <div class="text-center d-flex align-items-center justify-content-center flex-column mb-3">
                        <h5 class="title">Phone</h5>
                        <span>+<?php echo $phone;?></span>
                    </div>
                    <a href="../index.html" class="logout mb-5">Logout</a>
                    <div class="text-center d-flex align-items-center justify-content-between mb-3">
                        <a href="./shop.php" class="back"><i class="bi bi-chevron-left"></i> Back</a>
                        <div class="mx-4"></div>
                        <a href="./edit_profile.php?id=<?php echo $user_id; ?>" class="edit d-flex align-items-center"><i class="bi bi-pen me-2"></i> Edit</a>
                    </div>

                <?php
                    endwhile;
                ?>

                </div>
            </div>
        </div>
    </div>

</body>
</html>