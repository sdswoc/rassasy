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
            <div class="header">Rassasy<br></div>
            <u>
                <?php
                session_start();
                echo "Hey, " . $_SESSION['username'];
                ?> </u>
            <hr>
            <a href="userhomepage.php">Ongoing Orders</a>
            <a href="ordernow.php">Order Now</a>
            <a href="pastorder.php">Past Orders</a>
            <a href="userprofile.php">Profile</a>
            <a href="../php/logout.php">Logout</a>
        </div>
        <div class="orders">
            <div class="content"> Ongoing orders are displayed here:
            <?php
            include('../php/conn.php');
            $studentid=$_SESSION['id'];
            $sql = "select * from canteen where status = '1'; ";
                $result=$conn->query($sql);
                    if($result->num_rows>0){
                                while($r=$result->fetch_assoc()){
                                    $canteenname = $r['canteenname'];
                                    $findorder = "select * from order_$canteenname where student_id = '$studentid'; "; 
                                echo " <tr class='table_entry'>
                                <td class='table_data' id='canteenid'>$r[id]</td>
                                <td class='table_data' id='canteenname'>$r[canteenname]</td>
                                <td class='table_data'>$r[location]</td>
                                <td><a href='ordermenu.php?canteenname=$r[canteenname]' />Order</td>
                                </tr> "; } 
                            }
                            else 
                            echo " No Canteen Found";

            
            ?>

            </div>
        </div>
    </div>
</body>

</html>