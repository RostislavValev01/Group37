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
</style>
<body class="">
<nav class="banner">
    <a href="homePage.php"><img src="hplogo3.png" class="logo" alt="Company Logo"></a>
    <form action="/search" method="get">
      <input type="text" name="q" placeholder="Search...">
      <button type="submit">Go</button>
    </form>
    <nav class="header">
      <button><a href="accountPage.php">Account</a></button>
      <button><a href="basketPage.php">Basket</a></button>
      <button><a href="contactUsPage.php">Contact Us</a></button>
    </nav>
  </nav>

  <nav class="header-nav">
    <ul class="navigation-bar">
      <li><a href="homePage.php">Home</a></li>
      <li><a href="aboutUs.php">About Us</a></li>
      <nav class=Products>
        <a href="productPage.php"><button class="dropbtn">Products</button></a>
        <nav class="products-content">
          <a href="productPage.php?category=General">General Medication</a>
          <a href="productPage.php?category=Skin Care">SkinCare</a>
          <a href="productPage.php?category=Hair Care">HairCare</a>
          <a href="productPage.php?category=Dental Care">DentalCare</a>
          <a href="productPage.php?category=Vitamins_Supplements">Vitamins and Supplements</a>
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
  <div class="numbertext">1 / 3</div>
  <img src="slider.png" style="width:100%">
  <div class="text">Caption Text</div>
</div>

<div class="slider fade">
  <div class="numbertext">2 / 3</div>
  <img src="slider.png" style="width:100%">
  <div class="text">Caption Two</div>
</div>

<div class="slider fade">
  <div class="numbertext">3 / 3</div>
  <img src="slider.png" style="width:100%">
  <div class="text">Caption Three</div>
</div>


</div>
<br>


</section>
<section class="home mt-3">
<div class="row">
  <div class="col-2" style="width:20%"><img src="hplogo3.png" alt="LA" style="width:100%">
</div>
<div class="col-10" style="width:80%">
 <h1>Company Intro</h1>
 <p>This is a paragraph.</p>
 <p>This is another paragraph.</p>
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
  <img src="na.jpg" class="card-img-top" alt="Product">
  <div class="card-body">
    <h3 class="card-title">Product title</h5>
    <p class="card-text">Product Description.</p>
    <a href="#" class="btn btn-dark">Product Url</a>
  </div>
</div>
</div>
<div style="width:20%">
    <div class="card" >
  <img src="na.jpg" class="card-img-top" alt="Product">
  <div class="card-body">
  <h3 class="card-title">Product title</h5>
    <p class="card-text">Product Description.</p>
    <a href="#" class="btn btn-dark">Product Url</a>
  </div>
</div>
</div>
<div style="width:20%">
    <div class="card" >
  <img src="na.jpg" class="card-img-top" alt="Product">
  <div class="card-body">
  <h3 class="card-title">Product title</h5>
    <p class="card-text">Product Description.</p>
    <a href="#" class="btn btn-dark">Product Url</a>
  </div>
</div>
</div>
<div style="width:20%">
    <div class="card" >
  <img src="na.jpg" class="card-img-top" alt="Product">
  <div class="card-body">
    <h5 class="card-title">Product title</h5>
    <p class="card-text">Product Description.</p>
    <a href="#" class="btn btn-dark">Product Url</a>
  </div>
</div>
</div>
<div style="width:20%">
    <div class="card" >
  <img src="na.jpg" class="card-img-top" alt="Product">
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
      <a href="homePage.php"><img src="hplogo3.png" class="logo" alt="Company Logo"></a>
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

