<?php
include("conn.php");
session_start();
$canteenname = $_SESSION['canteenname'];
$sum=0;
$count=0;
$flag = false;
$sql1 = "select * from menu_$canteenname ;";
if($result1 = $conn->query($sql1)) {
    while ($r1 = $result1->fetch_assoc()) {
        $itemid = $r1['id'];
        $sql2 = "select * from feedback_$canteenname where itemid = $itemid ; ";
if($result2 = $conn->query($sql2)) {
    while ($r2 = $result2->fetch_assoc()) {
        $sum= $sum + $r['rating'];
        $count++;    
    }
    $rating = $sum / $count ;
} 
$sql = "update menu_$canteenname set rating = $rating where id = $r1[id];";
if($conn->query($sql))
$flag = true;
} }
else 
echo $flag;
?>

