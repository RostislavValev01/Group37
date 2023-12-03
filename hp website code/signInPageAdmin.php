<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

<head>
    <title>Admin Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="HealthPoint.css">
    <script defer src="loginAdmin.js"></script>
    <style>
  body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff; /* Set the background color of the container */
            padding: 20px;
            margin-top: -20vh;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a box shadow for a subtle effect */
        }

        .login h1 {
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 20px;
        }

        .login-form {
            text-align: center;
            gap: 10px;
        }

        #login-form #email,
        #login-form #password,
        #login-form #adminID {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-top: 5px;
        }

        #login-form #login,
        #login-form #register {
            width: 100%;
            height: 30px;
            border-radius: 5px;
            margin-bottom: 10px;
        }
    </style>
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
        <div class="login-container">
            <h1 id="login-header">Administrator Login</h1>
            <?php if ($error_message): ?>
                <p class="error">
                    <?php echo $error_message; ?>
                </p>
            <?php endif; ?>
            <form id="login-form" action="" method="post">
                <input type="email" id="email" name="email" placeholder="Email" /><br><br>
                <input type="password" id="password" name="password" placeholder="Password"><br><br>
                <input type="adminID" id="adminID" name="adminID" placeholder="Admin ID"><br><br>
                <input type="submit" id="login" name="login" value="Login">
                <input type="button" value="Register" id="register" class="button" onclick="location.href='signupcustomer.php';">
                <br>
            </form>
        </div>
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
        international copyright laws. Unauthorized use or reproduction of any materials without the express written
        consent of HealthPoint is strictly prohibited. HealthPoint and the HealthPoint logo are trademarks of
        HealthPoint.

        For inquiries regarding the use or reproduction of any content on this website, please contact us at
        HealthPoint@pharmacy.com</p>

    </div>
  </div>
</footer>

</html>
