<?php
include('conn.php');

$emailinput = $_POST[email];
$tablename = $_POST[tablename];
if (isset($_POST[id])) {
    $id = $_POST[id];
    $sql = "select * from $tablename where email= '$emailinput' and id!=$id;";
} else
    $sql = "select * from $tablename where email= '$emailinput';";
$result = $conn->query($sql);
$n = $result->num_rows;
if ($n > 0) {
    echo "false";
} else {
    echo "true";
}
$conn->close();
?>