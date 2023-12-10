<?php
session_start();

require 'connectdb.php';
include 'search-function.php';

if (isset($_GET['search'])) {
  $searchQuery = $_GET['search'];
}
?>

<?php
require_once "connectdb.php";

session_start();

// if the user is logged in
if (isset($_SESSION['Customer_ID'])) {
    $customerID = $_SESSION['Customer_ID'];

    // Fetch Email and Phone Number from the database
    $sql = "SELECT Email, MobileNumber FROM accountdetails WHERE Customer_ID = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $Customer_ID);
    $stmt->execute();
    $stmt->bind_result($Email, $MobileNumber);
    $stmt->fetch();
    $stmt->close();

    // Fetch CustomerAddress from the database
    $sql = "SELECT CustomerAddress FROM accountdetails WHERE Customer_ID = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $CustomerID);
    $stmt->execute();
    $stmt->bind_result($CustomerAddress);
    $stmt->fetch();
    $stmt->close();
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: signInPageAdmin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

<head>
    <title>Admin Accounts</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="HealthPoint.css">
    <link rel="stylesheet" type="text/css" href="AdminAccounts.css">

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


    <div class="admin-section">
        <div class="admin-content">
            <div class="box">
                <p>(Visible to logged in user)</p>
                <p>Name:</p>
                <p>Password:</p>
                <button onclick="updatePastOrders()">Update</button>
            </div>

            <div class="box">
                <p>(Visible to the logged-in user)</p>

                <p>Email Address: <?php echo $Email; ?></p>

                <p>Phone Number: <?php echo $MobileNumber; ?></p>

                <button onclick="updateCustomerDetails()">Update</button>
            </div>

            <div class="box">
                <p>(Visible to the logged in user)</p>

                <p>Shipping Address: <?php echo $CustomerAddress; ?></p>

                <button onclick="updateStockManagement()">Update</button>
            </div>

        </div>

        <div class="admin-sidebar">
            <button onclick="redirectTo('OrderHistory.php')">View Past Orders</button>
            <button onclick="redirectTo('customerDetails.php')">Customer Details Database</button>
            <button onclick="redirectTo('StockManagementPage.php')">Stock Management Database</button>
            <button onclick="redirectTo('Orderprocessing.php')">Order Processing</button>
        </div>

        <script defer src="AdminAccounts.js"></script>

    </div>

    <?php
    // Close the database connection
    $con->close();
    ?>

    <footer class="footer">
        <div class="footer-section">
            <div>
                <a href="homePage.php"><img src="hplogo3.png" class="logo" alt="Company Logo"></a>
            </div>
            <div>
                <p>© 2023 HealthPoint. All rights reserved.

                    The content, design, and images on this website are the property of HealthPoint and are protected by
                    international copyright laws. Unauthorized use or reproduction of any materials without the express
                    written consent of HealthPoint is strictly prohibited. HealthPoint and the HealthPoint logo are
                    trademarks of HealthPoint.

                    For inquiries regarding the use or reproduction of any content on this website, please contact us at
                    HealthPoint@pharmacy.com</p>

            </div>
        </div>
    </footer>
</body>

</html>
