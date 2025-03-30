<?php
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = trim($_POST["id"]);
    $username = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Update query
    $sql = "UPDATE user_details SET userName='$username', userGmail='$email', userPassword='$password' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('User Details Updated Successfully');</script>";
        echo "<script>window.location.href='display.php';</script>";
        exit();
    } else {
        echo "Details Update Failed: " . $conn->error;
    }
}

$conn->close();
?>
