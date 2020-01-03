<?php
include('conn.php');
$canteenname = $_POST['canteenname'];
$canteenid = $_POST['canteenid'];
$password = $_POST['password'];
$password_hash = hash('sha256', $password);
$email = $_POST['email'];
$managername = $_POST['managername'];
$mobile = $_POST['mobile'];
$location = $_POST['location'];
$openingtime = $_POST['openingtime'];
$closingtime = $_POST['closingtime'];

$sql = "insert into canteen(canteenname, canteenid, password, email, managername, mobile, location, openingtime, closingtime)
 values('$canteenname','$canteenid','$password_hash','$email','$managername','$mobile','$location','$openingtime','$closingtime')";

$create_table_canteen_order = "create table order_$canteenname(id int primary key auto_increment, itemid int(10),
 itemname varchar(30),count int(2), orderid int(10),price int(5),total int(5), student_name varchar(20), student_mobile varchar(15), student_id int(10), status int(2) default 0);";

$create_table_canteen_menu = "create table menu_$canteenname(id int primary key auto_increment, itemno int(10) unique,
itemname varchar(30), price int(20), rating int(5), status int(2) default 1 );";

$create_table_canteen_feedback = "create table feedback_$canteenname(id int primary key auto_increment, trackingid int(2) unique, itemid varchar(5), orderid varchar(5),
studentid varchar(5),rating float);" ;

if ($conn->query($sql) && $conn->query($create_table_canteen_menu) && $conn->query($create_table_canteen_order) && $conn->query($create_table_canteen_feedback)) {
      echo true;
} else {
      echo false;
}

$conn->close();
