<?php
session_start();
require_once "connectdb.php";

// Check if the user is logged in
if (!isset($_SESSION['loggedin'])) {
    // Redirect to login page if not logged in
    header("Location: signInPageCustomer.php");
    exit;
}

// Fetch user details from the database
$user_id = $_SESSION['Customer_ID'];
$query = "SELECT FirstName, Email, CustomerAddress FROM accountdetails WHERE Customer_ID = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Handle form submission to update profile
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['address'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];

        // Update user details in the database
        $update_query = "UPDATE accountdetails SET FirstName = ?, Email = ?, CustomerAddress = ? WHERE Customer_ID = ?";
        $update_stmt = $con->prepare($update_query);
        $update_stmt->bind_param("sssi", $name, $email, $address, $user_id);
        if ($update_stmt->execute()) {
            // Update session variables
            $_SESSION['FirstName'] = $name;
            $_SESSION['Email'] = $email;
            $_SESSION['CustomerAddress'] = $address;

            // Redirect to customer account page with success message
            header("Location: AdminAccounts.php?success=1");
            exit;
        } else {
            // Display error message if update fails
            echo '<script>alert("Failed to update profile. Please try again.");</script>';
            // Debug: Check for database errors
            echo 'MySQL Error: ' . $con->error;
        }
        $update_stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

<head>
    <title>Customer Accounts</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="HealthPoint.css">
    <link rel="stylesheet" type="text/css" href="AdminAccounts.css">
    <link rel="stylesheet" type="text/css" href="custom-style.css">
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

  <div class="edit-profile-container">
    <h2>Edit Your Profile</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $row['FirstName']; ?>" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $row['Email']; ?>" required><br><br>
        
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" value="<?php echo $row['CustomerAddress']; ?>" required><br><br>
        
        <button type="submit">Save Changes</button>
        <button onclick="window.location.href = 'AdminAccounts.php';">Back</button>
    </form>
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
        international copyright laws. Unauthorized use or reproduction of any materials without the express written
        consent of HealthPoint is strictly prohibited. HealthPoint and the HealthPoint logo are trademarks of
        HealthPoint.

        For inquiries regarding the use or reproduction of any content on this website, please contact us at
        HealthPoint@pharmacy.com</p>

    </div>
  </div>
</footer>

<script>
    <?php if (isset($_GET['success'])) { ?>
        // Show success message if changes were made successfully
        alert("Changes made successfully!");
    <?php } ?>
</script>
</body>
</html>