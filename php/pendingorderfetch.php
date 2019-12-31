<?php
  session_start();
  include('conn.php');

  $canteenname = $_SESSION['username'];
  $tablename = "order_$canteenname";

  $last_order_id = $_POST["last_order_id"];
  $sql = "select * from $tablename where orderid>=$last_order_id order by orderid";
  $data = [];

  if ($result = $conn->query($sql))
    while ($r = $result->fetch_assoc()) {
      array_push($data, $r);
    }
  if (empty($data))
    echo false;
  else
    echo json_encode($data);
  $conn->close();