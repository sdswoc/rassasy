<?php
include('conn.php');
session_start();

$tablenamename = $_POST['tablename'];
$username = $_SESSION['username'];
if ($tablename=="student")
{
$sql = "select * from student where username='$username';";
$result = $conn->query($sql);
      $r = $result->fetch_assoc();

      if ($result->num_rows >0) {
        echo true;
      }
      else {
          echo false;
      }
    }   
else if ($tablename=="canteen") {
    $sql = "select * from canteenname where canteenname'$username';";
    $result = $conn->query($sql);
          $r = $result->fetch_assoc();
    
          if ($result->num_rows >0) {
            echo true;
          }
          else {
              echo false;
          }
        } 
else {
    echo "Invalid entry";
}  

$conn->close();


?>