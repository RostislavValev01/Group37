<?php
session_start();

require 'connectdb.php';
include 'search-function.php';

if (isset($_GET['search'])) {
  $searchQuery = $_GET['search'];
}
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

<head>
  <title>Products</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="HealthPoint.css">
  <link rel="stylesheet" type="text/css" href="productPage.css"> 
  <script defer src="productPage\.js"></script>
</head>

<body>
  <nav class="banner">
    <a href="Index.php"><img src="hplogo3.png" class="logo" alt="Company Logo"></a>
    <form action="" method="get">
      <input type="text" name="search" class="search-bar"
        value="<?= isset($search) && $search !== '' ? htmlspecialchars($search) : '' ?>" placeholder="Search products...">
        <input type="submit" value="Go" class="search-bar-go"></form>
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
    <form action="productPage.php" method="get">
      <input type="text" name="search" class="search-bar"
        value="<?= isset($search) && $search !== '' ? htmlspecialchars($search) : '' ?>" placeholder="Search...">
      <select name="sort">
        <option value="ProductName">Product Name</option>
        <option value="Price">Price</option>
        <option value="Product_Status">Availability</option>
        <option value="Product_Category">Product Category</option>
        <option value="Product_Description">Description</option>

      </select>

      <select name="order">
        <option value="asc">Ascending</option>
        <option value="desc">Descending</option>
      </select>
      <input type="submit" value="Search">
    </form>

    <h1 id="products-header">Our Products</h1><br>
    <div class="products-container">
      <?php foreach ($stock as $product): ?>
        <div class="product-box">
          <a href="indvProduct.php?id=<?php echo $product['ProductSKU']; ?>">
            <img src="productImages/<?php echo $product['ProductSKU']; ?>.jpg" alt="<?php echo $product['ProductName']; ?>"
              style="height:200px; max-width:300px;">
            <p class = "product-name">
              <?php echo $product['ProductName']; ?>
            </p>
          </a>
          <p class = "product-price">
            <?php echo '£' . $product['Price'] . '.00'; ?>
          </p>
          <form method="post" action="addtobasket.php"><br>
            <input type="hidden" name="product_id" value="<?= $product['ProductSKU']; ?>">
            <button type="submit" >Add to Basket</button>
          </form>
          <p>
            <?php echo $product['Product_Status']; ?>
          </p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</body>

<footer class="footer">
  <div class="footer-section">
    <div>
      <a href="homePage.php"><img src="hplogo3.png" class="logo" alt="Company Logo"></a>
    </div>
    <div>

      <p>
        Images and products on this page were sourced from the following websites:<br>
        https://www.boots.com/<br>
        https://lloydspharmacy.com/<br><br>
        © 2023 HealthPoint. All rights reserved.

        The content, design, and images on this website are the property of HealthPoint and are protected by
        international copyright laws. Unauthorized use or reproduction of any materials without the express written
        consent of HealthPoint is strictly prohibited. HealthPoint and the HealthPoint logo are trademarks of
        HealthPoint.

        For inquiries regarding the use or reproduction of any content on this website, please contact us at
        HealthPoint@pharmacy.com</p>

    </div>
  </div>
</footer>

</html>
