<?php
//include connection config
include('connectdb.php');
// session start
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<head>
<title>Contact Us - Health Point</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/contact.css">

</head>
<style>
</style>
<body class="">
<nav class="banner">
<a href="index.php"><img src="hplogo3.png" class="logo" alt="Company Logo"></a>
<form action="productPage.php" method="get">
  <input type="text" name="search" class="search-bar"
    value="<?= isset($search) && $search !== '' ? htmlspecialchars($search) : '' ?>" placeholder="Search products...">
  <input type="submit" value="Go" class="search-bar-go">
</form>
    <?php
    if (isset($_SESSION['loggedin'])) {
      if (isset($_SESSION['AdminStatus']) && $_SESSION['AdminStatus'] == 1) {
        ?>
        <nav class="header">
          <button><a href="AdminAccounts.php">Account</a></button>
          <button><a href="Cart.php">Basket</a></button>
          <button><a href="Contact.php">Contact Us</a></button>
          <button><a href="logout.php">Logout</a></button>
        </nav>
        <?php
      } else if (isset($_SESSION['AdminStatus']) && $_SESSION['AdminStatus'] == 0) {
        ?>
          <nav class="header">
            <button><a href="CustomerAccounts.php">Account</a></button>
            <button><a href="Cart.php">Basket</a></button>
            <button><a href="Contact.php">Contact Us</a></button>
            <button><a href="logout.php">Logout</a></button>
          </nav>
        <?php
      }
    } else {
      ?>
      <nav class="header">
        <button><a href="signInPageCustomer.php">Sign In</a></button>
        <button><a href="Cart.php">Basket</a></button>
        <button><a href="Contact.php">Contact Us</a></button>
      </nav>
      <?php
    }
    ?>
  </nav>

  <nav class="header-nav">
    <ul class="navigation-bar">
      <li><a href="Index.php">Home</a></li>
      <li><a href="AboutUs.php">About Us</a></li>
      <nav class=Products>
        <a href="productPage.php"><button class="dropbtn">Products</button></a>
        <nav class="products-content">
          <a href="productPage.php?Product_Category=General">General Medication</a>
          <a href="productPage.php?Product_Category=SkinCare">SkinCare</a>
          <a href="productPage.php?Product_Category=Haircare">HairCare</a>
          <a href="productPage.php?Product_Category=DentalCare">DentalCare</a>
          <a href="productPage.php?Product_Category=Vitamins_Supplements">Vitamins and Supplements</a>
        </nav>
      </nav>
    </ul>
  </nav>
  <div class="content">
<section class="contact mt-3">
  <div class="container-fluid ">
    <div class="row ">
      <div style="width:25%;"></div>
      <div class="col-12 col-md-8 " style="width:50%">
      <h2 class="text-center" >Contact Us By Email</h2>
<hr>
          <h3 style="color: darkred" ><?= isset($_GET["msg"])?$_GET["msg"]:""?></h3>
        <form method="post" class="contact"  action="contactcode.php">
          <div class="form-group">
            <label class="control-label">First name:</label>
            <input type="text" id="fname" name="fname" placeholder="Write your first name here" class="form-control">


          </div>
          <div class="form-group">
            <label class="control-label">last name:</label>
            <input type="text" id="lname" name="lname" placeholder="Write your last name here" class="form-control">


          </div>
      <!--    <div class="form-group">
            <label class="control-label">Contact No:</label>
            <input type="tel" id="contact" name="contact" placeholder="Write your contact no" class="form-control">
            
          </div>-->
          <div class="form-group">
            <label class="control-label">Email:</label>
            <input type="email" id="email" name="email" placeholder="abc@xyz.com" class="form-control">


          </div>
          <div class="form-group">
            <label class="control-label">Comments:</label>
            <textarea type="text" id="remarks" name="remarks"  placeholder="" class="form-control"></textarea>



          </div>
          <div class="d-grid gap-2">
          <input type="submit" value="Submit" class="mt-3 btn btn-dark "></div></form>
        </form>
      </div>
      <div style="width:25%;"></div>

    </div>
  </div>    



</section>
</div>
<footer class="footer">
  <div class="footer-section">
    <div>
      <a href="index.php"><img src="hplogo3.png" class="logo" alt="Company Logo"></a>
    </div>
    <div>
      <p>© 2023 HealthPoint. All rights reserved.

        The content, design, and images on this website are the property of HealthPoint and are protected by
        international copyright laws. Unauthorized use or reproduction of any materials without the express written
        consent of HealthPoint is strictly prohibited. HealthPoint and the HealthPoint logo are trademarks of
        HealthPoint.

        For inquiries regarding the use or reproduction of any content on this website, please contact us at
        HealthPoint@pharmacy.com</p>

    </div>
  </div>
</footer>
</body>
<script src="slider.js"/>
</html>


