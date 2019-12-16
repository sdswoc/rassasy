<?php
include('conn.php');

$usernameinput = $_POST[username];
if (isset($_POST[id])) {
    $id = $_POST[id];
    $sql = "select username from student where username like '%$usernameinput%' and id!=$id;";
} else
    $sql = "select username from student where username like '%$usernameinput%';";
$result = $conn->query($sql);
var_dump( $sql);
$n = $result->num_rows;
if ($n > 0) {
    echo "false";
} else {
    echo "true";
}
$conn->close();
?>