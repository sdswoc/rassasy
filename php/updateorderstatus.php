<?php
session_start();
include('conn.php');

$canteenname = $_SESSION['username'];
$status = $_POST['status'];
$id = $_POST['orderupdateid'];

$sql = "update order_$canteenname set status = '$status'  where id = '$id';"; 
    if ($conn->query($sql)) {
        echo true;
    }
    else {
        echo false ;
    }
$conn->close();
