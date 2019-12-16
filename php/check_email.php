<?php
include('conn.php');

$emailinput = $_POST[email];
if (isset($_POST[id])) {
    $id = $_POST[id];
    $sql = "select * from student where email= '$emailinput' and id!=$id;";
} else
    $sql = "select * from student where email= '$emailinput';";
$result = $conn->query($sql);
$n = $result->num_rows;
if ($n > 0) {
    echo "false";
} else {
    echo "true";
}
$conn->close();
?>