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
$password_hash = password_hash($password, PASSWORD_BCRYPT);

$sql="insert into student(name,enroll,username,password,mobile,bhawan,room,email)
 values('$name','$enroll','$username','$password_hash','$mobile','$bhawan','$room','$email')";

 if ($conn->query($sql)) {
       echo true;
      $host  = $_SERVER['HTTP_HOST'];
      $uri="/html/login.html";
      $index_url="http://".$host.$uri;
header( "Location: $index_url" );
}
else {
  echo "Registration failed";
}
$conn->close();
 ?>
