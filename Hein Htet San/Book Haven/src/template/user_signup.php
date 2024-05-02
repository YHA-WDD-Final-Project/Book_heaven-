<?php include("../php/signup.php");?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Haven | User Login</title>
    <link rel="stylesheet" href="../assets/css/signup.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="icon" href="../icons/svg/logo.svg">
</head>
<style>
    form .field{
        border: 2px solid var(--placeholder);
    }
    form .field:focus{
        border: none;
    }
</style>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 px-3 login-container">

            <?php

                include_once("../php/config.php");
                // session_start();
                $err = "d-none";

                if(isset($_POST['signup'])){
                    $duplicate = false;
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $phone = $_POST['phone'];
                    $img = "user.jpg";
                    if(!empty($email) || !empty($password) || !empty($phone)){
                        $fetch = "SELECT email FROM user";
                        $fetch_query = mysqli_query($con, $fetch);
                        while($row = mysqli_fetch_assoc($fetch_query)){
                            if($email == $row['email']){
                                $duplicate = true;
                            }
                        }
                        if(!$duplicate){
                            $err = "d-none";
                            $id = rand(0, 100000);
                            $sql = "INSERT INTO user VALUES ($id, '$fname', '$lname', '$email', '$password', '$img', '$phone')";
                            $query = mysqli_query($con, $sql);
                            if($query){
                                $_SESSION['usr_id'] = $id;
                                header("location:./shop.php");
                            }
                        }else{
                            $err = "d-block";
                        }
                    }
                }
            
            ?>


                <form action="" method="POST" enctype="multipart/form-data" class=" d-flex align-items-center justify-content-center flex-column">
                    <div class="logo mb-3">
                        <img src="../icons/svg/logo.svg" alt="">
                    </div>
                    <div class="title text-center mb-5">
                        <h3>Sign up</h3>
                    </div>
                    
                        <div class="row name-container px-4 mb-3">
                            <div class="col-6 input-container position-relative">
                                <input type="text" name="fname" id="fname" class="field shadow" required>
                                <small class="label">First</small>
                            </div>
                            <div class="col-6 input-container position-relative">
                                <input type="text" name="lname" id="lname" class="field shadow" required>
                                <small class="label">Last</small>
                            </div> 
                        </div>
                    
                    <div class="input-container position-relative mb-4">
                        <input type="email" name="email" id="email" class="field shadow" required>
                        <small class="label">Email</small>
                    </div>
                    <div class="input-container position-relative mb-3">
                        <div class="eye">
                            <i class="bi bi-eye"></i>
                            <i class="bi bi-eye-slash d-none"></i>
                        </div>
                        <input type="password" name="password" id="password" class="field shadow" required>
                        <small class="label">Password</small>
                    </div>
                    <div class="input-container position-relative mb-3">
                        <input type="number" name="phone" id="number" class="field shadow" required>
                        <small class="label">Phone number</small>
                    </div>
                    <div class="btn-gp mb-3">
                        <a href="../index.html">Back</a>
                        <button class="sign-in" type="submit" name="signup">Sign up</button>
                    </div>
                    <div class="form-footer border-top">
                        <p>Already have an account!<br><a href="./user_login.php">Sign in</a></p>
                    </div>
                    <small class="<?php echo $err; ?> text-warning">Email was already taken!</small>
                </form>
                
            </div>
        </div>
    </div>
    <script src="../assets/js/eye.js"></script>
</body>
</html>