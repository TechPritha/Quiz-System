<?php
session_start();
require_once "../config.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $user_id = rand(1111111111, 9999999999);
    $image_name = $_FILES['photo']['name'];
    $image_tmp_name = $_FILES['photo']['tmp_name'];
    $file_path = "../user-photos/".$image_name;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $contact = $_POST['contact'];

    if (empty($name) || empty($email) || empty($contact) || empty($password) || empty($cpassword) || empty($image_name)) {
        $_SESSION['message'] = "Some Required Fields Are Empty, Please Recheck !!";
        $_SESSION['type'] = "danger";
        header("location:register.php");
        return;
    }

    if (!($password === $cpassword)) {
    $_SESSION['message'] = "password and conform password are not matched, please rechek !!";
    $_SESSION['type'] = "danger";
    header("location:register.php");
    return;
    }
    
    $select_query = mysqli_query($conn, "SELECT * FROM `users` WHERE email='$email'");
    if (mysqli_num_rows($select_query)>0) {
        $_SESSION['message'] = "User With This Email Already Exist, Try With Diffrent Email !!";
        $_SESSION['type'] = "warning";
        header("location:register.php");
        return;
    }

    $enc_password = password_hash($password, PASSWORD_DEFAULT);
    $insert_query = mysqli_query($conn, "INSERT INTO `users`(`user_id`, `name`, `email`, `password`,`photo`, `contact`) VALUES ('$user_id','$name','$email','$enc_password','$file_path','$contact')");
    if ($insert_query) {
        move_uploaded_file($image_tmp_name, $file_path);
        $_SESSION['message'] = "Account Created Successfully, please Log-in";
        $_SESSION['type'] = "success";
        header("location:login.php");
        return;
    } 
}
?>