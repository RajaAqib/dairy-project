<?php 
include 'session_maintain_manager.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Manager</title>
<link rel="stylesheet" type="text/css" href="css/dash.css">
<link rel="stylesheet" href="css\manager_dash.css">
</head>

<body>
<div class="bodywrap">
<img src="source/black-background2.jpg" alt="no image"  width="1343" height="888">
<div class="header"><p>Manager Desk</p>

</div>
<div class="sidebar">
<ul>
  <li><a href="Manager_dash.php">Dashboard</a></li>
  <li><a href="Manager_add_shop.php">Add Shop</a></li>
  <li><a href="Manager_upload_sweet.php">Upload Product</a></li>
  <li><a href="Manager_stock.php">Inventory Stock</a></li>
  <li><a href="Manager_sale_info.php">Orders</a></li>

</ul> 
</div>

<div class="graph">

<dl style="width: 90%">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sweet";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$qty;
$sweetname;
$soldqty=1;
$sql="select Sweetname,sum(Qty) as tqty from stock_record group by Sweetname";
 $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) { 
          $sweetname=$row['Sweetname'];
          $qty=$row['tqty'];

          $sql2="select sum(sold_qty) as sqty from shop_sales where Sweetname='$sweetname'";
            $result2 = $conn->query($sql2);
            $numrow=mysqli_num_rows($result2);
        if($numrow>0){
        while($row1 = $result2->fetch_assoc()) {
            
              $soldqty=$row1['sqty'];
              
            
               }
            }
            else {
                        $soldqty=1;
                      }          $percent=($soldqty/$qty)*100;

        echo
        "<dt>$sweetname</dt>
        <dd><div id='data-one' class='bar' style='width: $percent%'>$percent%</div></dd>";
}


?>
</dl><hr>
<center><h2>Monthly Report</h3></center>
</div>
<div class="shop_list">
<center><h3>Shop List</h3></center>
<table width="468">
<tr><th width="89">Shop_ID</th><th width="109">Shop Name</th><th width="140">Contact Person</th><th width="110">Phone1</th></tr>
 <?php $sql = "SELECT * from shop";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) { 
        echo "<tr>";
        echo "<td>".$row['Shop_Id']."</td>";
        echo "<td>".$row['Shop_name']."</td>";
   
        echo "<td>".$row['Contact_Person']."</td>";
        echo "<td>".$row['Phone1']."</td>";
     
        echo "</tr>";
      }$conn->close();
     ?>
</table>

</div>
<div class="Testimonials2">
<center><h3>FEEDBACK</h3>
<table>
<tr><th width="125">Shop-ID</th><th width="442">Feedback</th></tr>
  <?php
        $servername = "localhost";
$username = "root";
$password = "";
$dbname = "sweet";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM Feedback ";
$result = $conn->query($sql);
  while($row = $result->fetch_assoc()) {
             echo "<tr>";
             echo "<td>";
             echo $row['Shop_id'];
             echo "</td>";
             echo "<td>";
             echo $row['comment'];
             echo "</td>";
             echo "</tr>";
             

            }

  ?>
</table></center>

</div>
<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn"><img src="bg_icon\avatar.png" alt="no image" id="user_photo" height="30px" width="30px"> <?php echo $_SESSION['name'];?></button>

  <div id="myDropdown" class="dropdown-content">
    <a href="reset_password.php">Change Password</a>
    <a href="logout.php">Log Out</a>
    <a href="#help">Help</a></div>
</div>
    
  <script>

function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

</div>
</body>
</html>
