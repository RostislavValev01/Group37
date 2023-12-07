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
  <script defer src="loginAdmin.js"></script>
  <style>
    form {
      margin-bottom: 20px;
    }

    /*text within search bar settings */
    input[type="text"],
    select,
    input[type="submit"] {
      padding: 10px;
      margin: 5px;
    }

    input[type="text"],
    select {
      width: 200px;
    }

    select {
      width: 150px;
    }

    /* search bar 'search' button settings */
    input[type="submit"] {
      background-color: #4caf50;
      color: white;
      cursor: pointer;
    }

    /* headings settings */
    h1#products-header {
      color: #333;
      text-align: center;
      margin-right: 60px;
    }

    /* size of table */
    table.products-table {
      width: 95%;
      border-collapse: collapse;
      margin-top: 20px;
      margin-left: 20px;
    }

    /* border style, size and colour */
    table.products-table th,
    table.products-table td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    /* colour of table headings */
    table.products-table th {
      background-color: #4caf50;
      color: white;
    }

    /* colour of table rows */
    table.products-table tr:hover {
      background-color: #f5f5f5;
    }

    /* size of images */
    table.products-table img {
      max-width: 100px;
      max-height: 100px;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    /* potential product-container CSS*/
h1 {
    text-align: center;
}

.product-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.product-box {
    border: 1px solid #ddd;
    padding: 10px;
    margin: 10px;
    text-align: center;
    background-color: #fff;
}

.product-box img {
    max-width: 100%;
    max-height: 150px;
}
*/
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


  <?php
  require 'connectdb.php';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST['search'];
    $sort = $_POST['sort'];
    $order = $_POST['order'];

    $stmt = $pdo->prepare("SELECT * FROM stock3 WHERE Product LIKE :search ORDER BY $sort $order");
    $stmt->execute(['search' => "%$search%"]);
  } else {
    $search = '';
    $sort = 'Product';
    $order = 'asc';

    $stmt = $pdo->prepare("SELECT SKU_number, Product, Price, Product_Status, Product_Category, Product_Description FROM stock3 ORDER BY $sort $order");
    $stmt->execute();
  }

  $stock = $stmt->fetchAll();
  ?>

  <div class="content">
    <form action="" method="post">
      <input type="text" name="search"
        value="<?= isset($search) && $search !== '' ? htmlspecialchars($search) : 'Search' ?>" placeholder="Search...">
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
                <?php echo $product['Product']; ?>
              </a>
            </td>
            <td>
              <?php echo $product['Price']; ?>
            </td>
            <td>
              <?php echo $product['Product_Status']; ?>
            </td>
            <td>
              <?php echo $product['Product_Category']; ?> form method="post" action="add_to_basket.php">
              <input type="hidden" name="product_id" value="<?= $product['SKU_number']; ?>">
              <button type="submit">Add to Basket</button>
              </form>
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
