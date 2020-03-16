<?php
session_start();
if (!(isset($_SESSION['username']))) {
    header('Location: ../html/login.html');
}
?>

<html>

<head>
    <title>
        Rassasy
    </title>
    <link rel='stylesheet' href='../css/userhomepage.css'>
    <script type="text/javascript" src="../JS/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body>

    <div class='body'>
        <div class='sidebar'>
            <div class='header'>Rassasy<br></div>
            <?php
            session_start();
            echo "Hey, " . $_SESSION['username'];
            ?> </u>
            <hr />
            <a href='userhomepage.php'>Ongoing Orders</a>
            <a href='ordernow.php'>Order Now</a>
            <a href='pastorder.php'>Past Orders</a>
            <a href='userprofile.php'>Profile</a>
            <a href='../php/logout.php'>Logout</a>
        </div>
        <div class='orders'>
            <div class='content'>Past orders are displayed here.</div>
            <table class='pastorders'>
                <tr class='past-orders-heading'>
                    <th> Canteen Name</th>
                    <th> Item Name</th>
                    <th> Count</th>
                    <th> Price</th>
                    <th> Total</th>
                    <th> Order ID</th>
                    <th> Feedback</th>
                </tr>
                <tbody>
                    <?php
                    include('../php/conn.php');
                    $studentid = $_SESSION['id'];
                    $sql = 'select * from canteen; ';
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($r = $result->fetch_assoc()) {
                            $canteenname = $r['canteenname'];
                            $findorder = "select * from order_$canteenname where student_id = '$studentid' and status=1 ; ";
                            $result2 = $conn->query($findorder);
                            if ($result2->num_rows > 0) {
                                while ($r2 = $result2->fetch_assoc()) {
                                    $feedback = "select * from feedback_$canteenname where trackingid = '$r2[id]' ;";
                                    $result3 = $conn->query($feedback);
                                    if ($result3->num_rows > 0) {
                                        $r3 = $result3->fetch_assoc();
                                        echo " <tr class='table_entry' id='$r2[id]'>
                                <td class='table_data'>$canteenname</td>
                                <td class='table_data'>$r2[itemname]</td>
                                <td class='table_data'>$r2[count]</td>
                                <td class='table_data'>$r2[price]</td>
                                <td class='table_data'>$r2[total]</td>
                                <td class='table_data'>$r2[orderid]</td>
                                <td class='table_data'><div class='rating'>
                                Rating (out of 5) : <div>$r3[rating]</div>
                                </div> </td>
                                </tr> ";
                                    } else {
                                        echo " <tr class='table_entry' id='$r2[id]'>
                                    <td class='table_data'>$canteenname</td>
                                    <td class='table_data'>$r2[itemname]</td>
                                    <td class='table_data'>$r2[count]</td>
                                    <td class='table_data'>$r2[price]</td>
                                    <td class='table_data'>$r2[total]</td>
                                    <td class='table_data'>$r2[orderid]</td>
                                    <td class='table_data'><div class='rating'>
                                    <form  class='form' action='/php/addfeedback.php' method='post'>
                                    Rating (out of 5)<input type='number' name='rating' class='rating' min='1' max='5'>
                                    <input type='hidden' name='canteenname' value='$canteenname'>
                                    <input type='hidden' name='trackingid' value='$r2[id]'>
                                    <input type='submit' name='submit' value='Submit'>
                                    </div> </td>
                                    </form>
                                    </tr> ";
                                    }
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
