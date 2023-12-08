<!DOCTYPE html>

<html lang="en">
<meta charset="UTF-8">
<head>
<title>Sign Up Admin</title>
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
        .register input[type="text"],
        .register input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .register #submit {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }


        .register #submit:hover {
            background-color: #45a049;
        }
    </style>
</head>


<body>
<?php
 
 include("php/config.php");
if (isset($_POST["submit"])) {
$fname = $_POST['fname'];
$email = $_POST['email'];
$password = $_POST['password'];
$lname = $_POST['lname'];
$refkey = $_POST['refkey'];

//verify the email
$verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");
if (mysqli_num_rows($verify_query) !=0) {
    echo "<div class='message'>
            <p>This email is used, Try another One Please!</p>
            </div> <br>";
            "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
}else{
    $admin_reference_key = 'admin123';
    if ($refkey === $admin_reference_key) {
    mysqli_query($con, "INSERT INTO adminusers(FirstName, LastName, Email, Password) VALUES('$fname', '$lname', '$email', '$password')" ) or die("Error Occured");
    echo "<div class='message'>
            <p>Registration Successful!</p>
            </div> <br>";
            "<a href='index.php'><button class='btn'>Login Now</button>";
    }else{
        echo "<div class='message'>
                    <p>Invalid Admin Reference Key!</p>
                  </div> <br>";
    }
}
} else {
?>
<div class="banner">
    <a href='#' class="logo"><img src="hplogo3.png" class="logo"></a>
    <nav class="header">
    <form action="/search" method="get">
            <input type="text" name="q" placeholder="Search...">
            <button type="submit">Go</button>
        </form>
<a href='signInPageCustomer.php'>Account</a>
<a href='Cart.php'>Basket</a>
<a href='Contact.php'>Contact</a>
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
        <h3>Create an Admin account</h3>
    </th>
</tr>
<tr>
<th>
<label for="fname">First name:</label></tr>    
</th>
</tr>
<tr>
<th>
<input type="text" id="fname" name="fname" placeholder="First Name" required><br><br>
</th>
</tr>
<tr>
<th>
<label for="lname">Last name:</label>
</th>
</tr>
<tr>
<th>
<input type="text" id="lname" name="lname" placeholder="Last Name" required><br><br>
</th>
</tr>
<tr>
<th>
<label for="email">Email:</label>   
</th>
</tr>
<tr>
<th>
<input type="text" id="email" name="email" placeholder="Email" required><br><br>
</th>
</tr>
<tr>
    <th>
        <label for="pass">Password:</label>
    </th>
</tr>
<tr>
    <th>
    <input type="password" id="password" name="password" placeholder="Password" required><br><br>
    </th>
</tr>
<tr>
    <th>
        <label for="refkey">Reference Key:</label>
    </th>
</tr>
<tr>
    <th>
        <input type="password" id="refkey" name="refkey" placeholder="Admin Reference Key" required><br><br>
    </th>
</tr>
<tr>
<th>
    <input type="submit" id="submit" name="submit" value="Create new Account">

</th>
</tr>


</table>
</div>
</form>

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
        <?php } ?>
    </div>
</footer>
</html>