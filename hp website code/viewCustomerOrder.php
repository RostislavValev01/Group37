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

// Check if the CustomerID parameter is set
if (!isset($_GET['CustomerID'])) {
    die("CustomerID parameter is missing.");
}

// Get the customer ID from the URL parameter
$CustomerID = $_GET['CustomerID'];

// Fetch customer details from the database
$sql = "SELECT FirstName, LastName, Email, Address, City, Country, PhoneNumber FROM orderprocessing WHERE CustomerID = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $CustomerID);
$stmt->execute();
$stmt->bind_result($FirstName, $LastName, $Email, $Address, $City, $Country, $PhoneNumber);
if (!$stmt->fetch()) {
    die("Error fetching customer details: " . $stmt->error);
}

$stmt->close();
?>


<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

<head>
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

    <div class="customer-details">
    <h2>Customer Details</h2>
    <p><strong>Name:</strong> <?php echo $FirstName . " " . $LastName; ?></p>
    <p><strong>Email:</strong> <?php echo $Email; ?></p>
    <p><strong>Address:</strong> <?php echo $Address; ?></p>
    <p><strong>City:</strong> <?php echo $City; ?></p>
    <p><strong>Country:</strong> <?php echo $Country; ?></p>
    <p><strong>Phone Number:</strong> <?php echo $PhoneNumber; ?></p>
</div>

    <div style="text-align: center;">
        <a class="back-button" href="OrderProcessing.php">Back</a>
    </div>>



    <?php
    // Close the database connection
    $con->close();
    ?>



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
