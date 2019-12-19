<html>

<head>
    <title>
        Rassasy
    </title>
    <link rel="stylesheet" href="../css/userhomepage.css">

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
            <a href="userhomepage.php">Ongoing Orders</a>
            <a href="ordernow.php">Order Now</a>
            <a href="pastorder.php">Past Orders</a>
            <a href="userprofile.php">Profile</a>
        </div>
        <div class="orders"> 
            <div class="content">Past orders are displayed here.</div>
        </div>
    </div>
</body>

</html>