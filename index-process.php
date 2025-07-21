<?php
session_start();
require_once "../config.php";

// Define correct answers
$correct_answers = [
    'quiz1' => 'peacock',
    'quiz2' => 'tiger',
    'quiz3' => 'mango',
    'quiz4' => 'rajendra-prasad'
];

$correct = 0;
$wrong = 0;

// Count correct/wrong answers
foreach ($correct_answers as $key => $answer) {
    if (isset($_POST[$key])) {
        if (strtolower(trim($_POST[$key])) === $answer) {
            $correct++;
        } else {
            $wrong++;
        }
    } else {
        $wrong++;
    }
}

// Escape input
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$contact = mysqli_real_escape_string($conn, $_POST['contact']);

$quiz1 = mysqli_real_escape_string($conn, $_POST['quiz1']);
$quiz2 = mysqli_real_escape_string($conn, $_POST['quiz2']);
$quiz3 = mysqli_real_escape_string($conn, $_POST['quiz3']);
$quiz4 = mysqli_real_escape_string($conn, $_POST['quiz4']);

// Store results in session
$_SESSION['result'] = [
    'name' => $name,
    'email' => $email,
    'contact' => $contact,
    'correct' => $correct,
    'wrong' => $wrong
];

// Insert into DB
if (empty($quiz1) || empty($quiz2) || empty($quiz3) || empty($quiz4)) {
    $_SESSION['message'] = "Some Answer Fields Are Empty, Please Recheck !!";
    $_SESSION['type'] = "danger";
    header("location:index.php");
    return;
}
$insert_query = mysqli_query($conn, "INSERT INTO `quiz_answe`(`name`, `email`, `contact`, `quiz1`, `quiz2`, `quiz3`, `quiz4`) 
    VALUES ('$name','$email','$contact','$quiz1','$quiz2','$quiz3','$quiz4')");

// Redirect
if ($insert_query) {
    header("Location:../thankyou.php");
    exit;
} else {
    echo "Database error: " . mysqli_error($conn);
}
?>
