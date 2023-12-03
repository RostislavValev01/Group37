<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

<head>
    <title>
        <?php echo $product['Product']; ?>
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="HealthPoint.css">
    <script defer src="loginAdmin.js"></script>
    <style> </style>
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
            <button><a href="contactUsPage.php">Contact Us</a></button>
        </nav>
    </nav>

    <nav class="header-nav">
        <ul class="navigation-bar">
            <li><a href="homePage">Home</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
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
<div class="content">
    <?php
    // get id from productPage SKU_number
    $id = $_GET['id'];

    // connect to database
    require 'connectdb.php';

    // prepare sql query
    $stmt = $pdo->prepare("SELECT * FROM stock3 WHERE Product_ID = :id");
    $stmt->execute(['id' => $id]);

    // retrieve the product details
    $product = $stmt->fetch();

    // display the product details
    echo "Product: " . $product['Product'] . "<br>";
    echo "Image: <br>";
    echo "<img src='productImages/" . $product['SKU_number'] . ".jpg' alt='" . $product['Product'] . "' style='width:100px;height:100px;'><br>";
    echo "Price: " . $product['Price'] . "<br>";
    echo "Status: " . $product['Product_Status'] . "<br>";
    echo "Category: " . $product['Product_Category'] . "<br>";
    echo "Description: " . $product['Product_Description'] . "<br>";
    ?>
</div>
</body>
<footer class="footer">
    <div class="footer-section">
        <div>
            <a href="homePage.php"><img src="hplogo3.png" class="logo" alt="Company Logo"></a>
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
