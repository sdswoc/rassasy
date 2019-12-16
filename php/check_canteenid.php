<?php
include('conn.php');

$input =$_POST[input];
$inputvalue = $_POST[inputvalue];
$tablename= $_POST[tablename];
if (isset($_POST[id])) {
    $id = $_POST[id];
    $sql = "select * from $tablename where $input= '$inputvalue' and id!=$id;";
} else {
    $sql = "select * from $tablename where $input= '$inputvalue';"; }
$result = $conn->query($sql);
$n = $result->num_rows;
if ($n > 0) {
    echo "false";
} else {
    echo "true";
}
$conn->close();
?>