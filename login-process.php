<?php
session_start();
require_once "../config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
    $_SESSION['message'] = "Some Required Fields Are Empty, Please Recheck !!";
    $_SESSION['type'] = "danger";
    header("location:login.php");
    return;
    }

    $user = mysqli_query($conn, "SELECT * FROM `users` WHERE email='$email'");
    if (!(mysqli_num_rows($user)>0)) {
        $_SESSION['message'] = "User With This Email Is Not Exist, Try To Register !!";
        $_SESSION['type'] = "warning";
        header("location:login.php");
        return;
    }

    $user = mysqli_fetch_assoc($user);
    if (!(password_verify($password, $user['password']))) {
        $_SESSION['message'] = "Invalid Password, Please Recheck !!";
        $_SESSION['type'] = "danger";
        header("location:login.php");
        return;
    }

    if ($user['users_type'] == "student") {
        $_SESSION['student'] = $user;
        header("location:../student/index.php");
        return;
    }elseif ($user['users_type'] == "admin") {
        $_SESSION['admin'] = $user;
        header("location:../admin/dashboard.php");
        return; 
    }
}