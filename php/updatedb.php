<?php
session_start();
include('conn.php');

$canteenname = $_SESSION['username'];
$tablename = "menu_$canteenname";
$itemid = $_POST['itemid'];
$status = $_POST['status'];

$sql = "update $tablename set status = '$status'  where id = '$itemid';"; 
    if ($conn->query($sql)) {
        echo true;
    }
    else {
        echo false ;
    }
$conn->close();
