<?php
session_start();
include('conn.php');
$name=$_POST['name'];
$enroll=$_POST['enroll'];
$username=$_POST['username'];
$password=$_POST['password'];
$mobile=$_POST['mobile'];
$bhawan=$_POST['bhawan'];
$room=$_POST['room'];
$email=$_POST['email'];
$password_hash = hash('sha256', $password);

$sql="insert into student(name,enroll,username,password,mobile,bhawan,room,email)
 values('$name','$enroll','$username','$password_hash','$mobile','$bhawan','$room','$email')";

 if ($conn->query($sql)) {
       echo true;
}
else {
  echo false ;
}
$conn->close();
 ?>
