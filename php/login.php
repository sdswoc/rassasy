<?php
session_start();
session_regenerate_id(true);
include('conn.php');

    $email = $_POST['email'];
    $classification = $_POST['classification'];
    $password_string = $_POST['password'];
    if ($classification == "canteen") {
      $sql = "select * from canteen where email='$email';";

      $result = $conn->query($sql);
      $r = $result->fetch_assoc();

      if ($result->num_rows >0) {
        $password_hash = $r['password'];
        if(password_verify($password_string, $password_hash))
        {
        $_SESSION['id'] = $r['id'];
        $_SESSION['name'] = $r['managername'];
        $_SESSION['email'] = $r['email'];
        $_SESSION['username'] = $r['canteenname'];
        if ($conn->query($sql) == true) {
          $host  = $_SERVER['HTTP_HOST'];
          $uri = "/html/canteenhomepage.php";
          $index_url = "http://" . $host . $uri;
          header("Location: $index_url");
        }
        $conn->close();}
        else
        echo "wrong password";      
      } 
      if ($result->num_rows == 0) {
          echo "user not found";
        }
    }
     else {
      $sql = "select * from student where email='$email';";

      $result = $conn->query($sql);
      $r = $result->fetch_assoc();

      if ($result->num_rows == 1) {
        $password_hash = $r['password'];
        if(password_verify($password_string, $password_hash))
        {
        $_SESSION['id'] = $r['id'];
        $_SESSION['name'] = $r['name'];
        $_SESSION['email'] = $r['email'];
        $_SESSION['username'] = $r['username'];
        if ($conn->query($sql) == true) {
          $host  = $_SERVER['HTTP_HOST'];
          $uri = "/html/userhomepage.php";
          $index_url = "http://" . $host . $uri;
          header("Location: $index_url");
        }
        $conn->close();}
        else
        echo "wrong password"; 
      } 
         if ($result->num_rows == 0) {
          echo "user not found";

        }
      }
?>