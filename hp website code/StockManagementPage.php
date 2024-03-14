<?php
session_start();

require 'connectdb.php';
include 'search-function.php';

if (isset($_GET['search'])) {
  $searchQuery = $_GET['search'];
}
// Function to generate and output the receipt
function generateReceipt($stockData) {
  // Start output buffering
  ob_start();

  // Output the receipt in HTML format
  echo '<h2>Stock Receipt</h2>';
  echo '<table border="1">';
  echo '<tr><th>Product Number</th><th>Product Name</th><th>Quantity</th></tr>';

  foreach ($stockData as $product) {
      echo '<tr>';
      echo '<td>' . $product['ProductSKU'] . '</td>';
      echo '<td>' . $product['ProductName'] . '</td>';
      echo '<td>' . $product['Quantity'] . '</td>';
      echo '</tr>';
  }

  echo '</table>';

  // Get the buffered output
  $html = ob_get_clean();

  // Set the content type to HTML
  header('Content-Type: text/html');

  // Output the HTML content
  echo $html;
}

// Check if the receipt button is clicked
if (isset($_POST['generate_receipt'])) {
  // Assuming $stock is an array containing current stock data
  // You can adjust this to fetch the data from your database
  $stockData = $stock; // Replace with your actual stock data array
  generateReceipt($stockData);
  exit; // Prevent further output
}
?>
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="HealthPoint.css">
    <link rel="stylesheet" href="css/StockManagementPage.css">
    <title>Inventory Management - Stock Overview</title>
    <style>
    </style>
</head>

<body>

<<nav class="banner">
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
    </div>

<div class="container">
    <h2><br>Stock Management</h2>
    <form action="StockManagementPage.php" method="get">
      <input type="text" name="search" class="search-bar"
        value="<?= isset($search) && $search !== '' ? htmlspecialchars($search) : '' ?>" placeholder="Search...">
      <select name="sort">
        <option value="ProductSKU">Product Number</option>
        <option value="ProductName">Product Name</option>
        <option value="Quantity">Product Quantity</option>
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
  

    <table>
        <thead>
            <tr>
                <th>Product Image</th>
                <th>Product Number</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Product Description</th>
                <th>Barcode</th>
                <th>Product Status</th>
                <th>Product Category</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($stock as $product): ?>
                <tr>
                    <td><img src="productImages/<?php echo $product['ProductSKU']; ?>.jpg" alt="Product Image" style="width:100px;height:100px;"></td>
                    <td><?= htmlspecialchars($product['ProductSKU']) ?></td>
                    <td><?= htmlspecialchars($product['ProductName']) ?></td>
                    <td><?= htmlspecialchars($product['Quantity']) ?></td>
                    <td><?= htmlspecialchars($product['Product_Description']) ?></td>
                    <td><?= htmlspecialchars($product['Barcode']) ?></td>
                    <td><?= htmlspecialchars($product['Product_Status']) ?></td>
                    <td><?= htmlspecialchars($product['Product_Category']) ?></td>
                    <td>£<?= htmlspecialchars($product['Price']) ?>.00</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <form action="" method="post">
    <input type="submit" name="generate_receipt" value="Receipt" class="generate-receipt-btn"style="display:; margin: 10px; max-width: auto;">
</form>
</div>
</body>

<footer class="footer">
    <div class="footer-section">
        <div>
           <img src="hplogo3.png" class="logo" alt="Company Logo"></a>
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
