<?php
session_start();
if (!(isset($_SESSION['username'])))
{
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
                <div class="header">Rassasy<br></div><u>
                <?php
                session_start();
                echo "Hey, ".$_SESSION[username];
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
                Your Order :
                <br><br>
                <table class="canteenmenu">
                    <tr>
                        <th> Item No</th>
                        <th> Item Name</th>
                        <th> Price</th>
                        <th> Quantity </th>
                    </tr>
                    <tr>
                        <td> 01</td>
                        <td> Coffee</td>
                        <td> 15</td>
                        <td>1</td>
                    </tr>
                </table>
                <br>
                Total Sum:15
                <br> <br>
                <a href="userhomepage.php">
                    <button class="paynow">Pay Now</button></a>
            </div>
        </div>
    </div>

</body>

</html>