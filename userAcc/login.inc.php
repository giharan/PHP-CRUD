<?php
require_once './connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST["userGmail"]);
    $password = trim($_POST["userPassword"]);

    // Use mysqli_query for modern PHP
    $sql = "SELECT * FROM user_details WHERE userGmail = '$email' AND userPassword = '$password'";
    $result = $conn->query($sql);

    // Check if a user was found
    if ($result && $result->num_rows == 1) {
        echo "<script>alert('User login successful');</script>";
        echo "<script>window.location.href = 'display.php';</script>";
    } else {
        echo "<script>alert('Invalid Gmail or password');</script>";
        echo "<script>window.location.href = 'login.php';</script>";
    }
}

// Close the database connection
$conn->close();
?>
