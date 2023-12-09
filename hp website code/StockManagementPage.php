<?php
session_start();

require 'connectdb.php';

$sql = "SELECT * FROM stock";
$result = mysqli_query($con, $sql);

if (!$result) {
    die('Error executing query: ' . mysqli_error($con));
}

$stockDetails = mysqli_fetch_all($result, MYSQLI_ASSOC);

if ($stockDetails === null) {
    die('Error fetching data from the database');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="HealthPoint.css">
    <title>Inventory Management - Stock Overview</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'poppins', sans-serif;
            box-sizing: border-box;
        }

        .container {
            background-color: #b8cca3;
            min-height: 100vh;
            width: 100%;
            color: rgb(0, 0, 0);
            align-items: center;
        }

        table {
            border: 1px solid black;
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
        }

        h1, h2 {
            text-align: center;
        }
    </style>
</head>

<body>

<<nav class="banner">
    <a href="homePage.php"><img src="hplogo3.png" class="logo" alt="Company Logo"></a>
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
    </div>

    <?php
    require 'connectdb.php';
    ?>

<div class="container">
    <h2>Stock Management</h2>
    <table>
        <thead>
            <tr>
                <th>Product Number</th>
                <th>Quantity</th>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Barcode</th>
                <th>Product Status</th>
                <th>Product Category</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($stockDetails as $product): ?>
                <tr>
                    <td><?= htmlspecialchars($product['ProductSKU']) ?></td>
                    <td><?= htmlspecialchars($product['Quantity']) ?></td>
                    <td><?= htmlspecialchars($product['ProductName']) ?></td>
                    <td><?= htmlspecialchars($product['Product_Description']) ?></td>
                    <td><?= htmlspecialchars($product['Barcode']) ?></td>
                    <td><?= htmlspecialchars($product['Product_Status']) ?></td>
                    <td><?= htmlspecialchars($product['Product_Category']) ?></td>
                    <td><?= htmlspecialchars($product['Price']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
                international copyright laws. Unauthorized use or reproduction of any materials without the express
                written
                consent of HealthPoint is strictly prohibited. HealthPoint and the HealthPoint logo are trademarks of
                HealthPoint.

                For inquiries regarding the use or reproduction of any content on this website, please contact us at
                HealthPoint@pharmacy.com</p>
        </div>
    </div>
</footer>

</html>
