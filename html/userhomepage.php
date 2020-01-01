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
    <link rel="stylesheet" href="../css/userhomepage.css">
    <script type="text/javascript" src="../JS/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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
            <div class="content"> Ongoing orders are displayed here: <br />
                <table class="ongoingorders">
                    <tr class="ongoing-orders-heading">
                        <th> Canteen Name</th>
                        <th> Item Name</th>
                        <th> Count</th>
                        <th> Price</th>
                        <th> Total</th>
                        <th> Order ID</th>
                        <th> Status</th>
                    </tr>
                    <tbody>

                        <?php
                        include('../php/conn.php');
                        $studentid = $_SESSION['id'];
                        $sql = "select * from canteen ; ";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($r = $result->fetch_assoc()) {
                                $canteenname = $r['canteenname'];
                                $findorder = "select * from order_$canteenname where student_id = '$studentid' and status = '0'; ";
                                $result2 = $conn->query($findorder);
                                if ($result2->num_rows > 0) {
                                    //$first_order_id=
                                    while ($r2 = $result2->fetch_assoc()) {
                                        echo " <tr class='table_entry' class='$r[id]'>
                                <td class='table_data' name='canteenname'>$canteenname</td>
                                <td class='table_data' name='itemname'>$r2[itemname]</td>
                                <td class='table_data'>$r2[count]</td>
                                <td class='table_data' name='price'>$r2[price]</td>
                                <td class='table_data'>$r2[total]</td>
                                <td class='table_data' name='orderid'>$r2[orderid]</td>
                                <td class='table_data' class='status'>$r2[status]</td>
                                </tr> ";
                                $last_order_id=$r['id'];
                                    }
                                }
                            }
                        } else
                            echo " No pending orders Found";
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
    window.onload(poll);
    (function poll(){
            var canteenname_list = $("input[name='canteenname']");
            var itemname_list = $("input[name='itemname']");
            var orderid_list = $("input[name='orderid']");
            var checkdata = [];
            for (let i = 0; i < itemno_list.length; i++) {
                var data_row = {
                    'canteenname': itemno_list[i].value,
                    'itemname': itemname_list[i].value,
                    'orderid': orderid_list[i].value,
                }
                checkdata.push(data_row);
        
   setTimeout(function(){
      $.ajax({ 
          url: "../php/studentorderfetch.php",
          data: checkdata,
          success: function(data) {
                        if (data != false) {
                            let resultData = JSON.parse(data);
                            last_order_id = '<?php echo $last_order_id; ?>';
                            first_order_id = '<?php echo $first_order_id; ?>';
                            for (let key in resultData) 
                                {
                                    for(let id=first_order_id; id<=last_order_id; id++)
                                    if(resultData[key].id==id)
                                    {
                                        (".id .status").html('');
                                        (".id .status").html('Prepared');
                                        alert(resultData[key].canteenname + resultData[key].orderid +resultData[key].itemname)  ;


                                    }                                     
                                    
                            }
                            poll();

                        } else {
                            poll();
                        }
                    }
                })
            }, 5000)
        } 
        });



    </script>
</body>

</html>