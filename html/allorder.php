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
        <div class="allorder"> All orders are displayed here.</div>
        <?php
        include('../php/conn.php');
        $canteenname = $_SESSION['username'];
        $sql = "select * from order_$canteenname group by orderid; ";
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
                                </tr> ";
            }
        } 
        else {
            echo " No past orders"; }
            echo "</tbody>
            </table> " ;

            $conn->close();
        ?>
    </div>
</body>

</html>