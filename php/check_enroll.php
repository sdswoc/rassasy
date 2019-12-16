<?php
include('conn.php');

$enrollinput = $_POST[enroll];
if (isset($_POST[id])) {
    $id = $_POST[id];
    $sql = "select * from student where enroll= '$enrollinput' and id!=$id;";
} else {
    $sql = "select * from student where enroll= '$enrollinput';"; }
$result = $conn->query($sql);
$n = $result->num_rows;
if ($n > 0) {
    echo "false";
} else {
    echo "true";
}
$conn->close();
?>