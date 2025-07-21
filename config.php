<?php
// database connection
$conn = mysqli_connect("localhost", "root", "", "qms");
if (!($conn)) {
    echo "DB not connect";
}
?>