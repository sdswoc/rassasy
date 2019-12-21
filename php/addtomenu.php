<?php
session_start();
include('conn.php');

$id = $_SESSION['id'];
$canteenname = $_SESSION['username'];
$tablename = "menu_$canteenname";
$add_menu_data = $_POST['add_menu_data'];
$flag = true;
foreach ($add_menu_data as $key => $row) {
    $itemno = $row['itemno'];
    $itemname = $row['itemname'];
    $price = $row['price'];
    $sql = "insert into $tablename(itemno, itemname, price) values('$itemno','$itemname','$price');";
    if (!$conn->query($sql)) {
        $flag = false;
    }
}

echo $flag;
$conn->close();
?>