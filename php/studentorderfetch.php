<?php
session_start();
include('conn.php');

$checkdata = $_POST['checkdata'];

foreach ($add_menu_data as $key => $row) {
    $canteenname = $row['canteenname'];
    $itemname = $row['itemname'];
    $orderid = $row['orderid'];
    $tablename = 

    $sql = "insert into $tablename(itemno, itemname, price) values('$itemno','$itemname','$price');";
    if ($conn->query($sql)) {
        $flag = true;


$sql = "update $tablename set availability = '$status'  where id = '$itemid';"; 
    if ($conn->query($sql)) {
        echo true;
    }
    else {
        echo false ;
    }
$conn->close();
