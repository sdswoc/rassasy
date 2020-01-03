<?php
session_start();
if (!(isset($_SESSION['username']))) {
  header("Location: ../html/login.html");
}
?>

<html>

<head>
  <title>
    Rassasy
  </title>
  <link rel="stylesheet" href="../css/userhomepage.css" />
  <script type="text/javascript" src="../JS/jquery-3.4.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
  <div class="user-container">
    <div class="body">
      <div class="sidebar">
        <div class="header">Rassasy<br /></div><u>
          <?php
          session_start();
          echo "Hey, " . $_SESSION['username'];
          ?> </u>
        <hr>
        <a href="userhomepage.php">Ongoing Orders</a>
        <a href="ordernow.php">Order Now</a>
        <a href="pastorder.php">Past Orders</a>
        <a href="userprofile.php">Profile</a>
        <a href="../php/logout.php">Logout</a>
      </div>
      <div class="orders">
        <div class="content">
          <?php
          include("../php/conn.php");
          $studentid = $_SESSION['id'];
          $r = $conn->query("select * from student where username='$_SESSION[username]'");
          $r = $r->fetch_assoc();
          ?>
          <form class="form">
            <label class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="text" disabled="true" class="form-control-plaintext" id="name" name="name" value="<?php echo $r[name]; ?>">
            </div>
            <label class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" disabled="true" class="form-control-plaintext" id="username" name="username" value="<?php echo $r[username]; ?>">
            </div>
            <label class="col-sm-2 col-form-label">Enrollment Number</label>
            <div class="col-sm-10">
              <input type="text" disabled="true" class="form-control-plaintext" id="enroll" name="enroll" value="<?php echo $r[enroll]; ?>">
            </div>
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" disabled="true" class="form-control-plaintext" id="email" name="email" value="<?php echo $r[email]; ?>">
            </div>
            <label class="col-sm-2 col-form-label">Mobile Number</label>
            <div class="col-sm-10">
              <input type="text" disabled="true" class="form-control-plaintext" id="mobile" name="mobile" value="<?php echo $r[mobile]; ?>">
            </div>
            <label class="col-sm-2 col-form-label">Bhawan</label>
            <div class="col-sm-10">
              <select class="bhawan" id="bhawan" disabled="true" name="bhawan">
                <option <?php if (strcmp($r[bhawan], "Azad") == 0) echo "selected"; ?> value="Azad">Azad Bhawan</option>
                <option <?php if (strcmp($r[bhawan], "Cautley") == 0) echo "selected"; ?> value="Cautley">Cautley Bhawan</option>
                <option <?php if (strcmp($r[bhawan], "Ganga") == 0) echo "selected"; ?> value="Ganga">Ganga Bhawan</option>
                <option <?php if (strcmp($r[bhawan], "Govind") == 0) echo "selected"; ?> value="Govind">Govind Bhawan</option>
                <option <?php if (strcmp($r[bhawan], "Indira") == 0) echo "selected"; ?> value="Indira">Indira Bhawan</option>
                <option <?php if (strcmp($r[bhawan], "Jawahar") == 0) echo "selected"; ?> value="Jawahar">Jawahar Bhawan</option>
                <option <?php if (strcmp($r[bhawan], "Kasturba") == 0) echo "selected"; ?> value="Kasturba">Kasturba Bhawan</option>
                <option <?php if (strcmp($r[bhawan], "Radhakrishnan") == 0) echo "selected"; ?> value="Radhakrishnan">Radhakrishnan Bhawan</option>
                <option <?php if (strcmp($r[bhawan], "Rajendra") == 0) echo "selected"; ?> value="Rajendra">Rajendra Bhawan</option>
                <option <?php if (strcmp($r[bhawan], "Rajiv") == 0) echo "selected"; ?> value="Rajiv">Rajiv Bhawan</option>
                <option <?php if (strcmp($r[bhawan], "Ravindra") == 0) echo "selected"; ?> value="Ravindra">Ravindra Bhawan</option>
                <option <?php if (strcmp($r[bhawan], "Sarojini") == 0) echo "selected"; ?> value="Sarojini">Sarojini Bhawan</option>
              </select>
            </div>
            <label class="col-sm-2 col-form-label">Room</label>
            <div class="col-sm-10">
              <input type="text" disabled="true" class="form-control-plaintext" id="room" name="room" value="<?php echo $r[room]; ?>">
            </div>
            <div><input type="button" value="Submit Changes" id="submitbutton" /></div>
          </form>
          <button class="editprofile" id="editprofile">Edit Profile</button>
          <button class="deleteaccount" id="deleteaccount">Delete Account</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    $("#editprofile").click(function(event) {
      event.preventDefault();
      var editprofile = confirm("Are You Sure?");
      if (editprofile) {
        $("input").removeAttr("disabled");
        $("select").removeAttr("disabled");
        $("#submit").removeAttr("hidden", "hidden");
      }
    });

    $("#enroll").blur(function(event) {
      var input = "enroll";
      var inputvalue = $("#enroll").val();
      var tablename = "student";

      $.ajax({
        type: "post",
        url: "../php/check.php",
        data: {
          input: input,
          inputvalue: inputvalue,
          tablename: tablename
        },
        dataType: "json",
        success: function(response) {
          if (!response) {
            $("#enroll_result").html("Enrollment Number Already Exists");
            event.preventDefault();
            alert("Enrollment Number Already Exists");
          } else {
            $("#enroll_result").empty();
          }
        }
      });
    });
    $("#username").blur(function(event) {
      var input = "username";
      var inputvalue = $("#username").val();
      let tablename = "student";

      $.ajax({
        type: "post",
        url: "../php/check.php",
        data: {
          input: input,
          inputvalue: inputvalue,
          tablename: tablename
        },
        dataType: "json",
        success: function(response) {
          if (!response) {
            $("#username_result").html("Username Already Exists");
            event.preventDefault();
            alert("username Already Exists");
          } else {
            $("#username_result").empty();
          }
        }
      });
    });

    $("#email").blur(function(event) {
      var input = "email";
      var inputvalue = $("#email").val();
      var tablename = "student";

      $.ajax({
        type: "post",
        url: "../php/check.php",
        data: {
          input: input,
          inputvalue: inputvalue,
          tablename: tablename
        },
        dataType: "json",
        success: function(response) {
          if (!response) {
            $("#email_result").html("Email Already Exists");
            event.preventDefault();
            alert("Email Already Exists");
          } else {
            $("#email_result").empty();
          }
        }
      });
    });

    $("#submitbutton").on("click", function() {
      var email = $("#email").val();
      var bhawan = $("#bhawan").val();
      var room = $("#room").val();
      var mobile = $("#mobile").val();
      var name = $("#name").val();
      var username = $("#username").val();
      var enroll = $("#enroll").val();

      var password = prompt("Please enter your password", "");

      // proceed with form submission
      $.ajax({
        url: "/php/edituserprofile.php",
        type: "post",
        data: {
          email: email,
          password: password,
          bhawan: bhawan,
          room: room,
          mobile: mobile,
          enroll: enroll,
          name: name,
          username: username
        },
        success: function(response) {
          if (response == true) {
            alert("Updated");
          } else
            alert("Error");
        }
      });
    });

    $("#deleteaccount").click(function() {
      var editprofile = confirm("Are You Sure?");
      if (editprofile) {
        $.ajax({
          url: "/php/deleteaccount.php",
          type: "get",
          success: function(response) {
            if (response == true) {
              alert("Account Deleted");
              window.location.replace("/html/login.html");
            } else alert(response);
          }
        });
      }
    });
  </script>

</body>

</html>