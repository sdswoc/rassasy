    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="../JS/jquery-2.1.1.min.js"></script>
    
    <script>
      
    $("#enroll").keyup(function(event) {
      var enrollinput = $("#enroll").val();

      $.ajax({
        type : "post",
        dataType="json",
        url: "../php/check_enroll_signup.php",
        data: { enroll: enrollinput },
        success: function(response) {
          if (response == "false") {
            $("#enroll_result").html("Enrollment Number Already Exists");
            event.preventDefault();
          } else if (response == "true") $("#enroll_result").empty();
        }
      });
    });

    $("#username").keyup(function(event) {
      var usernameinput = $("#username").val();

      $.ajax({
        type: "post",
        url: "../php/check_username_signup.php",
        data: { username: usernameinput },
        dataType: "json",
        success: function(response) {
          if (response == "false") {
            $("#username_result").html("Username Already Exists");
            event.preventDefault();
            alert("Username Already Exists");
          } else if (response == "true") $("#username_result").empty();
        }
      });
    });

    var check_password = 0;
    function pass_check() {
      var p = document.getElementById("p").value;
      var p2 = document.getElementById("p2").value;
      if (p2) {
        if (p != p2) {
          var msg = "Passwords don't match".fontcolor("red");
          document.getElementById("pass").innerHTML = msg;
          check_password = 0;
        } else {
          var msg = "Passwords match".fontcolor("green");
          document.getElementById("pass").innerHTML = msg;
          check_password = 1;
        }
      }
    }

    $("#email").keyup(function(event) {
      event.preventDefault();
      var emailinput = $("#email").val();
      var tablename="student";

      $.ajax({
        type: "post",
        url: "../php/check_email_signup.php",
        data: { email: emailinput, tablename: student },
        success: function(response) {
          if (response == "false") {
            $("#email_result").html("Email Already Exists");
          } else if (response == "true") $("#email_result").empty();
        }
      });
    });
  </script>