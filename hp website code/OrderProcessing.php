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

// Fetch data from the 'orderprocessing' table
$sql = "SELECT OrderNumber, OrderTotal, CustomerID, OrderStatus, Order_Description FROM orderprocessing";
$result = $con->query($sql);

// Initialize variables for search parameters
$search = $_GET['search'] ?? '';
$sort = $_GET['sort'] ?? 'OrderNumber';
$order = $_GET['order'] ?? 'asc';


$sql = "SELECT OrderNumber, OrderTotal, CustomerID, OrderStatus, Order_Description 
        FROM orderprocessing 
        WHERE (OrderNumber LIKE '%$search%' 
               OR OrderTotal LIKE '%$search%' 
               OR CustomerID LIKE '%$search%' 
               OR OrderStatus LIKE '%$search%' 
               OR Order_Description LIKE '%$search%')
        ORDER BY $sort $order";

// Execute the SQL query
$result = $con->query($sql);

// Check if the query was successful
if (!$result) {
    die("Error executing query: " . $con->error);
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
</head>
<body>
<nav class="banner">
    <a href="homePage.php"><img src="hplogo3.png" class="logo" alt="Company Logo"></a>
    <form action="productPage.php" method="get" class="top-search-bar">
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
    <form action="OrderProcessing.php" method="get" class="bottom-search-bar">
        <input type="text" name="search" placeholder="Search...">
        <select name="sort">
            <option value="OrderNumber">Order Number</option>
            <option value="OrderTotal">Order Total</option>
            <option value="CustomerID">Customer ID</option>
            <option value="OrderStatus">Order Status</option>
            <option value="Order_Description">Order Description</option>
        </select>
        <select name="order">
            <option value="asc">Ascending</option>
            <option value="desc">Descending</option>
        </select>
        <input type="submit" value="Search">
    </form>
</div>





<div class="order-table-container">
    <table class="order-table">
        <thead>
        <tr>
            <th>Order Number</th>
            <th>Order Total</th>
            <th>Customer ID</th>
            <th>Order Status</th>
            <th>Order Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["OrderNumber"] . "</td>";
            echo "<td>" . $row["OrderTotal"] . "</td>";
            echo "<td>" . $row["CustomerID"] . "</td>";
            echo "<td>" . $row["OrderStatus"] . "</td>";
            echo "<td>" . $row["Order_Description"] . "</td>";
            echo "<td>";
            // Action buttons for each order
            echo "<button onclick='viewDetails(\"" . $row["CustomerID"] . "\")'>View Details</button>";
            echo "<button onclick='processOrder(\"" . $row["OrderNumber"] . "\")'>Process Order</button>";
            echo "<button onclick='cancelOrder(\"" . $row["OrderNumber"] . "\")'>Cancel Order</button>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
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

<script>
    function viewDetails(customerID) {
        window.location.href = "viewCustomerOrder.php?CustomerID=" + customerID;
    }

    function processOrder(orderNumber) {
        window.location.href = "processOrder.php?orderNumber=" + orderNumber;
    }

    function cancelOrder(orderNumber) {
    if (confirm("Are you sure you want to cancel this order?")) {
        fetch("cancelOrder.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "orderNumber=" + orderNumber // Corrected to lowercase
        })
        .then(response => {
            if (response.ok) {
                window.location.href = "OrderProcessing.php";
            } else {
                throw new Error("Failed to cancel the order.");
            }
        })
        .catch(error => {
            console.error(error);
            alert("Failed to cancel the order. Please try again.");
        });
    }
}


</script>
</body>
</html>
