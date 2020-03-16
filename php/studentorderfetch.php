<?php
session_start();
include('conn.php');

$checkdata = $_POST['checkdata'];
$data = [];

foreach ($checkdata as $key => $row) {
    $canteenname = $row['canteenname'];
    $itemname = $row['itemname'];
    $orderid = $row['orderid'];
    $tablename = "order_$canteenname";

    $sql = "select * from $tablename where orderid = $orderid;";
    if ($result = $conn->query($sql)) {
            while ($r = $result->fetch_assoc()) {
                        if($r['status']==1) {
                            array_push($data, $r);
                        }
                    }
            }
        }
        if (empty($data))
    echo false;
  else
    echo json_encode($data);
  $conn->close();
