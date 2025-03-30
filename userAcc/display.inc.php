<?php
require_once 'connection.php';

$sql = "SELECT * FROM user_details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>User Name</th><th>User Gmail</th><th>Password</th><th>Actions</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["userName"] . "</td>";
        echo "<td>" . $row["userGmail"] . "</td>";
        echo "<td>" . $row["userPassword"] . "</td>";
        echo "<td>";
        // Update button
        echo "<button onClick=\"redirectToUpdateForm(" . $row["id"] . ")\">Update</button>";
        // Delete button
        echo "<a href=\"delete.php?delete_id=" . $row["id"] . "\"> Delete</a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No data available.";
}
$conn->close();
?>
<script src="script.js"></script>
