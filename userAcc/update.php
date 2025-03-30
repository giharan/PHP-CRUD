<?php
require_once 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch record by ID
    $sql = "SELECT * FROM user_details WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['userName'];
        $email = $row['userGmail'];
        $password = $row['userPassword'];
    } else {
        echo "Record not found.";
        exit();
    }
} else {
    echo "ID parameter is missing.";
    exit();
}
?>

<form action="update.inc.php" method="post">
    
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="name">User Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $username; ?>" required><br>
    <label for="email">User Gmail:</label>
    <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br>
    <label for="password">Password:</label>
    <input type="text" id="password" name="password" value="<?php echo $password; ?>" required><br>
    <button type="submit">Update</button>
</form>
