<!DOCTYPE html>

<html lang="en">
<meta charset="UTF-8">
<head>
<title>Sign Up Admin</title>
<script defer src="signup.js"></script>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="HealthPoint.css">

</head>


<body>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $referenceKey = $_POST['referenceKey'];

    
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database";

    
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "INSERT INTO admins (first_name, last_name, email, password, reference_key)
            VALUES ('$firstName', '$lastName', '$email', '$password', '$referenceKey')";

    if ($conn->query($sql) === TRUE) {
        echo "New admin account created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
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
        <input type="password" id="refkey" name="referenceKey" placeholder="Admin Reference Key" required><br><br>
    </th>
</tr>
<tr>
<th>
    <input type="submit" id="submit" name="createaccount" value="Create new Account">

</th>
</tr>


</table>
</div>
</form>

</body>
</html>