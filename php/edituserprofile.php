<?php
session_start();
include('conn.php');
session_start();
$id=$_SESSION['id'];
$password=$_POST['password'];
$mobile=$_POST['mobile'];
$bhawan=$_POST['bhawan'];
$room=$_POST['room'];
$email=$_POST['email'];
$enroll=$_POST['enroll'];
$name=$_POST['name'];
$username=$_POST['username'];
$password_hash = hash('sha256', $password);

if($result = $conn->query($check)) {
    while ($r = $result->fetch_assoc()) {
        if ($password_hash==$r['password']) {
$sql="update student set mobile=$mobile, bhawan=$bhawan, room=$room, email=$email, name=$name, username=$username, enroll=$enroll where id=$id;";
var_dump($sql);
if ($conn->query($sql)) {
       echo true;
}}}}
else {
  echo false ;
} 
$conn->close();
 ?>
