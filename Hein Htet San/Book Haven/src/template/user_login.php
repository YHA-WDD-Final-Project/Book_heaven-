<?php
            
    include_once("../php/config.php");
    session_start();
    $err = "d-none";
    if(isset($_POST['signin'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM user";
        $query = mysqli_query($con, $sql);
        if(!empty($email) || !empty($password)){
            if(mysqli_num_rows($query) > 0){
                while($row = mysqli_fetch_assoc($query)){
                    if($email == $row['email'] && $password == $row['password']){
                        $err = "d-none";
                        $_SESSION['usr_id'] = $row['id'];
                        header("Location:./shop.php");
                    }else{
                        $err = "d-block";
                    }
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
    <title>Book Haven | User Login</title>
    <link rel="stylesheet" href="../assets/css/login2.css">
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

                <form action="" method="post" class=" d-flex align-items-center justify-content-center flex-column">
                    <div class="logo mb-3">
                        <img src="../icons/svg/logo.svg" alt="">
                    </div>
                    <div class="title text-center mb-5">
                        <h3>Login</h3>
                    </div>
                    <div class="input-container position-relative mb-4">
                        <input type="email" name="email" id="" class="field shadow" required>
                        <small class="label">Email</small>
                    </div>
                    <div class="input-container position-relative mb-3">
                        <div class="eye">
                            <i class="bi bi-eye"></i>
                            <i class="bi bi-eye-slash d-none"></i>
                        </div>
                        <input type="password" name="password" id="" class="field shadow" required>
                        <small class="label">Password</small>
                    </div>
                    <div class="btn-gp mt-3 mb-3">
                        <a href="../index.html">Back</a>
                        <button class="sign-in" name="signin">Sign in</button>
                    </div>
                    <div class="form-footer border-top">
                        <p>Are you new to here!<br><a href="./user_signup.php">Register</a></p>
                    </div>
                    <small class="text-warning <?php echo $err;?>">Email or Password is incorrect!</small>
                </form>
            </div>
        </div>
    </div>
    <script src="../assets/js/eye.js"></script>
</body>
</html>