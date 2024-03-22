<?php
session_start();

// Check if the user is logged in as an admin
if (!isset($_SESSION['AdminStatus']) || $_SESSION['AdminStatus'] !== 1) {
    // Redirect to the login page if the user is not logged in as an admin
    header("Location: signInPageAdmin.php");
    exit();
}

// Include the database connection file
require_once "connectdb.php";

// Check if the orderNumber is set in the URL parameter
if (!isset($_GET['orderNumber'])) {
    // Redirect to the order processing page if orderNumber is not provided
    header("Location: orderprocessing.php");
    exit();
}

$orderNumber = $_GET['orderNumber'];

// Fetch order details from the database based on the orderNumber
$sql = "SELECT OrderNumber, OrderTotal, CustomerID, OrderStatus, Order_Description FROM orderprocessing WHERE OrderNumber = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $orderNumber);
$stmt->execute();
$result = $stmt->get_result();
$order = $result->fetch_assoc();

// Close the prepared statement and database connection
$stmt->close();
$con->close();

// If the order details are not found, redirect to the order processing page
if (!$order) {
    header("Location: Orderprocessing.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Processing</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="HealthPoint.css">
    <link rel="stylesheet" type="text/css" href="OrderProcessing.css">
    <link rel="stylesheet" type="text/css" href="additionalProcessing.css">
</head>
<body>
<nav class="banner">
    <a href="homePage.php"><img src="hplogo3.png" class="logo" alt="Company Logo"></a>
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

<div class="container">
        <h2>Process Order</h2>
        <p><strong>Order Number:</strong> <?php echo $order['OrderNumber']; ?></p>
        <p><strong>Order Total:</strong> <?php echo $order['OrderTotal']; ?></p>
        <p><strong>Customer ID:</strong> <?php echo $order['CustomerID']; ?></p>
        <p><strong>Current Order Status:</strong> <?php echo $order['OrderStatus']; ?></p>
        <p><strong>Order Description:</strong> <?php echo $order['Order_Description']; ?></p>

        <form method="post" action="updateOrderStatus.php">
    <input type="hidden" name="orderNumber" value="<?php echo $order['OrderNumber']; ?>">
    <label for="newStatus">New Order Status:</label>
    <select name="newStatus" id="newStatus">
        <option value="Pending">Pending</option>
        <option value="Processing">Processing</option>
        <option value="Shipped">Shipped</option>
        <option value="Delivered">Delivered</option>
    </select>
    <button type="submit" name="updateStatus">Update Status</button>
</form>
</div>


<footer class="footer">
    <div class="footer-section">
        <div>
            <img src="hplogo3.png" class="logo" alt="Company Logo"></a>
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
</body>
</html>