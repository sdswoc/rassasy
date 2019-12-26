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
    <script type="text/javascript" src="../JS/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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
                $sql = "select *from menu_$canteenname where availablity = '1';";
                $result=$conn->query($sql);
                        if($result->num_rows>0){

                            while($r=$result->fetch_assoc()){

               echo "<tr class='table_entry'>
               <td class='table_data' id='itemid'>$r[id]</td>
               <td class='table_data' id='itemno'>$r[itemno]</td>
               <td class='table_data' id='itemname'>$r[itemname]</td>
               <td><input type='button' id='addtocart' onclick='addtocart(this)' /></td>
               </tr> " ; }                
               ?>
                  
    </div>
    </div>
    </div>
    <div class="footer">
        <div>Total Sum: </div>
        <div class="sum" id="sum"></div>
        <div>
        <button class="viewcart">View Cart</button></div>
    </div> 
    <script>
        var sum = 0;
        var i = 0 ;

        function addtocart(event) {
            sum = sum + r[price];
        $("#sum").html(sum);
        
            var itemno;
            var itemname;
            var addtocartdata = [];
                i++;
                var data_row = {
                    'itemno': $("#itemno").val(),
                    'itemname':  $("#itemname").val()
                }
                addtocartdata.push(data_row);
        
        }

    $("#viewcart").click(function(event) {

        /*              
            $.ajax({
                type: "post",
                url: "../php/orderdb.php",
                data: {
                    addtocartdata[],
                    'size': i,
                    'total': sum
                },
                success: function(response) {
                    if (response==true) {
                        alert("Added to Cart!");
                    } else {
                        alert("Connection Error");
                    }
                }
            });
        });  */

        
    </script>

</body>

</html>