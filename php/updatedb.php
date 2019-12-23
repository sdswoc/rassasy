<?php
session_start();
include('conn.php');

$id = $_SESSION['id'];
$canteenname = $_SESSION['username'];
$tablename = "menu_$canteenname";
$itemid = $_POST['itemid'];

$sql = "set availability to 0 where id=$itemid"; 
    if (!$conn->query($sql)) {
        echo true;
    }
    else {
        echo false ;
    }
$conn->close();
?>