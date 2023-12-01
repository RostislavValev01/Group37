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
  <style> </style>
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
      <li><a href="homePage">Home</a></li>
      <li><a href="aboutUs.php">About Us</a></li>
      <nav class=Products>
        <button class="dropbtn">Products</button>
        <nav class="products-content">
          <a href="productPage.php">Prescriptions</a>
          <a href="productPage.php">Skin Care</a>
          <a href="productPage.php">Hair Care</a>
          <a href="productPage.php">Medication</a>
        </nav>
      </nav>
    </ul>
  </nav>

  <?php
  require 'connectdb.php';

  $sql = "SELECT SKU_number, Product, Price, Price, Product_Status, Product_Category, Product_Description FROM stock3";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();

  $stock = $stmt->fetchAll();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST['search'];
    $sort = $_POST['sort'];
    $order = $_POST['order'];

    $stmt1 = $pdo->prepare("SELECT * FROM stock3 WHERE Product LIKE :search ORDER BY $sort $order");
    $stmt1->execute(['search' => "%$search%"]);
    $products = $stmt1->fetchAll();
  } else {
    $search = '';
    $sort = 'Product';
    $order = 'asc';
  }
  ?>

  <form action="" method="post">
    <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Search...">
    <select name="sort">
      <option value="Product">Product Name</option>
      <option value="Price">Price</option>
      <option value="Product_Status">Availability</option>
      <option value="Product_Category">Description</option>
      <option value="Product_Description">Description</option>

    </select>

    <select name="order">
      <option value="asc">Ascending</option>
      <option value="desc">Descending</option>
    </select>
    <input type="submit" value="Search">
  </form>

  <h1 id="products-header">Products</h1>
  <table class="products-table">
    <thead>
      <tr>
        <th>Product Image</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Product Availability</th>
        <th>Product Description</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($stock as $product): ?>
        <tr>
          <td>
            <a href="indvProduct.php?id=<?php echo $product['SKU_number']; ?>">
              <img src="productImages/<?php echo $product['SKU_number']; ?>.jpg" alt="<?php echo $product['Product']; ?>"
                style="width:100px;height:100px;">
            </a>
          </td>
          <td>
            <a href="indvProduct.php?id=<?php echo $product['SKU_number']; ?>">
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
            <?php echo $product['Product_Category']; ?>
          </td>
          <td>
            <?php echo $product['Product_Description']; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</body>

</html>