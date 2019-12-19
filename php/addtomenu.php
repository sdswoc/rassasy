<?php
session_start();
include('conn.php');

$id = $_SESSION['id'];
$canteenname = $_SESSION['username'];
$tablename = "menu_$canteenname";

$itemno=$_POST['itemno'];
$itemname=$_POST['itemname'];
$price=$_POST['price'];
var_dump($itemno);

$sql = "insert into $tablename(itemno, itemname, price) values('$itemno','$itemname','$price')";
if ($conn->query($sql)==true) {
    echo true;
    $host  = $_SERVER['HTTP_HOST'];
    $uri="/html/menu.php";
    $index_url="http://".$host.$uri;
header( "Location: $index_url" );
}
else {
    echo false;
}
$conn->close();
?>

