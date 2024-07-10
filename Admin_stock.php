<?php
include 'session_maintain_admin.php'
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin</title>
<link rel="stylesheet" href="css\dash.css">
<link rel="stylesheet" href="css\admin_stock.css">
</head>

<body>
<div class="bodywrap">
<img src="source/black-background2.jpg" alt="no image"  width="1343" height="888">
<div class="header"><p>Warehouse Admin</p>

</div>
<div class="sidebar">
<ul>
  <li><a href="Admin_dash.php">Dashboard</a></li>
  <li><a href="Admin_add_stock.php">Add Stock</a></li>
  <li><a href="Admin_stock.php">Stock Details</a></li>
  <li><a href="Admin_return_allocation.php">Sweets Return Details</a></li>
  <li><a href="Admin_order.php">Orders</a></li>
</ul> 
</div>

<div class="content1">
<h2><center>Factory Stock</center></h2>
<table>
	<tr><th height="42">Sweet Name</th><th>Base Material</th>
	<th>Available Qty</th><th>Ingredients</th>
	<th>Man Date</th><th>Exp Date</th>
	</tr>
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
         $sql = "SELECT * FROM stock_in_factory";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) { 
        echo "<tr>";
        echo "<td>".$row['Sweetname']."</td>";
        echo "<td>".$row['Base_material']."</td>";
        echo "<td>".$row['Available_qty']."</td>";
        echo "<td>".$row['Ingredients']."</td>";
        echo "<td>".$row['Man_date']."</td>";
        echo "<td>".$row['exp_date']."</td>";
        echo "</tr>";
      }
      


      ?>
</table>
</div>
<div class="content2">
<h2><center>Sweet For Sale</center></h2>
<center><table width="384" height="40">
	<tr>
		<th width="138" height="34">Sweet Name</th><th width="108">Quantity</th><th width="113">Price</th>
	</tr>
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
         $sql = "SELECT * FROM sweer_for_sale";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) { 
        echo "<tr>";
        echo "<td>".$row['Sweetname']."</td>";
        echo "<td>".$row['Qty']."</td>";
        echo "<td>".$row['Price']."</td>";
        echo "</tr>";
      }
      


      ?>
</table></center>


</div>
<div class="content3">
<h2><center>Report</center></h2>
  <form method="post" action="Admin_stock.php">
      <input type="date" name="st_date">
      <input type="date" name="end_date">
      <button class="button1" type="Submit" name="Filter">Filter</button>
  </form>
<?php
$start="";
$end="";
  if (isset($_POST['Filter'])) {
      $start=$_POST['st_date'];
      $end=$_POST['end_date'];

  }

?> 
<span> <?php echo $start ?> To <?php echo $end; ?></span> 
<center><table width="454">
  <tr><th>Sweetname</th><th>Total Quantity</th></tr>
  <?php
      if (isset($_POST['Filter'])) {
          $sql="select Sweetname,sum(Qty) as qty from stock_record where date BETWEEN('$start')AND('$end') group by Sweetname";
          $result=$conn->query($sql);
          while ($row=$result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>";
              echo $row['Sweetname'];
              echo "</td>";
              echo "<td>";
              echo $row['qty'];
              echo "</td>";
              echo "</tr>";
          }

      }


  ?>
</table></center>
</div>
<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn"><img src="bg_icon\avatar.png" alt="no image" id="user_photo" height="30px" width="30px">Anshu</button>

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
