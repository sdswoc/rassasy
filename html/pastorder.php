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
            <?php
            include('../php/conn.php');
            $studentid = $_SESSION['id'];
            $sql = "select * from canteen where verified = '1'; ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($r = $result->fetch_assoc()) {
                    $canteenname = $r['canteenname'];
                    $findorder = "select * from order_$canteenname where student_id = '$studentid'; ";
                    $result = $conn->query($findorder);
                    if ($result->num_rows > 0) {
                        while ($r = $result->fetch_assoc()) {
                            echo " <tr class='table_entry'>
                                <td class='table_data'>$canteenname</td>
                                <td class='table_data'>$r[itemname]</td>
                                <td class='table_data'>$r[count]</td>
                                <td class='table_data'>$r[price]</td>
                                <td class='table_data'>$r[total]</td>
                                <td class='table_data'>$r[orderid]</td>
                                <td class='table_data'>$r[status]</td>
                                </tr> ";
                        }
                    }
                }
            } else
                echo " No orders Found";


            ?>
        </div>
    </div>
</body>

</html>