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
                    <th> Submit</th>
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
                                    echo " <tr class='table_entry'>
                                <td class='table_data'>$canteenname</td>
                                <td class='table_data'>$r2[itemname]</td>
                                <td class='table_data'>$r2[count]</td>
                                <td class='table_data'>$r2[price]</td>
                                <td class='table_data'>$r2[total]</td>
                                <td class='table_data'>$r2[orderid]</td>
                                <td class='table_data'><div class='star-rating'>
                                <input type='radio' id='5-stars' name='rating' value='5' />
                                <label for='5-stars' class='star'>&#9733;</label>
                                <input type='radio' id='4-stars' name='rating' value='4' />
                                <label for='4-stars' class='star'>&#9733;</label>
                                <input type='radio' id='3-stars' name='rating' value='3' />
                                <label for='3-stars' class='star'>&#9733;</label>
                                <input type='radio' id='2-stars' name='rating' value='2' />
                                <label for='2-stars' class='star'>&#9733;</label>
                                <input type='radio' id='1-star' name='rating' value='1' />
                                <label for='1-star' class='star'>&#9733;</label>
                                </div> </td>
                                <td class='table_data'><input type='button' value='Submit' id='submitbutton' data-id='$r2[id]' data-name='$canteenname' /></td>                              
                                </tr> ";
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
    <script>
        $("#submitbutton").click(function(event) {
          var rating = $('input[name=rating]:checked').val();
          var trackingid = $(this).data('id'); 
          var canteenname = $(this).data('name'); 
          $.ajax({
              type: "post",
              url: "../php/addfeedback.php",
              data: {
                  'rating': rating,
                  'trackingid': trackingid,
                  'canteenname': canteenname

              },
              success: function(response) {
                    if (response == true) {
                        alert("Feedback added!");
                        //$('form input[type="button"]').prop("disabled", true);
                        //this.disabled = true;
                        //$("#submitbutton").attr("disabled", true);
                    } else {
                        alert("Connection Error");
                    }
              }
          })
        });
    </script>
</body>

</html>