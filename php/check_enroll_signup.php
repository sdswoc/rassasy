<?php
include('conn.php');

$enroll_input = $_POST[enroll];
if (isset($_POST[id])) {
    $id = $_POST[id];
    $sql = "select enroll from student where enroll like '%$enroll_input%' and id!=$id;";
} else
    $sql = "select enroll from student where enroll like '%$enroll_input%';";
$result = $conn->query($sql);
$n = $result->num_rows;
if ($n > 0) {
    echo "false";
} else {
    echo "true";
}
$conn->close();
?>