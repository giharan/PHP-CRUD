<?php
require_once './connection.php';

if (isset($_GET["delete_id"])){
    $deleteID = $_GET['delete_id'];

    $sql = "DELETE FROM user_details WHERE id = '$deleteID'";
    if($conn->query($sql) === TRUE){
        echo "<script>alert ('User Account Deleted');</script>";
        echo "<script> window.location.href = 'insert.php';</script>";

    }else{
        echo "Account Deleted Failed";
    }
}else{
    echo "Delete id parameter not found";
}
$conn->close();

?>