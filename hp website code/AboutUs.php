<?php
//include connection config
include('connectdb.php');
// session start
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="HealthPoint.css">
    <link rel="stylesheet" href="css/AboutUs.css">
    <title>About Us - HealthPoint</title>
    <style>
       

    </style>
</head>
<body>

<body>
<nav class="banner">
<a href="Index.php"><img src="hplogo3.png" class="logo" alt="Company Logo"></a>
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
    <?php
    require 'connectdb.php';

    ?>
    <div class="content">
    <h2>Welcome to HealthPoint</h2>
<div class="welcome-container">
    <p>
        Welcome to Health Point Pharmacy, your trusted destination for convenient and efficient healthcare solutions. Established in 2023, we take pride in being an emerging quick-to-go pharmacy dedicated to providing exceptional services and products tailored to meet your health and wellness needs. At Health Point Pharmacy, we understand the importance of accessible and timely healthcare, and our team is committed to ensuring that you have a seamless and personalized experience. From a carefully curated selection of pharmaceuticals to a knowledgeable and friendly staff, we strive to be more than just a pharmacy; we aim to be your health partner. Thank you for choosing Health Point Pharmacy, where your well-being is our priority.
    </p>
    <img src="productImages/About-Us-Image.jpg" alt="About Us Image" class="about-us-img" style="display: block; margin: auto; max-width: 100%;">
</div>
        <h3>Our Mission</h3>
        <p>
            At HealthPoint, we strive to empower individuals by delivering high-quality, affordable healthcare solutions. Our mission is to be a catalyst for positive change in the community, promoting wellness and providing comprehensive pharmaceutical services that exceed expectations.
        </p>

        <h3>Our History and Milestones</h3>
        <p>
            Since our inception in 2023, HealthPoint has achieved significant milestones in the healthcare landscape. From humble beginnings, we have grown into a renowned pharmacy known for our commitment to customer satisfaction and community well-being.
        </p>

        <h3>Meet Our Team</h3>
        <p>
            HealthPoint is proud to be led by a diverse and talented team of individuals who are passionate about healthcare. Our pharmacists, management, and support staff bring a wealth of experience and expertise to ensure that you receive the best possible care.
        </p>

        <h3>Facilities and Services</h3>
        <p>
            Our state-of-the-art facilities are designed to provide a seamless and comfortable experience for our valued customers. HealthPoint offers a comprehensive range of pharmaceutical services, including prescription dispensing, health consultations, and a carefully curated selection of wellness products.
        </p>

        <h3>Community Involvement</h3>
        <p>
            HealthPoint is deeply committed to giving back to the community we serve. Through various outreach programs, health awareness campaigns, and partnerships with local organizations, we aim to contribute to the well-being of our neighbors and foster a healthier community for all.
        </p>
    </div>

    <footer class="footer">
        <div class="footer-section">
            <div>
              <img src="hplogo3.png" class="logo" alt="Company Logo"></a>
            </div>
            <div>
              <p>© 2023 HealthPoint. All rights reserved.

                The content, design, and images on this website are the property of HealthPoint and are protected by international copyright laws. Unauthorized use or reproduction of any materials without the express written consent of HealthPoint is strictly prohibited. HealthPoint and the HealthPoint logo are trademarks of HealthPoint.
                
                For inquiries regarding the use or reproduction of any content on this website, please contact us at HealthPoint@pharmacy.com</p>
               
            </div>
        </div>
        
    </footer>


</body>
</html>




