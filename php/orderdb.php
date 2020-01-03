<?php
session_start();
include('conn.php');

$id = $_SESSION['id'];
$studentname = $_SESSION['name'];
$studentmobile = $_SESSION['mobile'];
$tablename = "order_$canteenname";
$addtocartdata = $_POST['addtocartdata'];
$flag = true;
foreach ($addtocartdata as $key => $row) {
    $itemid = $row['itemid'];
    $itemname = $row['itemname'];
    $sql = "insert into $tablename(itemid, itemname, orderid, student_name, student_mobile, status)
     values('$itemid','$itemname','$orderid','$studentname','$studentmobile','0');"; }
    if ($conn->query($sql)) {
        echo true;
    }
    else 
    {
        echo false;
    }


$conn->close();
?>