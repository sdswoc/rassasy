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
    <link rel="stylesheet" href="../css/canteenhomepage.css">

</head>

<body>

    <div class="body">
        <div class="sidebar">
            <div class="header">Rassasy<br></div>
            <u>
                <?php
                session_start();
                echo "Hey, " . $_SESSION['username'];
                ?> </u>
            <hr>
            <a href="canteenhomepage.php">Pending Orders</a>
            <a href="allorder.php">All Orders</a>
            <a href="menu.php">Menu</a>
            <a href="update.php">Update</a>
            <a href="../php/logout.php">Logout</a>
        </div>
        <div class="orders">
            <div class="switch">Are you ready to open the shop?
                <label class="switch">
                    <input type="checkbox" class="switch">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <script>
        $("#switch").click(function(event) {
        if ($(mainParent).find('input.switch').is(':checked')) {
            status = 1;
            $(mainParent).addClass('active');
        } else {
            status = 0;
            $(mainParent).removeClass('active');
        }

        $.ajax({
            type: "post",
            url: "../php/canteenopen.php",
            data: {
                'status': status,
            },
            success: function(response) {
                if (response == true) {
                    alert("Updated");
                } else {
                    alert("Connection Error");
                }
            }
        });
        });
    </script>
</body>

</html>