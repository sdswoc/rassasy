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
    <link rel="stylesheet" href="../css/userhomepage.css">

</head>

<body>

    <div class="body">
        <div class="sidebar">
            <div class="header">Rassasy<br></div>
            <a href="userhomepage.php">Ongoing Orders</a>
            <a href="ordernow.php">Order Now</a>
            <a href="pastorder.php">Past Orders</a>
            <a href="userprofile.php">Profile</a>
            <a href="../php/logout.php">Logout</a>
        </div>
        <div class="orders">
            <div class="content">Past orders are displayed here.</div>
            <table class="pastorders">
                <tr class="past-orders-heading">
                    <th> Canteen Name</th>
                    <th> Item Name</th>
                    <th> Count</th>
                    <th> Price</th>
                    <th> Total</th>
                    <th> Order ID</th>
                    <th> Status</th>
                </tr>
                <tbody>
                    <?php
                    include('../php/conn.php');
                    $studentid = $_SESSION['id'];
                    $sql = "select * from canteen; ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($r = $result->fetch_assoc()) {
                            $canteenname = $r['canteenname'];
                            $findorder = "select * from order_$canteenname where student_id = '$studentid'; ";
                            $result2 = $conn->query($findorder);
                            if ($result2->num_rows > 0) {
                                while ($r2 = $result2->fetch_assoc()) {
                                    echo " <tr class='table_entry'>
                                <td class='table_data'>$canteenname</td>
                                <td class='table_data'>$r2[itemname]</td>
                                <td class='table_data'>$r2[count]</td>
                                <td class='table_data'>$r2[price]</td>
                                <td class='table_data'>$r2[total]</td>
                                <td class='table_data'>$r2[orderid]</td>
                                <td class='table_data'>$r2[status]</td>
                                </tr> ";
                                }
                            }
                        }
                    } else
                        echo " No orders Found";
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>