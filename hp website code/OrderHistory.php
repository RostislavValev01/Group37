<?php
session_start();

require 'connectdb.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'OrderID';
$order = isset($_GET['order']) ? $_GET['order'] : 'asc';

if (!empty($search)) {
    $searchWithWildcards = '%' . $search . '%';
    $query = "SELECT * FROM orderhistory WHERE OrderID LIKE ? OR Customer_ID LIKE ? OR ProductName LIKE ? OR ProductDescription LIKE ? OR Quantity LIKE ? OR Price LIKE ? OR ProductSKU LIKE ? OR OrderDate LIKE ? OR OrderStatus LIKE ? ORDER BY $sort $order";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "sssssssss", $searchWithWildcards, $searchWithWildcards, $searchWithWildcards, $searchWithWildcards, $searchWithWildcards, $searchWithWildcards, $searchWithWildcards, $searchWithWildcards, $searchWithWildcards);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
} else {
    $query = "SELECT * FROM orderhistory ORDER BY $sort $order";
    $result = mysqli_query($con, $query);
}

$orderHistoryDetails = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="HealthPoint.css">
  <link rel="stylesheet" href="css/orderHistory.css">
  <title>Order History</title>

</head>

<body>

  <nav class="banner">
    <a href="Index.php"><img src="hplogo3.png" class="logo" alt="Company Logo"></a>
    <form action="productPage.php" method="get">
      <input type="text" name="search" class="search-bar"
        value="<?= isset($search) && $search !== '' ? htmlspecialchars($search) : '' ?>"
        placeholder="Search products...">
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
  



  
  <div class="container">
    <h2>Previous Orders</h2>
    <form action="OrderHistory.php" method="get">
      <input type="text" name="search" class="search-bar"
        value="<?= isset($search) && $search !== '' ? htmlspecialchars($search) : '' ?>" placeholder="Search...">
      <select name="sort">
        <option value="OrderID">OrderID</option>
        <option value="CustomerID">CustomerID</option>
        <option value="ProductName">Product Name</option>
        <option value="ProductDescription">Product Description</option>
        <option value="Quantity">Quantity</option>
        <option value="Price">Price</option>
        <option value="ProductSKU">Product Number</option>
        <option value="OrderDate">Order Date</option>
        <option value="OrderStatus">Order Status</option>
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
          <th>OrderID</th>
          <th>CustomerID</th>
          <th>Product Name</th>
          <th>Product Description</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Product Number</th>
          <th>Order Date</th>
          <th>Order Status</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($orderHistoryDetails as $product): ?>
          <tr>
            <td>
              <?= htmlspecialchars($product['OrderID']) ?>
            </td>
            <td>
              <?= htmlspecialchars($product['Customer_ID']) ?>
            </td>

            <td>
              <?= htmlspecialchars($product['ProductName']) ?>
            </td>
            <td>
              <?= htmlspecialchars($product['ProductDescription']) ?>
            </td>
            <td>
              <?= htmlspecialchars($product['Quantity']) ?>
            </td>
            <td>
              <?= htmlspecialchars($product['Price']) ?>
            </td>
            <td>
              <?= htmlspecialchars($product['ProductSKU']) ?>
            </td>
            <td>
              <?= htmlspecialchars($product['OrderDate']) ?>
            </td>
            <td>
              <?= htmlspecialchars($product['OrderStatus']) ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <form action="" method="post">
    <input type="submit" name="generate_receipt" value="Receipt" class="generate-receipt-btn"style="display:; margin: 10px; max-width: auto;">
</form>
  </div>

  <footer class="footer">
    <div class="footer-section">
      <div>
        <img src="hplogo3.png" class="logo" alt="Company Logo"></a>
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



</body>
