<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>About Us</title>

  <link href="css\contact_css.css" rel="stylesheet" type="text/css">
</head>

<body>
  <div class="header"><img src="bg_icon\head.jpg" alt="no image" width="100%" height="48"></div>

  <div id="navigation">
    <ul class="icon">
      <li><a title="Home" class="active" href="KDA Sweet Shop.php"><img src="bg_icon\home.png"></a></li>
      <li><a title="Corporate" href="Corporate.html"><img src="bg_icon\star.png"></a></li>
      <li><a title="Location" href="locations.html"><img src="bg_icon\placeholder.png"></a></li>
      <li><a title="Our Brand" href="our_brands.html"><img src="bg_icon\three-buildings.png"></a></li>
      <li><a title="contact Us" href="about.php"><img src="bg_icon\contacts.png"></a></li>
    </ul>
  </div>
  <div class="bodywrap"><span class="quote"><b> FIND MORE SWEETS OVER ON OUR SITE</b></span><img src="source/cherry_dessert.jpg" alt="no img" width="1295" height="1048"></div>
  <div class="a"><strong>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <h2>Contact Us</h2>
    </strong></div>
  <div class="c">
    <?php
    if (isset($_POST['fname'])) {
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $email = $_POST['email'];
      $mob = $_POST['mob'];
      $Message = $_POST['Message'];
      $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
      $txt = $fname . "\n" . $lname . "\n" . $email . "\n" . $mob . "\n" . $Message;
      fwrite($myfile, $txt);
    }
    ?>
    <form method="post" action="about.php">
      <table width="605">
        <tbody>
          <tr>
            <td width="323" height="30px"> <input type="text" placeholder="First Name" list="fname" name="fname" size="70px"></td>
          </tr>
          <tr>
            <td width="270" height="30px"><input type="text" placeholder="Last Name" list="lname" name="lname" size="70px"> </td>
          </tr>
          <tr>
            <td width="323" height="30px"><input type="email" placeholder="Email" list="fname" name="email" size="70px"></td>
          </tr>
          <tr>
            <td width="323" height="30px"><input type="text" placeholder="Mobile number" list="mob" name="mob" size="70px"></td>
          </tr>
          <tr>
            <td width="323" height="30px"><textarea rows="5" cols="70px" placeholder="Message" name="Message"></textarea></td>
          </tr>
          <tr>
            <td height="80px"><button type="submit" value="Submit" name="submit" onclick="fun()">Submit</button></td>
          </tr>

        </tbody>
      </table>
    </form>
  </div>
  <footer class="footer-wrap">
    <div class="foot-contain">
      <table width="964" cellspacing="5" cellpadding="5">
        <tbody>
          <tr>
            <td width="135"><img src="bg_icon\cupcake.png" alt=""></td>
            <td width="120"><img src="bg_icon\like.png" alt=""></td>
            <td width="149"><img src="bg_icon\block.png" alt=""></td>
            <td width="147"><img src="bg_icon\d-truck.png" alt=""></td>
          </tr>
          <tr>
            <td>300+</td>
            <td>100%</td>
            <td>500+</td>
            <td>30Ton</td>
          </tr>
          <tr>
            <td>Different Varities</td>
            <td>Hygenic</td>
            <td>Corporate Clients</td>
            <td>Production Everyday</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="support">
      <table width="371" cellspacing="7" cellpadding="7">
        <tbody>
          <tr>
            <td width="83" height="56">
              <h3>Social</h3>
            </td>
            <td width="76">
              <h3>Store Timings</h3>
            </td>
            <td width="140">
              <h3>Support</h3>
            </td>
          </tr>
          <tr>
            <td><img src="bg_icon\facebook.png" alt="">
              <img src="bg_icon\twitter.png" alt="">
              <img src="bg_icon\google.png" alt="">
            </td>
            <td>Everyday 9am to 9pm</td>
            <td>info@KDAsweets.net
              +91 80 2559 8915</td>
          </tr>
        </tbody>
      </table>
    </div>
  </footer>

</body>

</html>