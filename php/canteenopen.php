<?php
session_start();
include('conn.php');

$id = $_SESSION['id'];
$status = $_POST['status'];

$sql = "update canteen set status = '$status'  where id = '$id';"; 
    if ($conn->query($sql)) {
        echo true;
    }
    else {
        echo false ;
    }
$conn->close();
