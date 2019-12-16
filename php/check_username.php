<?php
include('conn.php');

$usernameinput = $_POST[username];
if (isset($_POST[id])) {
    $id = $_POST[id];
    $sql = "select * rom student where username= '$usernameinput' and id!=$id;";
} else
    $sql = "select * from student where username= '$usernameinput';";
$result = $conn->query($sql);
$n = $result->num_rows;
if ($n > 0) {
    echo "false";
} else {
    echo "true";
}
$conn->close();
?>