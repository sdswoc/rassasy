<?php
session_start();
if (!(isset($_SESSION['username']))) {
    header("Location: ../html/login.html");
}
include('../php/conn.php');

$cartArray = $_POST['cartArray'];
$canteenname = $_SESSION['canteenname'];
$studentname = $_SESSION['name'];
$studentmobile = $_SESSION['mobile'];
$studentid = $_SESSION['id'];
$takeid = "select orderid from order_$canteenname order by id DESC limit 1 ; ";
$result = $conn->query($takeid);
if ($result->num_rows > 0) {
    $r = $result->fetch_assoc();
    $orderid = $r['orderid'] + 1;
} else
    $orderid = 1;

$flag = true;

foreach ($cartArray as $key => $row) {
    $itemid = $row['no'];
    $itemname = $row['name'];
    $count = $row['count'];
    $price = $row['price'];
    $total = $row['total'];
    $sql = "insert into order_$canteenname (itemid, itemname, count, orderid, price, total, student_name, student_mobile, student_id, status)
    values ('$itemid','$itemname','$count','$orderid','$price','$total','$studentname','$studentmobile','$studentid','0') ;";
    if (!$conn->query($sql)) {
        $flag = false;
    }
}
echo $flag;
$conn->close();
