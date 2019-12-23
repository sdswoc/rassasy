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
            <table class="canteenmenu">
                    <tr class="canteen-menu-heading">
                        <th> Item No</th>
                        <th> Item Name</th>
                        <th> Price</th>
                        <th>Order</th>
                    </tr>
                <?php
                
                $canteenname = $_POST['canteenname'];
                $sql = "select *from menu_$canteenname where availablity = 1;";
                $result=$conn->query($sql);
                        if($result->num_rows>0){

                            while($r=$result->fetch_assoc()){

               echo "<tr class='table_entry'>
               <td class='table_data' id='itemid'>$r[id]</td>
               <td class='table_data'>$r[itemno]</td>
               <td class='table_data'>$r[itemname]</td>
               <td><input type='button' id='addtocart' /></td>
               </tr> "; }
                
               ?>

                    
    </div>
    </div>
    </div>
    <div class="footer">
        <div>Total Sum: </div>
        <div><a href="ordersummary.php">
        <button class="viewcart">View Cart</button></a></div>
    </div> 
    <script>
    $("#addtocart").click(function(event) {
            var itemid = $("#itemid").val();
            
            $.ajax({
                type: "post",
                url: "../php/updatedb.php",
                data: {
                    'itemid' : id 
                },
                success: function(response) {
                    if (response==true) {
                        alert("updated");
                    } else {
                        alert("Connection Error");
                    }
                }
            });
        });
    </script>

</body>

</html>