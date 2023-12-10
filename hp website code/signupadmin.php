<!DOCTYPE html>

<html lang="en">
<meta charset="UTF-8">
<head>
<title>Sign Up Admin</title>
<script defer src="signup.js"></script>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="HealthPoint.css">
<link rel="stylesheet" href ="signup.css">

</head>


<body>
<?php
 
 require 'connectdb.php';
if (isset($_POST["submit"])) {
$fname = $_POST['fname'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$surname = $_POST['surname'];
$refkey = $_POST['refkey'];
$mnumber = $_POST['mnumber'];
$address = $_POST['address'];
$dob = $_POST['dob'];


//verify the email
$verify_query = mysqli_query($con, "SELECT Email FROM accountdetails WHERE Email='$email'");
if (mysqli_num_rows($verify_query) !=0) {
    echo "<div class='message'>
            <p>This email is used, Try another One Please!</p>
            </div> <br>";
            "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
}else{
    $admin_reference_key = 'admin123';
    if ($refkey === $admin_reference_key) {
    mysqli_query($con, "INSERT INTO accountdetails(FirstName, Surname, MobileNumber, Email, Password, CustomerAddress, DateOfBirth, AdminStatus) VALUES('$fname', '$surname', '$mnumber', '$email', '$password', '$address', '$dob', 1)" ) or die("Error Occured");
    echo "<div class='message'>
            <p>Registration Successful!</p>
            </div> <br>";
            header("Location: signInPageAdmin.php"); 
            exit();
    }else{
        echo "<div class='message'>
                    <p>Invalid Admin Reference Key!</p>
                  </div> <br>";
    }
}
} else {
?>
<nav class="banner">
    <a href="Index.php"><img src="hplogo3.png" class="logo" alt="Company Logo"></a>
    <form action="" method="get">
      <input type="text" name="search" class="search-bar"
        value="<?= isset($search) && $search !== '' ? htmlspecialchars($search) : '' ?>" placeholder="Search products...">
        <input type="submit" value="Go" class="search-bar-go"></form>
    <?php
    if (isset($_SESSION['loggedin'])) {
      if (isset($_SESSION['AdminStatus']) && $_SESSION['AdminStatus'] == 1) {
        ?>
        <nav class="header">
          <button><a href="AdminAccounts.php">Account</a></button>
          <button><a href="Cart.php">Basket</a></button>
          <button><a href="Contact.php">Contact Us</a></button>
          <button><a href="logout.php">Logout</a></button>
        </nav>
        <?php
      } else if (isset($_SESSION['AdminStatus']) && $_SESSION['AdminStatus'] == 0) {
        ?>
          <nav class="header">
            <button><a href="CustomerAccounts.php">Account</a></button>
            <button><a href="Cart.php">Basket</a></button>
            <button><a href="Contact.php">Contact Us</a></button>
            <button><a href="logout.php">Logout</a></button>
          </nav>
        <?php
      }
    } else {
      ?>
      <nav class="header">
        <button><a href="signInPageCustomer.php">Sign In</a></button>
        <button><a href="Cart.php">Basket</a></button>
        <button><a href="Contact.php">Contact Us</a></button>
      </nav>
      <?php
    }
    ?>
  </nav>
  <nav class="header-nav">
    <ul class="navigation-bar">
      <li><a href="Index.php">Home</a></li>
      <li><a href="AboutUs.php">About Us</a></li>
      <nav class=Products>
        <a href="productPage.php"><button class="dropbtn">Products</button></a>
        <nav class="products-content">
          <a href="productPage.php?Product_Category=General">General Medication</a>
          <a href="productPage.php?Product_Category=SkinCare">SkinCare</a>
          <a href="productPage.php?Product_Category=Haircare">HairCare</a>
          <a href="productPage.php?Product_Category=DentalCare">DentalCare</a>
          <a href="productPage.php?Product_Category=Vitamins_Supplements">Vitamins and Supplements</a>
        </nav>
      </nav>
    </ul>
  </nav>
<form class="register" id="registerForm"  method="post">
<div class="content">

<table class="registration-table">
                <tr>
                    <th colspan="2">
                        <h3>Create an Admin account</h3>
                    </th>
                </tr>
                <tr>
                    <td>
                        <label for="fname">First name:</label>
                    </td>
                    <td>
                        <input type="text" id="fname" name="fname" placeholder="First Name" required><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="surname">Surname:</label>
                    </td>
                    <td>
                        <input type="text" id="surname" name="surname" placeholder="Surname" required><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Email:</label>
                    </td>
                    <td>
                        <input type="text" id="email" name="email" placeholder="Email" required><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">Password:</label>
                    </td>
                    <td>
                        <input type="password" id="password" name="password" placeholder="Password" required><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="address">Address:</label>
                    </td>
                    <td>
                        <input type="text" id="address" name="address" placeholder="Address" required><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="mnumber">Mobile Number:</label>
                    </td>
                    <td>
                        <input type="number" id="mnumber" name="mnumber" placeholder="Mobile Number" required><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="dob">Date of Birth:</label>
                    </td>
                    <td>
                        <input type="date" id="dob" name="dob" placeholder="Date of Birth" required><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="refkey">Admin Reference Key:</label>
                    </td>
                    <td>
                        <input type="password" id="refkey" name="refkey" placeholder="Reference Key" required><br><br>
                    </td>
                </tr>
                <tr>
    <td colspan="2">
        <a href="signupcustomer.php" class="customer-link">Back to customer registration</a>
    </td>
</tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" id="submit" name="submit" value="Create new Account">
                    </td>
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