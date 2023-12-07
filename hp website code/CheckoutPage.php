<?php
       include();
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
    <style>
    

    .content h1{
        margin-bottom: 50px;
    }

    .content {
            display: flex;
            align-items: left;
            height: 100vh;
            text-align: center;
           
        }
    
    .contact-container {
            background-color: #fff; /* Set the background color of the container */
            padding: 20px;
            margin-top: -20vh;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a box shadow for a subtle effect */
            margin-left: 300px;
    }

    #email,
    #fname,
    #lname,
    #address,
    #city,
    #phone,
    #submit,
    #country,
    #postcode {
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box; /* Include padding and border in width calculations */
    }

    /* Set width for specific inputs */
    #email,
    #address,
    #city,
    #phone,
    #submit {
        width: 100%;
    }

    #fname,
    #lname,
    #country,
    #postcode {
        width: calc(50% - 5px); /* Set width for two inputs in a row */
    }

    #country,
    #postcode {
        margin-top: 10px; /* Add margin-top to align with the row above */
    }
       
    
</head>

<body>
    <nav class="banner">
        <a href="homePage.php"><img src="hplogo3.png" class="logo" alt="Company Logo"></a>
        <form action="/search" method="get">
            <input type="text" name="q" placeholder="Search...">
            <button type="submit">Go</button>
        </form>
        <div class="header">
            <button><a href="accountPage.php">Account</a></button>
            <button><a href="basketPage.php">Basket</a></button>
            <button><a href="contactUsPage.php">Contact Us</a></button>
        </div>
    </nav>

    <div class="header-nav">
        <ul class="navigation-bar">
            <li><a href="homePage">Home</a></li>
            <li><a href="AboutUs.html">About Us</a></li>
            <li class="Products">
                <button class="dropbtn">Products</button>
                <div class="products-content">
                    <a href="productPage.php">Prescriptions</a>
                    <a href="productPage.php">Skin Care</a>
                    <a href="productPage.php">Hair Care</a>
                    <a href="productPage.php">Medication</a>
                </div>
            </li>
        </ul>
    </div>


    <div class="content">
        <div class="contact-container">
            <h1>Contact Information</h1>
            <form action="#" method="post">
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
                
                <input type="submit" id="submit" value="Begin Checkout">
            </form>
        </div>
    </div>


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
