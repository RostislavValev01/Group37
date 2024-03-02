<?php
session_start();
if(isset($_SESSION['Customer_ID'])){
    header('Location:productPage.php');
    } else {
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

<head>
    <title>Admin Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="HealthPoint.css">
    <link rel="stylesheet" type="text/css" href="css/signin.css">
    <script defer src="loginAdmin.js"></script>
</head>

<body>
<nav class="banner">
<a href="Index.php"><img src="hplogo3.png" class="logo" alt="Company Logo"></a>
<form action="productPage.php" method="get">
  <input type="text" name="search" class="search-bar"
    value="<?= isset($search) && $search !== '' ? htmlspecialchars($search) : '' ?>" placeholder="Search products...">
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

    <div class="content">
        <div class="login-container">
            <h1 id="login-header">Administrator Login</h1>
            <?php if (isset($_SESSION['error'])) {
                echo '<p class="error">' . $_SESSION['error'] . '</p>';
                unset($_SESSION['error']);
            }
            ?>
            <form id="login-form" action="loginAdmin.php" method="post">
                <input type="email" id="email" name="email" placeholder="Email" /><br><br>
                <input type="password" id="password" name="password" placeholder="Password"><br><br>
                <input type="adminID" id="adminID" name="adminID" placeholder="Admin ID"><br><br>
                <input type="submit" id="login" name="login" value="Login">
                <input type="button" value="Register" id="register" class="button"
                    onclick="location.href='signupadmin.php';">
                <br>
            </form>
        </div>
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
<?php }?>
