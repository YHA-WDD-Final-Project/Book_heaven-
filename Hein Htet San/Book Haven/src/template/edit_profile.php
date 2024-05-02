<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Haven | Edit Profile </title>
    <link rel="stylesheet" href="../assets/css/profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="icon" href="../icons/svg/logo.svg">
</head>
<style>
    h2{
        font-family: var(--Gluten);
        color: var(--azul);
    }
    .profile-wrapper{
        height: 65vh;
    }
    input{
        border: 2px solid #999;
        font-family: var(--Gochi);
    }
    input:focus{
        border:none;
    }
</style>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 profile d-flex align-items-center justify-content-center">
                <div class="profile-wrapper shadow d-flex flex-column align-items-center justify-content-center px-5">


                <?php
                
                    include_once("../php/config.php");
                    session_start();
                    $user_id = $_GET['id'];
                    $err = "d-none";

                    $sql = "SELECT * FROM user WHERE id = $user_id";
                    $query = mysqli_query($con, $sql);

                    while($row = mysqli_fetch_assoc($query)):
                        $img = $row['image'];
                        $name = $row['fname'] . " " . $row['lname'];
                        $email = $row['email'];
                        $password = $row['password'];
                        $phone = $row['phone'];
                
                ?>

                    <form action="" method="post" class="w-100">

                        <h2 class=" my-3">Information</h2>
    
                        <div class="text-center d-flex align-items-center justify-content-between mb-3 position-relative">
                            <i class="bi bi-person-fill me-3 fs-4"></i>
                            <input type="text" name="name" value="<?php echo $name;?>">
                        </div>
                        <div class="text-center d-flex align-items-center justify-content-between mb-3 position-relative">
                            <i class="bi bi-envelope me-3  fs-4"></i>
                            <input type="email" name="email" value="<?php echo $email;?>">
                        </div>
                        <div class="text-center d-flex align-items-center justify-content-between mb-3 position-relative">
                            <i class="bi bi-key-fill me-3  fs-4"></i>
                            <input type="password" name="password" value="<?php echo $password;?>">
                        </div>
                        <div class="text-center d-flex align-items-center justify-content-between mb-5 position-relative">
                            <i class="bi bi-telephone-fill me-3  fs-5"></i>
                            <input type="number" name="phone" value="<?php echo $phone;?>">
                        </div>
                        <div class="text-center d-flex align-items-center justify-content-between mb-3">
                            <a href="./profile.php?id=<?php echo $user_id;?>" class="back"><i class="bi bi-chevron-left"></i> Back</a>
                            <div class="mx-4"></div>
                            <button name="save" class="edit"><i class="bi bi-check"></i> Save</button>
                        </div>
                        <small class="text-warning <?php echo $err;?>">Fields cannot be blank!</small>
                    </form>

                <?php
                    endwhile;
                ?>


                <?php
                
                    if(isset($_POST['save'])){
                        $user_name = $_POST['name'];
                        $mail = $_POST['email'];
                        $pw = $_POST['password'];
                        $ph = $_POST['phone'];
                        if(!empty($user_name) || !empty($mail) || !empty($pw) || !empty($ph)){
                            $err = "d-none";
                            $name_arr = explode(" ", $user_name, 2);
                            $fname = $name_arr[0];
                            $lname = $name_arr[1];
                            $sql2 = "UPDATE user SET fname='$fname', lname='$lname', email='$mail', password='$pw', phone='$ph' WHERE id = $user_id";
                            $query2 = mysqli_query($con, $sql2);
                            if($query2){
                                $_SESSION['id'] = $user_id;
                                header("location:./profile.php");
                            }
                        }else{
                            $err = "d-block";
                        }
                    }

                ?>

                </div>
            </div>
        </div>
    </div>

</body>
</html>