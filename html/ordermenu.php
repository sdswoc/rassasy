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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

    <body>

    <div class="body">
        <div class="sidebar">
            <div class="header">Rassasy<br></div><u>
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
            <div class="content">
                <table class="canteenmenu">
                    <tr class="canteen-menu-heading">
                        <th> Item No</th>
                        <th> Item Name</th>
                        <th> Price</th>
                        <th> Rating</th>
                        <th>Order</th>
                    </tr>
                    <?php
                    include("../php/conn.php");
                    include_once("../php/feedback.php");
                    $canteenname = $_GET['canteenname'];
                    $_SESSION['canteenname']=$canteenname;
                    $sql = "select * from menu_$canteenname where availability = '1';";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($r = $result->fetch_assoc()) {
                            echo "<tr class='table_entry'>
                              <td class='table_data' id='itemid'>$r[id]</td>
                              <td class='table_data' id='itemname'>$r[itemname]</td>
                              <td class='table_data' id='price'>$r[price]</td>
                              <td class='table_data' id='rating'>$r[rating]</td>
                             <td class='table-data'>
                              <a href='#' data-no='$r[id]' data-name='$r[itemname]' data-price='$r[price]' class='add-to-cart btn btn-primary'>Add to cart</a>
                              </td>
                            </tr> ";
                        }
                    }
                    ?>
                </table>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="show-cart table">

                            </table>
                            <div>Total price: <span class="total-cart"></span></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer">
                <div class="column">
                    <div class="total-price">Total Sum: <span class="total-cart"></span></div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cart">Cart (<span class="total-count"></span>)</button>
                    <button type="button" class="btn btn-primary" id="order-now">Order now</button>
                    <button class="clear-cart btn btn-danger">Clear Cart</button>
                </div>
            </div>

        </div>
    </div>
    <script type="text/javascript" src="../JS/addtocart.js"> </script>

</body>

</html>