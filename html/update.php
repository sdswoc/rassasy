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
    <script type="text/javascript" src="../JS/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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
        <div class="update"> Update the availabilty of food items in your menu:
            <div class="menu">
                <div id="menutablediv">

                    <table id="menutable" border="1">
                        <thead>
                            <tr>
                                <td>S. No.</td>
                                <td>Item No</td>
                                <td>Item Name</td>
                                <td>Availabilty</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('../php/conn.php');
                            $canteenname = $_SESSION['username'];
                            $tablename = "menu_$canteenname";

                            $sql = "select * from $tablename ; ";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($r = $result->fetch_assoc()) {
                                    if ($r['availability'] == 1) {
                                        $active = "active";
                                        $checked = true;
                                    } else {
                                        $active = "";
                                        $checked = "";
                                    }
                                    echo "
                                <tr>
                                <td>$r[id]</td>
                                <td>$r[itemno]</td>
                                <td>$r[itemname]</td>   
                                <td>                               
                                <div class='togglebutton $active'>
                                <input type='checkbox' class='updatebutton' id='updatebutton' defaultChecked=$checked data-id='$r[id]' >
                                <span class='sliderround'></span>
                                </div> </td> ";
                                }
                            } else
                                echo "No entries in menu";

                            $conn->close();

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.updatebutton').click(function(event) {
            var status;
            var itemid = $(this).data('id');
            var mainParent = $(this).parent('.togglebutton');
            if ($(mainParent).find('input.updatebutton').is(':checked')) {
                status = 1;
                $(mainParent).addClass('active');
            } else {
                status = 0;
                $(mainParent).removeClass('active');
            }

            $.ajax({
                type: "post",
                url: "../php/updatedb.php",
                data: {
                    'status': status,
                    'itemid': itemid
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