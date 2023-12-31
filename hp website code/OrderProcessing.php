<?php
// Include the database connection file
require_once "connectdb.php";

// Fetch data from the 'orderprocessing' table
$sql = "SELECT OrderNumber, OrderTotal, CustomerID, OrderStatus, Order_Description FROM orderprocessing";
$result = $con->query($sql);
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

</head>
<body>
    <nav class="banner">
        <a href="homePage.php"><img src="hplogo3.png" class="logo" alt="Company Logo"></a>
        <form action="/search" method="get">
            <input type="text" name="q" placeholder="Search...">
            <button type="submit">Go</button>
        </form>
        <nav class="header">
            <button><a href="accountPage.php">Account</a></button>
            <button><a href="basketPage.php">Basket</a></button>
            <button><a href="Contact.php">Contact Us</a></button>
        </nav>
    </nav>

    <nav class="header-nav">
        <ul class="navigation-bar">
            <li><a href="homePage">Home</a></li>
            <li><a href="AboutUs.php">About Us</a></li>
            <nav class=Products>
                <button class="dropbtn">Products</button>
                <nav class="products-content">
                    <a href="productPage.php">Prescriptions</a>
                    <a href="productPage.php">Skin Care</a>
                    <a href="productPage.php">Hair Care</a>
                    <a href="productPage.php">Medication</a>
                </nav>
            </nav>
        </ul>
    </nav>

    <div class="search-bar">
        <input type="text" name="search" placeholder=" search...">
        <button type="button">Filter</button>
    </div>


    <table class="order-table">
        <thead>
            <tr>
                <th>OrderNumber</th>
                <th>OrderTotal</th>
                <th>CustomerID</th>
                <th>OrderStatus</th>
                <th>Order_Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["OrderNumber"] . "</td>";
                echo "<td>" . $row["OrderTotal"] . "</td>";
                echo "<td>" . $row["CustomerID"] . "</td>";
                echo "<td>" . $row["OrderStatus"] . "</td>";
                echo "<td>" . $row["Order_Description"] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

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
</body>
</html>
