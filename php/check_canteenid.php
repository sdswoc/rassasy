<?php
include('conn.php');

$canteenidinput = $_POST[canteenid];
if (isset($_POST[id])) {
    $id = $_POST[id];
    $sql = "select * from canteen where canteenid= '$canteenidinput' and id!=$id;";
} else {
    $sql = "select * from canteen where canteenid= '$canteenidinput';"; }
$result = $conn->query($sql);
$n = $result->num_rows;
if ($n > 0) {
    echo "false";
} else {
    echo "true";
}
$conn->close();
?>