<?php
session_start();

require 'connectdb.php';
include 'checkout.php';

if (isset($_GET['search'])) {
  $searchQuery = $_GET['search'];
}


if (!isset($_SESSION['Customer_ID'])) {
  header('Location:productPage.php');
} else {

  ?>
  <!DOCTYPE html>
  <html lang="en">
  <meta charset="UTF-8">

  <head>
    <title>Checkout</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="HealthPoint.css">
    <link rel="stylesheet" type="text/css" href="css/Checkout.css">
    <script defer src="Checkout.js"></script>
  </head>


  <nav class="banner">
    <a href="Index.php"><img src="hplogo3.png" class="logo" alt="Company Logo"></a>
    <form action="" method="get">
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



  <div class="content">
    <div class="address-container">
      <h1>Delivery Address</h1>
      <form action="checkout.php" method="post" id="addressForm">
        <input type="email" id="email" name="email" placeholder="Email"><br><br>

        <div class="name-fields">
          <input type="text" id="fname" name="fname" placeholder="First Name">
          <input type="text" id="lname" name="lname" placeholder="Last Name"><br><br>
        </div>

        <input type="text" id="address" name="address" placeholder="Address"><br><br>

        <input type="text" id="city" name="city" placeholder="City"><br><br>

        <div class="country-fields">
          <input type="text" id="country" name="country" placeholder="Country">
          <input type="text" id="postcode" name="postcode" placeholder="Postcode">
        </div><br><br>

        <input type="tel" id="phone" name="phone" placeholder="Phone Number"><br><br>

        <button type="submit" name="submitOrder">Submit Order</button>
      </form>
    </div>

    <div class="payment-container">
      <h1>Payment Method</h1>
      <div class="payment-details">
        <img alt="Visa/Delta/Electron" src="https://m.media-amazon.com/images/I/71DcD1e5IfL._SL40_.png" width="40px">
        <a href="#" class="card-button" id="cardLink">Add a Credit or Debit Card</a>
      </div>
    </div>

    <div class="card-overlay" id="cardOverlay"></div>
    <div id="cardForm" class="card-form">
      <form class="credit-form">
        <h2>Card Details</h2>
        <input type="text" id="cardholderName" name="cardholderName" placeholder="Cardholder Name"><br><br>
        <div class="inline-fields">
          <input type="text" id="expiryDate" name="expiryDate" placeholder="Expiry Date (MM/YY)">
          <input type="text" id="cvv" name="cvv" placeholder="CVV">
        </div><br><br>
        <input type="text" id="cardNumber" name="cardNumber" placeholder="Card Number"><br><br>
        <!--<input type="submit" id="submitCard" value="Insert Payment Details">-->
        <button type="button" id="closeButton" onclick="closeCardForm()">Close</button>
      </form>
    </div>
    <div class="Total">
      <h1>Order Summary</h1>
      <table class="Order">
        <tr>
          <th>Product Name</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Subtotal</th>
        </tr>
        <?php
        require 'connectdb.php';

        if (isset($_SESSION['Customer_ID'])) {
          $user_id = $_SESSION['Customer_ID'];

          $query = "SELECT ProductName, Quantity, Price FROM customerbasket WHERE CustomerID = ?";
          $stmt = mysqli_prepare($con, $query);
          mysqli_stmt_bind_param($stmt, "i", $user_id);
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);

          $orderTotal = 0;

          while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['ProductName'] . '</td>';
            echo '<td>' . $row['Quantity'] . '</td>';
            echo '<td>$' . $row['Price'] . '</td>';

            $subtotal = $row['Quantity'] * $row['Price'];
            echo '<td>$' . number_format($subtotal, 2) . '</td>';
            echo '</tr>';

            $orderTotal += $subtotal;
          }

          echo '<tr><td colspan="3" style="text-align: right;"><strong>Total</strong></td><td>$' . number_format($orderTotal, 2) . '</td></tr>';
        }
        ?>
      </table>

      <?php if (isset($_SESSION['Customer_ID'])): ?>
        <p>Total Amount: $
          <?php echo number_format($orderTotal, 2); ?>
        </p>
      <?php endif; ?>
    </div>



  </div>




  </div>



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

  </body>

  </html>
<?php } ?>
