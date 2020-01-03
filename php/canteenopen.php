<?php
session_start();
include('conn.php');

$id = $_SESSION['id'];
$canteenname = $_SESSION['username'];
$status = $_POST['status'];

if ($status == 0) {
    $check = "select * from order_$canteenname ;";
    $result = $conn->query($check);
    if ($result->num_rows > 0) {
        echo "Pending orders. Can't close canteen";
    } else {
        $sql = "update canteen set status = '$status'  where id = '$id';";
        if ($conn->query($sql)) {
            echo true;
        } else {
            echo "Connection Error";
        }
    }
}
 else {
$sql = "update canteen set status = '$status'  where id = '$id';";
if ($conn->query($sql)) {
    echo true;
} else {
    echo "Connection Error";
}
}
$conn->close();
