<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Haven | Contact</title>
    <link rel="stylesheet" href="../assets/css/contact.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="icon" href="../icons/svg/logo.svg">
</head>
<style>
    small{
        padding: .8rem 1.4rem;
        font-size: 20px;
        font-weight: 600;
        text-align: center;
        background: #fff;
        border-radius: 10px;
        position: absolute;
        bottom: 0;
        transform: translateY(100%);
        transition: all .5s ease-in-out;
        right: 30px;
    }
    small.active{
        transform: translateY(-25%);
    }
    form input, form textarea{
        border: 2px solid #999;
    }
    form input:focus, form textarea:focus{
        border: none;
    }
</style>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="d-none d-md-block col-12 col-md-6 d-flex align-items-center justify-content-center p-5">
                <img src="../img/map.jpg" class="shadow" alt="">
            </div>
            <div class=" col-0 col-md-6 px-4 p-md-5 d-flex flex-column align-items-start justify-content-center">
                <h4 class="px-3">We would love to hear from you!</h4>
                <p class="px-3 ">Your email address will not be published. Required Fields are marked*.</p>

                <?php
                
                    include_once("../php/config.php");  
                    $status = " ";
                    $err = " ";

                    if(isset($_POST['submit'])){
                        $msg_id = rand(0, 1000);
                        $user_name = $_POST['name'];
                        $user_email = $_POST['email'];
                        $text_msg = $_POST['msg'];

                        if(!empty($user_name) || !empty($user_email) || !empty($text_msg)){
                            $sql = "INSERT INTO message VALUES ($msg_id, '$user_name', '$user_email', '$text_msg')";
                            $query = mysqli_query($con, $sql);
                            if($query){
                                $err = "active";
                                $status = "Submitted Successfully";
                            }else{
                                $err = "active";
                                $status = "Cannot submit!";
                            }
                        }
                    }
                
                ?>


                <form action="" method="post" class="d-flex align-items-center justify-content-center flex-column">
                    <input type="text" name="name" placeholder="Username" class="mb-3 shadow" required>
                    <input type="Email" name="email" placeholder="Email" class="mb-3 shadow" required>
                    <textarea name="msg" id="" cols="30" rows="10" placeholder="Type your message" class="shadow mb-3" required></textarea>
                    <div class="btn-gp d-flex align-items-center justify-content-between">
                        <a href="../index.html">Back</a>
                        <button class="submit" name="submit">Submit</button>
                    </div>
                </form>
                <small class="response shadow text-success <?php echo $err;?>"><?php echo $status;?></small>
            </div>
        </div>
    </div>
    <script>
        const response = document.querySelector(".response");
        setInterval(() => {
            if(response.classList.contains("active")){
                response.classList.remove("active");
                console.log("removed")
            }
        }, 800);
    </script>
</body>
</html>