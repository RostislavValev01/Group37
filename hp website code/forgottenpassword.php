<!DOCTYPE html>

<html lang="en">
<meta charset="UTF-8">
<head>
<title>Forgotten Password</title>
<script defer src="signup.js"></script>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="HealthPoint.css">
<style>
        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .content table {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .register #submit {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .register input[type="text"],
        .register input[type="password"] {
            width: 50%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .register #submit:hover {
            background-color: #45a049;
        }
    </style>
</head>


<body>
<?php
 require 'connectdb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $_POST['email'];

    
    $to = $email;
    $subject = "Password Reset";
    $message = "Please follow the link to reset your password."; 

    
    $headers = "From: HealthPoint@gmail.com"; 

    
    if (mail($to, $subject, $message, $headers)) {
        echo "Instructions to reset your password have been sent to your email.";
    } else {
        echo "Failed to send password reset instructions. Please try again later.";
    }
}
?>
<div class="banner">
    <a href='#' class="logo"><img src="images/hplogo3.png" class="logo"></a>
    <nav class="header">
    <form action="/search" method="get">
            <input type="text" name="q" placeholder="Search...">
            <button type="submit">Go</button>
        </form>
<a href='#'>Account</a>
<a href='#'>Basket</a>
<a href='#'>Contact</a>
    </nav>
</div>

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
<form class="register" id="registerForm"  method="post">
<div class="content">

<table>
<tr>
    <th>
        <h3>Reset Your Password</h3>
    </th>
</tr>
<tr><th>
    <p>Enter the email linked to your account and we will email you the steps on how to change your password.</p>
</th></tr>
<tr>
<th>
<label for="email">Email address</label></tr>    
</th>
</tr>
<tr>
<th>
<input type="text" id="email" name="email" placeholder="Enter your Email" required><br><br>
</th>
</tr>
<tr>
<th>
    <input type="submit" id="submit" name="resetpass" value="Reset Password">

</th>
</tr>


</table>
</div>
</form>

</body>
<footer class="footer">
    <div class="footer-section">
        <div>
            <a href="homePage.php"><img src="images/hplogo3.png" class="logo" alt="Company Logo"></a>
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