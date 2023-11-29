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
        <div class="login">
            <h1 id="login-header">Login</h1>
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
                <input type="button" value="Register" id="register" class="button"
                    onclick="location.href='signupadmin.php';">
                <br>
            </form>
        </div>
    </div>

</body>

</html>
