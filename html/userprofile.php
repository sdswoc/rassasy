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
</head>

<body>

  <div class="user-container">
    <div class="body">
      <div class="sidebar">
        <div class="header">Rassasy<br /></div><u>
          <?php
          session_start();
          echo "Hey, " . $_SESSION[username];
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
          EDIT YOUR PROFILE:
          <br>
          <form method="POST" class="form">
            <div>Password: <input type="password" name="password" id="p"/></div>
            <div>Bhawan:
              <select class="bhawan" id="bhawan" required="required" name="bhawan">
                <option value="Azad">Azad Bhawan</option>
                <option value="Cautley">Cautley Bhawan</option>
                <option value="Ganga">Ganga Bhawan</option>
                <option value="Govind">Govind Bhawan</option>
                <option value="Indira">Indira Bhawan</option>
                <option value="Jawahar">Jawahar Bhawan</option>
                <option value="Kasturba">Kasturba Bhawan</option>
                <option value="Radhakrishnan">Radhakrishnan Bhawan</option>
                <option value="Rajendra">Rajendra Bhawan</option>
                <option value="Rajiv">Rajiv Bhawan</option>
                <option value="Ravindra">Ravindra Bhawan</option>
                <option value="Sarojini">Sarojini Bhawan</option>
              </select></div>
            <div>Room no: <input type="text" name="roomno" id="room"/></div>
            <div>Mobile: <input type="text" name="mobile" id="mobile" /></div>
            <div>Email Address: <input type="email" name="email" id="email" /></div>
            <div><br></div>
            <div><input type="button" value="Submit Changes" id="submitbutton" /></div>
          </form>
          <button class="deleteaccount">Delete Account</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    $("#submitbutton").on("click", function() {
      console.log("called");
      var email = $("#email").val();
      var password = $("#p").val();
      var bhawan = $("#bhawan").val();
      var room = $("#room").val();
      var mobile = $("#mobile").val();
        // proceed with form submission
        $.ajax({
          url: "/php/edituserprofile.php",
          type: "post",
          data: {
            email: email,
            password: password,
            bhawan: bhawan,
            room: room,
            mobile: mobile
          },
          success: function(response) {
            if (response == true) {
              alert("Updated");
            } 
            else alert("Error");
          }
        });
    });
  </script>

</body>

</html>