<?php
session_start();
include('conn.php');
$id=$_SESSION['id'];
$password=$_POST['password'];
$mobile=$_POST['mobile'];
$bhawan=$_POST['bhawan'];
$room=$_POST['room'];
$email=$_POST['email'];
$password_hash = hash('sha256', $password);

$check = "select * from student where id = $id ;";
if($result = $conn->query($check)) {
    while ($r = $result->fetch_assoc()) {
        if ($password_hash==$r['password']) {
$sql="update student set mobile=$mobile, bhawan=$bhawan, room=$room, email=$email where id=$id ; ";
 if ($conn->query($sql)) {
       echo true;
}
else {
  echo false ;
} }}}
$conn->close();
 ?>
