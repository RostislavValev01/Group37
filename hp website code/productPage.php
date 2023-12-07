<?php
session_start();
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
  <script defer src="loginAdmin.js"></script>
  <style>
   
  </style>
</head>

<body>
<nav class="banner">
        <a href="homePage.php"><img src="hplogo3.png" class="logo" alt="Company Logo"></a>
        <form action="/search" method="get">
            <input type="text" name="q" placeholder="Search...">
            <button type="submit">Go</button>
        </form>
        <nav class="header">
            <button><a href="signInPageCustomer.php">Account</a></button>
            <button><a href="Cart.php">Basket</a></button>
            <button><a href="Contact.php">Contact Us</a></button>
        </nav>
    </nav>

  <nav class="header-nav">
    <ul class="navigation-bar">
      <li><a href="homePage.php">Home</a></li>
      <li><a href="aboutUs.php">About Us</a></li>
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
  $sort = 'Product';
  $order = 'asc';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST['search'];
    $searchWithWildcards = '%' . $search . '%';
    $sort = $_POST['sort'];
    $order = $_POST['order'];

    $query = "SELECT * FROM stock WHERE Product LIKE ? ORDER BY $sort $order";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $searchWithWildcards);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

  } else if (isset($_GET['Product_Category'])) {
    $category = $_GET['Product_Category'];

    $query = "SELECT SKU_number, Product, Price, Product_Status, Product_Category, Product_Description FROM stock WHERE Product_Category = ? ORDER BY $sort $order";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $category);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);


  } else {
    $query = "SELECT SKU_number, Product, Price, Product_Status, Product_Category, Product_Description FROM stock ORDER BY $sort $order";
    $result = mysqli_query($con, $query);
  }

  $stock = mysqli_fetch_all($result, MYSQLI_ASSOC);
  ?>

  <div class="content">
    <form action="" method="post">
      <input type="text" name="search" class="search-bar"
        value="<?= isset($search) && $search !== '' ? htmlspecialchars($search) : '' ?>" placeholder="Search...">
      <select name="sort">
        <option value="Product">Product Name</option>
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

    <h1 id="products-header">Our Products</h1>
    <table class="products-table">
      <thead>
        <tr>

          <th>Product Name</th>
          <th>Price</th>
          <th>Availability</th>
          <th>Product Description</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($stock as $product): ?>
          <tr>
            <td>
              <a href="indvProduct.php?id=<?php echo $product['SKU_number']; ?>">
                <img src="productImages/<?php echo $product['SKU_number']; ?>.jpg"
                  alt="<?php echo $product['Product']; ?>" style="width:100px;height:100px;">
                <p>
                  <?php echo $product['Product']; ?>
                </p>
              </a>
            </td>
            <td>
              <?php echo '£' . $product['Price'] . '.00'; ?>
              <form method="post" action="addtobasket.php"><br>
                <input type="hidden" name="product_id" value="<?= $product['SKU_number']; ?>">
                <button type="submit">Add to Basket</button>
              </form>
            </td>
            <td>
              <?php echo $product['Product_Status']; ?>
            </td>
            <td>
              <?php echo $product['Product_Description']; ?>

            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <!-- <div class="product-container"> 
    <?php foreach ($stock as $product): ?>
        <div class="product-box">
            <a href="indvProduct.php?id=<?php echo $product['SKU_number']; ?>">
                <img src="productImages/<?php echo $product['SKU_number']; ?>.jpg" alt="<?php echo $product['Product']; ?>" style="width:100px;height:100px;">
                <h3><?php echo $product['Product']; ?></h3>
            </a>
            <p>Price: $<?php echo $product['Price']; ?></p>
            <p>Availability: <?php echo ($product['Product_Status'] > 0) ? 'In Stock' : 'Out of Stock'; ?></p>
            <button>Add to Basket</button>
        </div>
    <?php endforeach; ?> -->
  </div>

  </div>
</body>
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

</html>
