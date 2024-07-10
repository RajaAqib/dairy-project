<?php
include 'session_maintain_manager.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Manager Stock</title>
<link rel="stylesheet" type="text/css" href="css/dash.css">
<link rel="stylesheet" type="text/css" href="css/manager_stock.css">
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

<div class="content1">
<form>
  


</form>
<center><h3>Factory Stock</h3></center>
<table>
	<tr><th>Sweet Name</th><th>Base Material</th>
	<th>Available Qty</th><th>Ingredent</th>
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
<form action="Manager_stock.php" method="POST">
<center><h3>Sweet Returned</h3></center>
<center><table width="376" border="1px">    <tr><td width="109">
      <select name="shops_id">
      <option value="1">Shop ID </option>
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
          $sql="select DISTINCT shop_id from shop_return";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()) { 
           echo ' <option value="'.$row['shop_id'].'">'.$row['shop_id'].'</option>';
            
          }

      ?>
      
    
      </select></td><td width="121">
      <select name="sweetnam">
        <option value="2">Sweet Name</option>
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
          $sql="select DISTINCT sweetname from shop_sales";
          $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) { 
           echo ' <option value="'.$row['sweetname'].'">'.$row['sweetname'].'</option>';
            
          }?>
      </select></td>
      <td width="124"><button class="button1" name="filter2">Filter</button></td></tr>
      </table>
      </form>
<table width="422" height="40"></center>
	<tr>
		<th height="23">Shop_ID</th><th width="103">Sweet Name</th><th width="119">Returned Qty</th><th width="91">Date</th><th></th>
    <?php
                
if (isset($_POST['filter2'])) {
      $term=$_POST['shops_id'];
      $term2=$_POST['sweetnam'];
if ($term2==2 && $term!=1) {
          $sql="SELECT * FROM shop_return where shop_id='$term'";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()) { 
             echo "<tr>";
              echo "<td>".$row['shop_id']."</td>";
              echo "<td>".$row['sweetname']."</td>";
               echo "<td>".$row['return_qty']."</td>";
             echo "<td>".$row['Date']."</td>";
             echo "<td>".$row['Reason']."</td>";
               echo "</tr>";
           }
      }
      elseif ($term==1 && $term2!=2) {
         $sql="SELECT * FROM shop_return where sweetname='$term2'";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()) { 
             echo "<tr>";
              echo "<td>".$row['shop_id']."</td>";
              echo "<td>".$row['sweetname']."</td>";
               echo "<td>".$row['return_qty']."</td>";
             echo "<td>".$row['Date']."</td>";
             echo "<td>".$row['Reason']."</td>";
               echo "</tr>";
           }
      }
      elseif ($term==1 && $term2==1) {
        $sql="SELECT * FROM shop_return";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()) { 
             echo "<tr>";
              echo "<td>".$row['shop_id']."</td>";
              echo "<td>".$row['sweetname']."</td>";
               echo "<td>".$row['return_qty']."</td>";
             echo "<td>".$row['Date']."</td>";
             echo "<td>".$row['Reason']."</td>";
               echo "</tr>";
        }
      }
      else {
        //header("Location:unauthorized.php");
         $sql="SELECT * FROM shop_return where sweetname='$term2' and shop_id='$term'";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()) { 
             echo "<tr>";
              echo "<td>".$row['shop_id']."</td>";
              echo "<td>".$row['sweetname']."</td>";
               echo "<td>".$row['return_qty']."</td>";
             echo "<td>".$row['Date']."</td>";
             echo "<td>".$row['Reason']."</td>";
               echo "</tr>";
           }
        
      }
         
    }
    else {
         $sql = "SELECT * FROM shop_return";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) { 
        echo "<tr>";
        echo "<td>".$row['shop_id']."</td>";
        echo "<td>".$row['sweetname']."</td>";
        echo "<td>".$row['return_qty']."</td>";
        echo "<td>".$row['Date']."</td>";
        echo "<td>".$row['Reason']."</td>";
        echo "</tr>";
      }
    }
    $conn->close();
?>
	</tr>
</table>


</div>

<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn"><img src="bg_icon\avatar.png" alt="no image" id="user_photo" height="30px" width="30px"><?php echo $_SESSION['name'];?></button>

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
