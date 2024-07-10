<?php
include 'session_maintain_admin.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Return and allocation</title>
<link rel="stylesheet" type="text/css" href="css/dash.css">
<link rel="stylesheet" type="text/css" href="css/manager_stock.css">
</head>

<body>
<div class="bodywrap">
<img src="source/black-background2.jpg" alt="no image"  width="1343" height="888">
<div class="header"><p>Warehouse Admin</p>

 
    
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
<h2><center>Allocated Sweet</center></h2>
<center>
<table width="373">
	<tr><th width="75" height="37">Order_id</th><th width="96">Shop_id</th><th width="116">Sweet Name</th>
	<th width="160">Approved Quantity</th>
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
         $sql = "SELECT os.order_id,od.Shop_id,os.sweetname,os.Approved_qty FROM order_summary os,order_detail od where os.order_id=od.Order_id and os.Status='Approved'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) { 
        echo "<tr>";
        echo "<td>".$row['order_id']."</td>";
        echo "<td>".$row['Shop_id']."</td>";
        echo "<td>".$row['sweetname']."</td>";
        echo "<td>".$row['Approved_qty']."</td>";
        echo "</tr>";
      }
      


      ?>
</table></center>
</div>

<div class="content2">
<h2><center>Sweet Returned</center></h2>
<center><table>
	<tr>
		
    <form action="Admin_return_allocation.php" method="POST">
<table>    <tr><td width="75" height="37">
      <select name="shops_id">
      <option value="1">Shop ID</option>
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
      
    
      </select></td><td>
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
      <td width="75" height="37"><button class="button1" name="filter2">Filter</button></td></tr>
      </table></center>
      </form>
<center><table class="table">
  <tr>
    <th width="75" height="37">Shop_ID</th><th width="75" height="37">Sweet Name</th><th width="75" height="37">Returned Qty</th><th width="75" height="37">Date</th><th width="75" height="37">Reason</th>
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
</table></center>


</div>

<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn"><img src="bg_icon\avatar.png" alt="no image" id="user_photo" height="30px" width="30px"><?php echo $_SESSION['name'];?></button>

  <div id="myDropdown" class="dropdown-content">
    <a href="reset_password.php">Change Password</a>
    <a href="logout.php">Log Out</a>
    <a href="#help">Help</a></div>
  </div>

</div>
</body>
</html>
