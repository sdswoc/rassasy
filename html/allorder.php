<html>

<head>
    <title>
        Rassasy
    </title>
    <link rel="stylesheet" href="../css/canteenhomepage.css">

</head>

<body>
<?php
if(!isset($_SESSION['username']))
{
    $host  = $_SERVER['HTTP_HOST'];
      $uri="/html/login.html";
      $index_url="http://".$host.$uri;
header( "Location: $index_url" );
}
?>
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
                <a href="login.html">Logout</a>
        </div>
        <div class="allorder"> All orders are displayed here.</div>
    </div>
</body>

</html>