<?php
session_start();
include('conn.php');
$name=$_POST['name'];
$password=$_POST['password'];
$email=$_POST['email'];
$username=$_POST['username'];
$gender=$_POST['gender'];
$mobile=$_POST['mobile'];
$enroll=$_POST['enroll'];
$branch=$_POST['branch'];
$year=$_POST['year'];
$organizer=$_POST['organizer'];
$security_ques=$_POST['security_ques'];
$security_ans=$_POST['security_ans'];
$sql="insert into users(name,password,email,gender,mobile,enroll,branch,year,organizer,security_ques,security_ans,username) values('$name','$password','$email','$gender','$mobile','$enroll','$branch',$year,'$organizer','$security_ques','$security_ans','$username')";
$create_event_table_user="create table event_$username(event_no int,date date,start_at time);";
$conn->query($create_event_table_user);
if ($conn->query($sql)==true) {
    $_SESSION[msg_signup]="Signup Succesful";
      $host  = $_SERVER['HTTP_HOST'];
      $uri="/modals/login_modal.php";
      $index_url="http://".$host.$uri;
header( "Location: $index_url" );
}
 ?>
