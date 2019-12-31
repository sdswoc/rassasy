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
        <div class="orders">
            <div class="switch">Are you ready to open the shop?

                <?php
                include('../php/conn.php');
                $canteenid = $_SESSION['id'];
                $sql = "select status from canteen where id = '$canteenid'; ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $r = $result->fetch_assoc();
                    if ($r['status'] == 1) {
                        $active = "active";
                        $checked = true;
                    } else {
                        $active = "";
                        $checked = "";
                    }
                    echo " <div class='togglebutton $active'>
                        <input type='checkbox' class='togglebtn' id='togglebtn' defaultChecked=$checked >
                        <span class='sliderround'></span>
                    </div> ";
                }
                ?>
            </div>
            <div class="ongoingorders">
                <?php
                include('../php/conn.php');
                $canteenname = $_SESSION['username'];
                $sql = "select * from order_$canteenname where status = 0 ; ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "
                    <table id='ordertable' border='1'>
                    <thead>
                        <tr>
                            <td>Order ID</td>
                            <td>Item No</td>
                            <td>Item Name</td>
                            <td>Quantity</td>
                            <td>Price</td>
                            <td>Total</td>
                            <td>Student Name</td>
                            <td>Student Mobile</td>
                            <td>Status</td>
                            <td>Update Status</td>
                        </tr>
                    </thead>
                    <tbody>
                    ";
                    while ($r = $result->fetch_assoc()) {
                        echo " <tr class='table_entry'>
                                <td class='table_data'>$r[orderid]</td>
                                <td class='table_data'>$r[itemno]</td>
                                <td class='table_data'>$r[itemname]</td>
                                <td class='table_data'>$r[count]</td>
                                <td class='table_data'>$r[price]</td>
                                <td class='table_data'>$r[total]</td>
                                <td class='table_data'>$r[student_name]</td>
                                <td class='table_data'>$r[student_mobile]</td>
                                <td class='table_data'>$r[status]</td>
                                <td class='table_data'><div class='togglebutton'>
                                <input type='checkbox' class='updateorderstatus' data-id='$r[id]'>
                                <span class='sliderround'></span></div></td>
                                </tr> ";
                                $last_order_id= $r['orderid'];
                    }
                    echo "</tbody>
            </table> ";
                } else
                    echo " No pending orders";
                $conn->close();
                ?>
            </div>
        </div>
    </div>
    <script>
        $('.togglebtn').click(function(event) {
            var status;
            var mainParent = $(this).parent('.togglebutton');
            if ($(mainParent).find('input.togglebtn').is(':checked')) {
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

        $('.updateorderstatus').click(function(event) {
            var status;
            var orderupdateid = $(this).data('id');
            var mainParent = $(this).parent('.togglebutton');
            if ($(mainParent).find('input.updateorderstatus').is(':checked')) {
                status = 1;
                $(mainParent).addClass('active');
            } else {
                status = 0;
                $(mainParent).removeClass('active');
            }

            $.ajax({
                type: "post",
                url: "../php/updateorderstatus.php",
                data: {
                    'status': status,
                    'orderupdateid': orderupdateid
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

        function ongoingOrders(last_order_id = '<?php echo $last_order_id; ?>') {
            setTimeout(function() {
                var lastorderid;
                $.ajax({
                    type: "post",
                    url: "../php/pendingorderfetch.php",
                    data: {
                        last_order_id
                    },
                    success: function(data) {
                        if (data != false) {
                            let resultData = JSON.parse(data);
                            for (let key in resultData) {
                                if ( resultData[key].orderid != last_order_id)
                                {
                                    $('#ordertable tr:last').after("<tr class='table_entry'><td class='table_data'>" + resultData[key].orderid + "</td><td class='table_data'>" + resultData[key].itemno + "</td><td class='table_data'>" + resultData[key].itemname + "</td><td class='table_data'>" + resultData[key].count + "</td><td class='table_data'>" + resultData[key].price + "</td><td class='table_data'>" + resultData[key].total + "</td><td class='table_data'>" + resultData[key].student_name + "</td><td class='table_data'>" + resultData[key].student_mobile + "</td><td class='table_data'>" + resultData[key].status + "</td><td class='table_data'><div class='togglebutton'><input type='checkbox' class='updateorderstatus' data-id='" + resultData[key].id + "'><span class='sliderround'></span></div></td></tr>")
                                }
                                lastorderid = resultData[key].orderid;
                            }
                            ongoingOrders(lastorderid);

                        } else {
                            ongoingOrders(lastorderid);
                        }
                    }
                })
            }, 5000)
        }
        $(window).on('load', function(e) {
            ongoingOrders();
        })
    </script>
</body>

</html>