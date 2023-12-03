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
    <title>Checkout Page</title>
    <link rel="stylesheet" type="text/css" href="HealthPoint.css">
    <script defer src="Checkout.js"></script>
    
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


    <h2>Contact Information</h2>
    
    <div class="Contactinfo">
        <form action="#" method="post">
            <input type="email" id="email" name="email" placeholder="Email"><br><br>
            
            <input type="text" id="fname" name="fname" placeholder="First Name">
            <input type="text" id="lname" name="lname" placeholder="Last Name"><br><br>
            
            <input type="text" id="address" name="address" placeholder="Address"><br><br>
            
            <input type="text" id="city" name="city" placeholder="City"><br><br>
            
            <div>
                <input type="text" id="country" name="country" placeholder="Country">
                <input type="text" id="postcode" name="postcode" placeholder="Postcode">
            </div><br><br>
            
            <input type="tel" id="phone" name="phone" placeholder="Phone Number"><br><br>
            
            <input type="submit" value="Begin Checkout">
        </form>
    </div>

</body>

</html>
