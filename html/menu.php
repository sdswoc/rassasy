<html>

<head>
    <title>
        Rassasy
    </title>
    <link rel="stylesheet" href="../css/canteenhomepage.css">
    <script type="text/javascript" src="../JS/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body></body>
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
        <div class="menu"> <div id="menutablediv">
    
    <table id="menutable" border="1">
        <thead>
            <tr>
                <td>S. No.</td>
                <td>Item No</td>
                <td>Item Name</td>
                <td>Price</td>
                <td>Delete</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><input size=25 type="text" id="itemno"/></td>
                <td><input size=25 type="text" id="itemname" /></td>
                <td><input size=25 type="text" id="price" /></td>
                <td><input type="button" id="delbutton" value="Delete" onclick="deleteRow(this)"/></td>
            </tr>
        </tbody>
    </table></div>
    <input type="button" id="addrow" value="Add More Items" onclick="insRow()"/> <br/>
    <input type="button" id="addtomenu" value="Add to menu"/><br/><br/>
    </div>
 </div>
 <script>
     var save=1;
     var table = document.getElementById('menutable'),
    tbody = table.getElementsByTagName('tbody')[0],
    clone = tbody.rows[0].cloneNode(true);

function deleteRow(el) {
    var i = el.parentNode.parentNode.rowIndex;
    table.deleteRow(i);
    while (table.rows[i]) {
        updateRow(table.rows[i], i, false);
        i++;
    }
}

function insRow() {
    if(save==0) {
        alert ("Add previous item to menu first");
    }
    else {
    var new_row = updateRow(clone.cloneNode(true), ++tbody.rows.length, true);
    tbody.appendChild(new_row);
    save = '0'; }
}

function updateRow(row, i, reset) {
    row.cells[0].innerHTML = i;

    var inp1 = row.cells[1].getElementsByTagName('input')[0];
    var inp2 = row.cells[2].getElementsByTagName('input')[0];
    var inp3 = row.cells[3].getElementsByTagName('input')[0];
    inp1.id = 'itemno' + i;
    inp2.id = 'itemname' + i;
    inp3.id = 'price' +1;

    if (reset) {
        inp1.value = inp2.value = inp3.value = '';
    }
    return row;
}

$("#inp1.id").keyup(function(event) {
    $("#inp1.id").val(inp1.value);
});
$("#inp2.id").keyup(function(event) {
    $("#inp2.id").val(inp2.value) ;
});
$("#inp3.id").keyup(function(event) {
    $("#inp3.id").val(inp3.value) ;
});

$("#addtomenu").click(function(event) {
        var itemno = $("#inp1.id").val();
        var itemname = $("#inp2.id").val();
        var price = $("#inp3.id").val();

        $.ajax({
          type: "post",
          url: "../php/addtomenu.php",
          data: { 
            'itemno': itemno,
            'itemname': itemname,
            'price' : price,
            },
            success: function(response) {
                if(response) {
              alert("Saved to Menu");
              save = '1';
              $("#inp1.id").val('');
              inp1.value = inp2.value = inp3.value = ''; }
              else {
                  alert("Connection Error");
              }
            }
          });
      });

 </script>  
</body>

</html>