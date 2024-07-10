<?php 
include 'session_maintain.php';
$msg="";
if (isset($_GET['submitfeed'])) {
  $feed=$_GET['feedback'];
 
  $servername = "localhost";
$username = "root";
$password = "";
$dbname = "sweet";
$shop_id=$_SESSION['id'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
  $sql= "INSERT INTO `feedback`(`Shop_id`, `comment`) VALUES ('$shop_id','$feed')";
  if ($conn->query($sql) === TRUE) {
      $msg="Feedback Submitted";
  }

  else {
    $msg= "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Shop Owner</title>
<link rel="stylesheet" href="css\dash.css">
<link rel="stylesheet" href="css\shop_dash.css">
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

<div class="offers">
	<video width="500" height="300" controls autoplay>
  <source src="video1.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>
</div>
<div class="feedback">
<form method="get" action="Shops_dash.php">
<textarea name="feedback" rows="15" cols="60" style="font-family:Times New Roman;color:#003399; font-size: 15px" placeholder="FEEDBACK....!FEEDBACK....!FEEDBACK....!">
</textarea>
<button class="button1" name="submitfeed">Submit</button>
<?php
echo $msg;
?>
</form>
</div>

<div class="dropdown">
<button onclick="myFunction()" class="dropbtn"><img src="bg_icon\avatar.png" id="user_photo" height="30px" width="30px"> <?php echo $_SESSION["name"]; ?> </button>

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
