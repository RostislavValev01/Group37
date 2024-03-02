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
<title>Homepage - Health Point</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" type="text/css" href="HealthPoint.css">

</head>
<style>
  .content {
    text-align: center;
}

.slideshow-container {
    max-width: 800px; /* Adjust the maximum width as needed */
    margin: 0 auto; /* Center the slideshow horizontally */
}

.slider {
    max-height: auto;
    max-width: 100%;
    overflow: hidden;
}

.slider img {
    width: auto;
    height: 100%;
    object-fit: contain;
}

.content {
    text-align: center;
}

.slideshow-container {
    max-width: 800px; /* Adjust the maximum width as needed */
    margin: 0 auto; /* Center the slideshow horizontally */
}

.slider {
    max-height: auto;
    max-width: 100%;
    overflow: hidden;
}

.slider img {
    width: auto;
    height: 100%;
    object-fit: contain;
}

.content {
    text-align: center;
}

.slideshow-container {
    max-width: 800px; /* Adjust the maximum width as needed */
    margin: 0 auto; /* Center the slideshow horizontally */
}

.slider {
    max-height: auto;
    max-width: 100%;
    overflow: hidden;
}

.slider img {
    width: auto;
    height: 100%;
    object-fit: contain;
}

/* Center everything under the slideshow */
.content section {
    text-align: center;
    margin: auto; /* Adjust the margin as needed */
    max-width: 800px; /* Adjust the maximum width as needed */
}



    </style>
</style>
<body class="">
<nav class="banner">
<a href="homePage.php"><img src="hplogo3.png" class="logo" alt="Company Logo"></a>
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
<section>
  <!-- Slideshow container -->
<div class="slideshow-container">

<!-- Full-width images with number and caption text -->
<div class="slider fade">

  <img src="productImages/6.jpg" style="width:30%">
  <div class="text">Caption Text</div>
</div>

<div class="slider fade">
 
  <img src="productImages/2.jpg" style="width:20%">
  <div class="text">Caption Two</div>
</div>

<div class="slider fade">

  <img src="productImages/1.jpg" style="width:20%">
  <div class="text">Caption Three</div>
</div>


</div>
<br>


</section>
<section class="home mt-3">
<div class="row">
  <div class="col-2" style="width:20%">
</div>
<div class="col-10" style="width:80%">
 <h1>Our Highlighted Products</h1>

</div>
</div>


</section>
<section class="product-category mt-3">
<div class="row">
  <div style="width:100%"> <h1>Category</h1>
</div></div>

<br>
<div class="row">
  <div style="width:20%">
    <div class="card" >
  <img src="productImages/1.jpg" class="card-img-top" alt="Product"style="max-width:300px">
  <div class="card-body">
    <h3 class="card-title">Product title</h5>
    <p class="card-text">Product Description.</p>
    <a href="#" class="btn btn-dark">Product Url</a>
  </div>
</div>
</div>
<div style="width:20%">
    <div class="card" >
  <img src="productImages/6.jpg" class="card-img-top" alt="Product"style="max-width:300px">
  <div class="card-body">
  <h3 class="card-title">Product title</h5>
    <p class="card-text">Product Description.</p>
    <a href="#" class="btn btn-dark">Product Url</a>
  </div>
</div>
</div>
<div style="width:20%">
    <div class="card" >
  <img src="productImages/11.jpg" class="card-img-top" alt="Product"style="max-width:300px">
  <div class="card-body">
  <h3 class="card-title">Product title</h5>
    <p class="card-text">Product Description.</p>
    <a href="#" class="btn btn-dark">Product Url</a>
  </div>
</div>
</div>
<div style="width:20%">
    <div class="card" >
  <img src="productImages/16.jpg" class="card-img-top" alt="Product"style="max-width:300px">
  <div class="card-body">
    <h5 class="card-title">Product title</h5>
    <p class="card-text">Product Description.</p>
    <a href="#" class="btn btn-dark">Product Url</a>
  </div>
</div>
</div>
<div style="width:20%">
    <div class="card" >
  <img src="productImages/21.jpg" class="card-img-top" alt="Product"style="max-width:300px">
  <div class="card-body">
  <h3 class="card-title">Product title</h5>
    <p class="card-text">Product Description.</p>
    <a href="#" class="btn btn-dark">Product Url</a>
  </div>
</div>
</div>

</div>

</section>
</div>
<footer class="footer">
  <div class="footer-section">
    <div>
   <img src="hplogo3.png" class="logo" alt="Company Logo"></a>
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
<script defer src="slider.js"></script>

</body>
</html>

