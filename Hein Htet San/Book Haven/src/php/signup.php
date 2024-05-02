<?php

    session_start();
    include("config.php");

    if(isset($_POST['signup'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password =$_POST['password'];
        $phone = $_POST['phone'];



        if(!empty($fname) || !empty($lname) || !empty($email) || !empty($password) || !empty($phone)){
            // $sql = "INSERT INTO user "
        }
    }


?>