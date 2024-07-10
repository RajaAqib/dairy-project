<?php 
include 'session_maintain_admin.php';
$msg="";
if (isset($_POST['submitfeed'])) {
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
$date=date('Y-m-d');
$sqldel="delete from stock_in_factory where exp_date<'$date'";
$sqlret="delete from shop_return where Reason='expired'";
if ($conn->query($sqldel)===TRUE) {
    if ($conn->query($sqlret)===TRUE) {
      $msg="All expred are disposed";
    }
    else
    {
      $msg="Sqlret error";
    }
}
else{
  $msg="Some error";
}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin</title>
<link rel="stylesheet" href="css\dash.css">
<link rel="stylesheet" href="css\admin_dash.css">
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

<div class="graph">

<dl style="width: 80%">
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
          echo "<tr color:white;>";
            echo "<td>";
            echo $row['Sweetname'];
            echo "</td>";
            echo "<td>";
            echo $row['tqty'];
            echo "</td>";
            echo "<td>";
          

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
        <dd><div id='data-one' class='bar' style='width:$percent%'>$percent%</div></dd>";
}


?>
</dl><hr>
<center><h2>Monthly Report</h2></center>

</div>
<div class="sweet_list">
<center><h3>Sweet List</h3></center>
<div class="table">
  <center><table width="425" border=0>
  <tr><th width="97" height="31">Sweet Name</th><th width="66">Quantity</th><th width="124">Quality</th></tr>
  <?php
  $sql="select * from stock_in_factory";
  $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) { 
            $exp=$row['exp_date'];
            $text="";
            $date=date('Y-m-d');
            if ($exp<$date) {
                $text="Expired";
            }
            else
            {
                $text="Good";

            }
            echo "<tr>";
            echo "<td>";
            echo $row['Sweetname'];
            echo "</td>";
            echo "<td>";
            echo $row['Available_qty'];
            echo "</td>";
            echo "<td>";
            echo $text;
            echo "</td>";
            echo "</tr>";
        }


  ?>
  </table></center>
</div>
<div class="button">
<form action="Admin_dash.php" method="post"><button class="button1" name="submitfeed">Dispose</button><?php echo $msg;?></form></div></div>
<div class="Testimonials">
<center><h3>FEEDBACK</h3></center>
<table width="684">
<tr><th width="102">Shop-ID</th><th width="570">Feedback</th></tr>
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
