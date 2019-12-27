<?php
session_start();
if (!(isset($_SESSION['username'])))
{
    header("Location: ../html/login.html");
}
include('conn.php');

$cartArray = $_POST['cartArray'];
$canteenname = $_SESSION['canteenname'];
$studentname = $_SESSION['name'];
$studentmobile = $_SESSION['mobile'];
$studentid = $_SESSION['id'];
$takeid = "select * from order_$canteenname groupby 'orderid' DESC limit 1 ; ";
if ($conn->query($takeid))
{
    $result = $conn->query($sql);
    $orderid = $result['orderid']+1 ;
}
else 
$orderid = 0 ;

foreach ($cartArray as $key => $row) {
    $itemno = $row['no'];
    $itemname = $row['name'];
    $count = $row['count'];
    $price = $row['price'];
    $total = $row['total'];
    $sql = "insert into order_$canteenname(itemno, itemname, quantity, orderid, price, total, student_name, student_mobile, student_id, status)
    values ('$itemno','$itemname','$count','$orderid','$price','$total','$studentname','$studentmobile','$studentid','0') ;";
    if ($conn->query($sql)) {
        $flag = true;
