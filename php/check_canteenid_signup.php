<?php
include('conn.php');
$canteenid_input = $_POST[canteenid];
if (isset($_POST[id])) {
    $id = $_POST[id];
    $sql = "select username from canteen where canteenid like '%$canteenid_input%' and id!=$id;";
} else

    $sql = "select username from canteen where canteenid like '%$canteenid_input%';";
$result = $conn->query($sql);
$n = $result->num_rows;
if ($n > 0) {
    echo "false";
} else {
    echo "true";
}
?>