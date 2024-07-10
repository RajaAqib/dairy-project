<?php
 include 'session_maintain.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Shop Stock</title>
<link rel="stylesheet" href="css\dash.css">
<link rel="stylesheet" href="css\shop_stock.css">
</head>

<body>
<div class="bodywrap">
<img src="source/black-background2.jpg" alt="no image"  width="1342" height="887">
<div class="header"><p>Shop Owner</p>

  

</div>
<div class="sidebar">
<ul>
  <li><a href="Shops_dash.php">Dashboard</a></li>
  <li><a href="Shops_request_order.php">Request Sweets</a></li>
  <li><a href="Shops _sweet_return.php">Return Sweets</a></li>
  <li><a href="Shops_stock.php">Sales</a></li>
</ul> 
</div>

<div class="content1">
<p>Update Sales</p>
<form action="shopowner_updatesales_insert.php" method="POST">
	<datalist id="sweet">
               <?php
              $succ="";
              $err="";
               if(isset($_GET['success']))
               {
                  $succ=$_GET['success'];
               }
             if(isset($_GET['error']))
               {
                  $err=$_GET['error'];
               }

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sweet";
$shop_id=$_SESSION["id"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT sweeet_name FROM shop_stock where  shop_id='$shop_id'";
$result = $conn->query($sql);
  while($row = $result->fetch_assoc()) {
             echo ' <option value="'.$row['sweeet_name'].'"</option>';
            }

         
     ?>

          </datalist>
          <p><?php echo $succ; ?></p>
		<table border="1">
			<tr><td><label>Sweet Name</label></td><td><input type="list" list="sweet" name="sweet_list" required></td></tr>
			<tr><td><label>Quantity</label></td><td><input type="text" name="Quantity" required></td></tr>
			<tr><td><label id="errormsg"><?php echo $err?></label></td><td><button class="button1">Submit</button></td></tr>
		</table>
    </form>
</div>
<div class="content2">
<center><p>Sales Figure</p>
	<table border="1">
		<tr><th width="99">Sweet Name</th><th width="92">Quantity</th><th width="63">Price</th><th width="66">Date</th></tr>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sweet";
        $shop_id=$_SESSION["id"];
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        } 
        $sql = "SELECT * FROM `shop_sales` where  shop_id='$shop_id'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) { 
          echo "<tr>";
          echo "<td>".$row['sweetname']."</td>";
          echo "<td>".$row['sold_qty']."</td>";
          echo "<td>".$row['Price']."</td>";
          echo "<td>".$row['Date']."</td>";
          echo "</tr>";
        }


    ?>
   
	</table></center>
</div>

<div class="dropdown">
<button onclick="myFunction()" class="dropbtn"><img src="bg_icon\avatar.png" id="user_photo" height="30px" width="30px"><?php echo $_SESSION["name"]; ?></button>

  <div id="myDropdown" class="dropdown-content">
    <a href="reset_password.php">Change Password</a>
    <a href="logout.php">Log Out</a>
    <a href="#help">Help</a></div>
    </div>
    
  <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
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
