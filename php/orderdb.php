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
    $itemno = $row['itemno'];
    $itemname = $row['itemname'];
    $sql = "insert into $tablename(itemno, itemname, orderid, student_name, student_mobile, status)
     values('$itemno','$itemname','$orderid','$studentname','$studentmobile','0');"; }
    if ($conn->query($sql)) {
        echo true;
    }
    else 
    {
        echo false;
    }


$conn->close();
?>