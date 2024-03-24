<?php
session_start();

require_once "connectdb.php";

// Check if the user is logged in
if (!isset($_SESSION['Customer_ID'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: signInPageAdmin.php");
    exit();
}

$customerID = $_SESSION['Customer_ID'];

// Fetch user details from the database
$sql = "SELECT FirstName, Email, CustomerAddress, Admin_ID FROM accountdetails WHERE Customer_ID = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $customerID);
$stmt->execute();
$stmt->bind_result($FirstName, $Email, $CustomerAddress, $Admin_ID);
$stmt->fetch();
$stmt->close();
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

  <div class="admin-container">
    <div class="admin-details-container">
        <h2>Admin Details</h2>
        <div class="admin-details-item">
            <span class="admin-details-label">Name:</span>
            <span class="admin-details-value"><?php echo $FirstName; ?></span>
        </div>
        <div class="admin-details-item">
            <span class="admin-details-label">Email:</span>
            <span class="admin-details-value"><?php echo $Email; ?></span>
        </div>
        <div class="admin-details-item">
            <span class="admin-details-label">Address:</span>
            <span class="admin-details-value"><?php echo $CustomerAddress; ?></span>
        </div>
        <div class="admin-details-item">
            <span class="admin-details-label">Admin ID:</span>
            <span class="admin-details-value"><?php echo $Admin_ID; ?></span>
        </div>
        </div>
        <div class="admin-details-item">
        <button class="edit-profile" onclick="window.location.href = 'editProfileadmin.php';">Edit Profile</button>
        <button class="change-password" onclick="window.location.href = 'changePasswordadmin.php';">Change Password</button>
      </div>
    </div>

    <div class="admin-dashboard-container">
        <h2>Admin Dashboard</h2>
        <div class="admin-dashboard">
        <a href="customerDetails.php"><button>Customer Database</button></a>
        <a href="OrderHistory.php"><button>View Order History</button></a>
        <a href="StockManagementPage.php"><button>Stock Management</button></a>
        <a href="OrderProcessing.php"><button>Processing Orders</button></a>
    </div>
    </div>
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
