<?php
include('conn.php');
$username_input = $_POST[username];
if (isset($_POST[id])) {
    $id = $_POST[id];
    $sql = "select username from student where username like '%$username_input%' and id!=$id;";
} else

    $sql = "select username from student where username like '%$username_input%';";
$result = $conn->query($sql);
$n = $result->num_rows;
if ($n > 0) {
    echo "false";
} else {
    echo "true";
}
$conn->close();
?>