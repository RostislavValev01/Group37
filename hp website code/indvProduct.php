<?php
session_start();
require 'connectdb.php';
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="HealthPoint.css">
  <link rel="stylesheet" type="text/css" href="css/indvProduct.css">
  <script defer src="loginAdmin.js"></script>

</head>

<body>

  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="HealthPoint.css">
    <link rel="stylesheet" type="text/css" href="productPage.css">
    <script defer src="productPage\.js"></script>
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

    <div class="content">
      <?php
      $id = $_GET['id'];

      $query = "SELECT ProductSKU, ProductName, Price, Product_Status, Product_Category, Product_Description FROM stock WHERE ProductSKU = ?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("s", $id);
      $stmt->execute();

      $result = $stmt->get_result();
      $product = $result->fetch_assoc();


      if (isset($_SESSION['loggedin'])) {
        $customerID = $_SESSION['Customer_ID'];
        $query1 = "SELECT FirstName, Surname FROM accountdetails WHERE Customer_ID = ?";
        $stmt1 = $con->prepare($query1);
        $stmt1->bind_param("s", $customerID);
        $stmt1->execute();
        $stmt1->bind_result($firstName, $lastName);
        $stmt1->fetch();

        $stmt1->close();
      }
        ?>

      <title>
        <?php echo $product['ProductName']; ?>
      </title>
      <div class="indvP">
        <p class="pImg">
          <?php
          echo "<img src='productImages/" . $product['ProductSKU'] . ".jpg' alt='" . $product['ProductName'] . "' style='max-height: 550px; max-width: 500px;'><br>"; ?>
        </p>
        <div class="pDetails">
          <p class="pName">
            <?php echo $product['ProductName']; ?>
          </p>
          <p class="pPrice">
            <?php echo "Product Price: " . "£" . $product['Price']; ?>
          </p>
          <div class="pStatusBasket">
            <p class="pStatus">
              <?php echo $product['Product_Status'] . ":"; ?>
            </p>
            <form method="post" action="addtobasket.php" class="pAddToCart">
              <input type="hidden" name="product_id" value="<?= $product['ProductSKU']; ?>">
              <input type="submit" value="Add to Basket">
            </form>
          </div>
          <p class="pCategory">
            <?php echo "Product Category: " . $product['Product_Category']; ?>
          </p>
          <p class="pDescription">
            <?php echo $product['Product_Description']; ?>
          </p>
        </div>
      </div>
      <div class="review-section">
        <h2>Product Reviews</h2><br>
        <?php
        $query = "SELECT FirstName, LastName, ReviewRating, Description FROM productreviews WHERE ProductSKU = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="review-box">';
            echo '<div class="review">';
            echo '<p><strong>User:</strong> ' . $row['FirstName'] . ' ' . $row['LastName'] . '</p>';
            echo '<p><strong>Rating:</strong> ' . $row['ReviewRating'] . '</p>';
            echo '<p><strong>Review:</strong> ' . $row['Description'] . '</p>';
            echo '</div>';
            echo '</div>';
          }
        }
        ?>
        <button id="reviewButton" class="btn btn-primary">Write a Review</button>
        <div id="reviewModal" class="modal">
          <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Write a Review</h2>
            <form id="reviewForm" method="post" action="submit_review.php?id=<?php echo $id; ?>">
              <input type="hidden" id="firstName" name="firstName" value="<?php echo $firstName; ?>">
              <input type="hidden" id="lastName" name="lastName" value="<?php echo $lastName; ?>"><br>
              <label for="rating">Rating:</label>
              <input type="number" id="rating" name="rating" min="1" max="5" required><br><br>
              <label for="description">Description:</label>
              <textarea id="description" name="description" rows="4" required></textarea><br><br><br>
              <input type="submit" value="Submit Review">
            </form>
          </div>
        </div>
      </div>
    </div>

    <script>
      var modal = document.getElementById("reviewModal");
      var btn = document.getElementById("reviewButton");
      var span = document.getElementsByClassName("close")[0];

      btn.onclick = function () {
        modal.style.display = "block";
      }

      span.onclick = function () {
        modal.style.display = "none";
      }

      window.onclick = function (event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
    </script>

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
          consent of HealthPoint is strictly prohibited. HealthPoint and the HealthPoint logo are trademarks
          of
          HealthPoint.

          For inquiries regarding the use or reproduction of any content on this website, please contact us at
          HealthPoint@pharmacy.com</p>

      </div>
    </div>
  </footer>

</html>

