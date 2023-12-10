<?php
session_start();

require 'connectdb.php';

$sql = "SELECT * FROM orderhistory";
$result = mysqli_query($con, $sql);

if (!$result) {
    die('Error executing query: ' . mysqli_error($con));
}

$orderHistoryDetails = mysqli_fetch_all($result, MYSQLI_ASSOC);

if ($orderHistoryDetails === null) {
    die('Error fetching data from the database');
}
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
    <h2>Previous Orders</h2>
    <table>
        <thead>
            <tr>
                <th>OrderID</th>
                <th>CustomerID</th>
                <th>ProductID</th>
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
                    <td><?= htmlspecialchars($product['OrderID']) ?></td>
                    <td><?= htmlspecialchars($product['Customer_ID']) ?></td>
                    <td><?= htmlspecialchars($product['ProductID']) ?></td>
                    <td><?= htmlspecialchars($product['ProductName']) ?></td>
                    <td><?= htmlspecialchars($product['ProductDescription']) ?></td>
                    <td><?= htmlspecialchars($product['Quantity']) ?></td>
                    <td><?= htmlspecialchars($product['Price']) ?></td>
                    <td><?= htmlspecialchars($product['ProductSKU']) ?></td>
                    <td><?= htmlspecialchars($product['OrderDate']) ?></td>
                    <td><?= htmlspecialchars($product['OrderStatus']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
