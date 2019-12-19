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
                <?php
                session_start();
                echo "Hey, ".$_SESSION[username];
                ?> </u>
                <hr>
            
            <a href="userhomepage.php">Ongoing Orders</a>
            <a href="ordernow.php">Order Now</a>
            <a href="pastorder.php">Past Orders</a>
            <a href="userprofile.php">Profile</a>
        </div>
        <div class="orders">
            <div class="content"> A list of canteens open at that
            particular instant will be displayed here. For example:
            <ol class="canteenselection">
                <li>
                    <a href="ordermenu.php">XYZ Canteen</a>
                </li>
            </ol>
            </div>

        </div>
    </div>
</body>

</html>