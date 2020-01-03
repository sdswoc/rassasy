<?php
include("conn.php");
session_start();
$canteenname = $_SESSION['canteenname'];
$sum = 0;
$count = 0;
$flag_feedback = false;
$sql1 = "select * from menu_$canteenname ;";
if ($result1 = $conn->query($sql1)) {
    while ($r1 = $result1->fetch_assoc()) {
        $itemid = $r1['id'];
        $sql2 = "select * from feedback_$canteenname where itemid = $itemid ; ";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            while ($r2 = $result2->fetch_assoc()) {
                $sum = $sum + $r2['rating'];
                $count++;
            }
            $rating = $sum / $count;
        } else {
            $rating = 0;
        }
        $sql = "update menu_$canteenname set rating = $rating where id = $r1[id];";
        if ($conn->query($sql))
            $flag_feedback = true;
    }
}
