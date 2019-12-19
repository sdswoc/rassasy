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
                <?php
                session_start();
                echo "Hey, ".$_SESSION[username];
                ?> </u>
                <hr>
            <a href="userhomepage.php">Ongoing Orders</a>
            <a href="ordernow.php">Order Now</a>
            <a href="pastorder.php">Past Orders</a>
            <a href="userprofile.php">Profile</a>
            <a href="userprofile.php">Profile</a>
        </div>
        <div class="orders">
            <div class="content">
                `Canteen Name`'s menu :
                <table class="canteenmenu">
                    <tr class="canteen-menu-heading">
                        <th> Item No</th>
                        <th> Item Name</th>
                        <th> Price</th>
                        <th>Order</th>
                    </tr>
                    <tr class="canteen-menu-row">
                        <td> 01</td>
                        <td> Coffee</td>
                        <td> 15</td>
                        <td><button class="addtocart">Add</button></td>
                    </tr>
                </table>
            </div> </div>
    </div>
    <div class="footer">
        <div>Total Sum: </div>
        <div><a href="ordersummary.php">
        <button class="viewcart">View Cart</button></a></div>
    </div>
</body>

</html>