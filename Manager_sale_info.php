<?php 
$suc="";
$err="";
$succ="";
$errr="";
  if ($_GET['success']) {
      $suc=$_GET['success'];
  }
  elseif ($_GET['error']) {
    $err=$_GET['error'];
  }
  elseif ($_GET['er']) {
    $errr=$_GET['er'];
  }
  elseif($_GET['su'])
  {

    $succ=$_GET['su'];
  }
 ?>

<?php 
include 'session_maintain_manager.php';
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Manager Sale Informaton</title>
<link rel="stylesheet" type="text/css" href="css/dash.css">
<link rel="stylesheet" type="text/css" href="css/manager_order.css">

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
<center><h3>New Orders</h3></center>
<div class="order">
<p style="color:red"><?php echo $errr;  echo $succ; echo $suc;?></p> 

<form method="POST" action="Manager_sale_info.php">
    <select name="status_select" width:50px;>
  <option value=''>Select</option>
  <option value='New'>New</option>
  <option value='Approved'>Approved</option>
  <option value='Completed'>Completed</option>
  <option value='Out For Delivery'>Out For Delivery</option>
  <option value='Canceled'>Cancelled</option>
  <input type="Submit" name="filter" value="Filter" class="button1">
    </select>

  </form>	

	<center><table width="536" class="dif">
 		<tr><th height="33">Order Id</th><th>Sweet Name</th><th>Requested Quantity</th><th>
    	 Approved</th><th>Shop_ID</th><th>Date</th><th></th></tr>
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
    if (isset($_POST['filter'])) {
         $term=$_POST['status_select'];
           if ($term=='New') {

 $sql = "SELECT s.order_id,s.sweetname,s.req_qty,s.Approved_qty,s.date,d.Shop_ID FROM order_summary s,order_detail d where s.order_id=d.Order_id and s.Status='New'";
    $result = $conn->query($sql);
    $status='Approved';
    while($row = $result->fetch_assoc()) { 
        echo "<tr>";
        echo "<td>".$row['order_id']."</td>";
        echo "<td>".$row['sweetname']."</td>";
        echo "<td>".$row['req_qty']."</td>";
        echo "<td>".$row['Approved_qty']."</td>";
        echo "<td>".$row['Shop_ID']."</td>";
        echo "<td>".$row['date']."</td>";
        echo "<td><a href='approve.php?id=$row[order_id]&status=$status'>Approve</a></td>";
        echo "</tr>";
      }
 }
 elseif ($term=='Completed') {
 $sql = "SELECT s.order_id,s.sweetname,s.req_qty,s.Approved_qty,s.date,d.Shop_ID FROM order_summary s,order_detail d where s.order_id=d.Order_id and s.Status='Completed'";
    $result = $conn->query($sql);
    $status='Approved';
    while($row = $result->fetch_assoc()) { 
        echo "<tr>";
        echo "<td>".$row['order_id']."</td>";
        echo "<td>".$row['sweetname']."</td>";
        echo "<td>".$row['req_qty']."</td>";
        echo "<td>".$row['Approved_qty']."</td>";
        echo "<td>".$row['Shop_ID']."</td>";
        echo "<td>".$row['date']."</td>";
        
        echo "</tr>";}
 }
elseif ($term=='Approved') {
$sql = "SELECT s.order_id,s.sweetname,s.req_qty,s.Approved_qty,s.date,d.Shop_ID FROM order_summary s,order_detail d where s.order_id=d.Order_id and s.Status='Approved'";
    $result = $conn->query($sql);
    
    while($row = $result->fetch_assoc()) { 
        echo "<tr>";
        echo "<td>".$row['order_id']."</td>";
        echo "<td>".$row['sweetname']."</td>";
        echo "<td>".$row['req_qty']."</td>";
        echo "<td>".$row['Approved_qty']."</td>";
        echo "<td>".$row['Shop_ID']."</td>";
        echo "<td>".$row['date']."</td>";
        
        echo "</tr>";}
  }
 elseif ($term=='Canceled') {
 $sql = "SELECT s.order_id,s.sweetname,s.req_qty,s.Approved_qty,s.date,d.Shop_ID FROM order_summary s,order_detail d where s.order_id=d.Order_id and s.Status='Canceled'";
    $result = $conn->query($sql);
    $status='Approved';
    while($row = $result->fetch_assoc()) { 
        echo "<tr>";
        echo "<td>".$row['order_id']."</td>";
        echo "<td>".$row['sweetname']."</td>";
        echo "<td>".$row['req_qty']."</td>";
        echo "<td>".$row['Approved_qty']."</td>";
        echo "<td>".$row['Shop_ID']."</td>";
        echo "<td>".$row['date']."</td>";
        
        echo "</tr>";}
 }
 else if ($term=='Out For Delivery') {
  $sql = "SELECT s.order_id,s.sweetname,s.req_qty,s.Approved_qty,s.date,d.Shop_ID FROM order_summary s,order_detail d where s.order_id=d.Order_id and s.Status='Out For Delivery'";
    $result = $conn->query($sql);
    $status='Approved';
    while($row = $result->fetch_assoc()) { 
        echo "<tr>";
        echo "<td>".$row['order_id']."</td>";
        echo "<td>".$row['sweetname']."</td>";
        echo "<td>".$row['req_qty']."</td>";
        echo "<td>".$row['Approved_qty']."</td>";
        echo "<td>".$row['Shop_ID']."</td>";
        echo "<td>".$row['date']."</td>";
        
        echo "</tr>";}
 }
}
    else
    {
         $sql = "SELECT s.order_id,s.sweetname,s.req_qty,s.Approved_qty,s.date,d.Shop_ID FROM order_summary s,order_detail d where s.order_id=d.Order_id and s.Status='New'";
    $result = $conn->query($sql);
    $status='Approved';
    while($row = $result->fetch_assoc()) { 
        echo "<tr>";
        echo "<td>".$row['order_id']."</td>";
        echo "<td>".$row['sweetname']."</td>";
        echo "<td>".$row['req_qty']."</td>";
        echo "<td>".$row['Approved_qty']."</td>";
        echo "<td>".$row['Shop_ID']."</td>";
        echo "<td>".$row['date']."</td>";
        echo "<td><a href='approve.php?id=$row[order_id]&status=$status'>Approve</a></td>";
        echo "</tr>";
      }
    }

    $conn->close();
     ?>
       </table></center>
       
       </div>
       <div class="qtyapp">
       <p>Quantity Approval</p>
       
       <form action="upqty.php" method="POST"><select name="order">
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
$sql = "SELECT order_id FROM order_summary where Status='New'";
$result = $conn->query($sql);
  while($row = $result->fetch_assoc()) {
             echo ' <option value="'.$row['order_id'].'">'.$row['order_id'].'</option>';
            }

         
     ?>
         
       </select>
 		   <input type="text" placeholder="Quantity" name="qty">
       <button class="button1" type="Submit">Update</button><br><p><?php echo $err; ?></p></form>
 	</div>	
</div>
<div class="content2">
<center><h3>Sales Report</h3></center>
   <form method="POST" action="Manager_sale_info.php">
      <table>    <tr><td>
      <select name="shops_id">
      <option value="1"> Shop ID</option>
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
          $sql="select DISTINCT shop_id from shop_sales";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()) { 
           echo ' <option value="'.$row['shop_id'].'">'.$row['shop_id'].'</option>';
            
          }

      ?>
      
    
      </select></td><td>
      <select name="sweetnam">
        <option value="2">Sweet Name </option>
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
      <td><button class="button1" name="filter2">Filter</button></td></tr>
      </table>
</form>
<table class="dif"> <tr><th>Shop_ID</th><th>Sweet Name</th><th>Sold Qty</th><th>Price</th><th>Date</th></tr>
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
    if (isset($_POST['filter2'])) {
      $term=$_POST['shops_id'];
      $term2=$_POST['sweetnam'];
      if ($term2==2 && $term!=1) {
          $sql="select * from shop_sales where shop_id='$term'";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()) { 
             echo "<tr>";
             echo "<td>".$row['shop_id']."</td>";
             echo "<td>".$row['sweetname']."</td>";
             echo "<td>".$row['sold_qty']."</td>";
             echo "<td>".$row['Price']."</td>";
             echo "<td>".$row['Date']."</td>";
             echo "</tr>";
           }
      }
      elseif ($term==1 && $term2!=2) {
         $sql="select * from shop_sales where sweetname='$term2'";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()) { 
             echo "<tr>";
             echo "<td>".$row['shop_id']."</td>";
             echo "<td>".$row['sweetname']."</td>";
             echo "<td>".$row['sold_qty']."</td>";
             echo "<td>".$row['Price']."</td>";
             echo "<td>".$row['Date']."</td>";
             echo "</tr>";
           }
      }
      elseif ($term==1 && $term2==2) {
        $sql="select * from shop_sales";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()) { 
             echo "<tr>";
             echo "<td>".$row['shop_id']."</td>";
             echo "<td>".$row['sweetname']."</td>";
             echo "<td>".$row['sold_qty']."</td>";
             echo "<td>".$row['Price']."</td>";
             echo "<td>".$row['Date']."</td>";
             echo "</tr>";
        }
      }
      else {
        //header("Location:unauthorized.php");
         $sql="select * from shop_sales where sweetname='$term2' and shop_id='$term'";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()) { 
             echo "<tr>";
             echo "<td>".$row['shop_id']."</td>";
             echo "<td>".$row['sweetname']."</td>";
             echo "<td>".$row['sold_qty']."</td>";
             echo "<td>".$row['Price']."</td>";
             echo "<td>".$row['Date']."</td>";
             echo "</tr>";
           }
        
      }
         
    }
    else {
         $sql="select * from shop_sales";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()) { 
             echo "<tr>";
             echo "<td>".$row['shop_id']."</td>";
             echo "<td>".$row['sweetname']."</td>";
             echo "<td>".$row['sold_qty']."</td>";
             echo "<td>".$row['Price']."</td>";
             echo "<td>".$row['Date']."</td>";
             echo "</tr>";
           }
    }
      ?>
       

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
