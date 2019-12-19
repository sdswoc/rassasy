<?php
session_start();
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['classification'])) {
    $e = htmlspecialchars($_POST['email']);
    $p = htmlspecialchars($_POST['password']);
    $c = $_POST['classification'];
    if ($c == "canteen") {
      $sql = "select * from canteen where (email='$e' or canteenname='$e') and password='$p';";

      $result = $conn->query($sql);
      $r = $result->fetch_assoc();

      if ($result->num_rows >0) {
        $_SESSION[id] = $r[id];
        $_SESSION[name] = $r[managername];
        $_SESSION[email] = $r[email];
        $_SESSION[username] = $r[canteenname];
        echo "true";
        if ($conn->query($sql) == true) {
          $host  = $_SERVER['HTTP_HOST'];
          $uri = "/html/canteenhomepage.php";
          $index_url = "http://" . $host . $uri;
          header("Location: $index_url");
        }
        $conn->close();
      } else {
        if ($result->num_rows == 0) {
          echo "Invalid username or password";
        }
      }
    } else if ($c == 'student') {
      $sql = "select * from student where (email='$e' or username='$e') and password='$p';";

      $result = $conn->query($sql);
      $r = $result->fetch_assoc();

      if ($result->num_rows == 1) {
        $_SESSION[id] = $r[id];
        $_SESSION[name] = $r[name];
        $_SESSION[email] = $r[email];
        $_SESSION[username] = $r[username];
        echo "true";
        if ($conn->query($sql) == true) {
          /* $_SESSION[msg_signup]="Signup Succesful"; */
          $host  = $_SERVER['HTTP_HOST'];
          $uri = "/html/userhomepage.php";
          $index_url = "http://" . $host . $uri;
          header("Location: $index_url");
        }
        $conn->close();
      } else {
        if ($result->num_rows == 0) {
          echo "false";

        }
      }
    } else {
      echo "Error: Classification not found";
    }
  } else {
    echo "Error: Invalid username or password";
  }
}
