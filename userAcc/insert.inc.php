<?php
require_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Check if email already exists in the database
    $checkQuery = "SELECT * FROM user_details WHERE userGmail = '$email'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        echo "<script>alert('This Gmail address is already registered. Please use a different Gmail address.');</script>";
        echo "<script>window.location.href='insert.php';</script>";
    } else {
        // Insert data into the database
        $sql = "INSERT INTO user_details (userName, userGmail, userPassword)
                VALUES ('$username', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Data Added Successfully');</script>";
            echo "<script>window.location.href='display.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
