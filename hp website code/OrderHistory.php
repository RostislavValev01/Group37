<?php
//include connection config
       include('connectdb.php');

// session start
session_start();
 




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <link rel="stylesheet" type="text/css" href="HealthPoint.css">
    <script defer src=""></script>
    
</head>

<body>
    <nav class="header">
        <a href="homePage.php"><img src="hplogo3.png" alt="Company Logo"></a>
        <form action="/search" method="get">
            <input type="text" name="q" placeholder="Search...">
            <button type="submit">Go</button>
        </form>
        <button><a href="accountPage.php">Account</a></button>
        <button><a href="basketPage.php">Basket</a></button>
        <button><a href="contactUsPage.php">Contact Us</a></button>
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


<footer class="footer">
        <div class="footer-section">
            <div>
                <a href="homePage.php"><img src="hplogo3.png" class="logo" alt="Company Logo"></a>
            </div>
            <div>
              <p>© 2023 HealthPoint. All rights reserved.

                The content, design, and images on this website are the property of HealthPoint and are protected by international copyright laws. Unauthorized use or reproduction of any materials without the express written consent of HealthPoint is strictly prohibited. HealthPoint and the HealthPoint logo are trademarks of HealthPoint.
                
                For inquiries regarding the use or reproduction of any content on this website, please contact us at HealthPoint@pharmacy.com</p>
               
            </div>
        </div>
    </footer>

   

</body>

</html>
