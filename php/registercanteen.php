<?php
session_start();
include('conn.php');
$canteenname=$_POST['canteenname'];
$canteenid=$_POST['canteenid'];
$password=$_POST['password'];
$email=$_POST['email'];
$managername=$_POST['managername'];
$mobile=$_POST['mobile'];
$location=$_POST['location'];
$openingtime=$_POST['openingtime'];
$closingtime=$_POST['closingtime'];

$sql="insert into canteen(canteenname,canteenid,password,email,managername,mobile,location,openingtime,closingtime)
 values('$canteenname','$canteenid','$password','$email','$managername','$mobile','$location','$openingtime','$closingtime')";

$create_table_canteen_order="create table order_$canteenname(id int primary key auto_increment,itemno int(10) unique,
 item_name varchar(30), price int(20));";
$conn->query($create_table_canteen_order);

$create_table_canteen_menu="create table menu_$canteenname(id int primary key auto_increment,itemno int(10) unique,
item_name varchar(30), price int(20));";
$conn->query($create_table_canteen_menu);

if ($conn->query($sql)==true) {
      /* $_SESSION[msg_signup]="Signup Succesful"; */
      $host  = $_SERVER['HTTP_HOST'];
      $uri="/html/canteenhomepage.html";
      $index_url="http://".$host.$uri;
header( "Location: $index_url" );
}
$conn->close();
?>