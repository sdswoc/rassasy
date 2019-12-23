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
                <div class="header">Rassasy<br></div> <u>
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
            <div class="content"> A list of canteens open at that
            particular instant will be displayed here. For example:
            <table id="menutable" border="1">
                    <thead>
                        <tr>
                            <td>Canteen ID</td>
                            <td>Canteen Name</td>
                            <td>Location</td>
                            <td>""</td>
                        </tr>
                    </thead>
                    <tbody> 
            <?php
            include('conn.php');
            $sql = "select * from canteen where open='1'; ";
                $result=$conn->query($sql);
                    if($result->num_rows>0){

                            while($r=$result->fetch_assoc()){
                                echo " <tr class='table_entry'>
                                <td class='table_data' id='canteenid'>$r[id]</td>
                                <td class='table_data' id='canteenname'>$r[canteenname]</td>
                                <td class='table_data'>$r[location]</td>
                                <td><input type='button' id='canteenselectionbutton' /></td>
                                </tr> ";
            
            ?>
            </div>

        </div>
    </div>
    <script>
        $("#canteenselectionbutton").click(function(event) {
            var canteenname = $("#canteenname").val();
            
            $.ajax({
                type: "post",
                url: "../php/updatedb.php",
                data: {
                    'canteenname' : canteenname
                }
            });
        });


    </script>
</body>

</html>